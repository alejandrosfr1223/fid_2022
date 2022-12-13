<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Config;
use Illuminate\Support\Facades\DB;
use Stripe;
use HubSpot;
use HubSpot\Client\Crm\Deals\Model\AssociationSpec;

class PurchaseController extends Controller
{
    function buyservice($id){
        $servicio = [];
        if ($id === "0"){
            $servicio["nombre"] = "Arbol Genealógico";
            $servicio["id"] = $id;
            $servicio["price"] = 50;
        } else if ($id === "1"){
            $servicio["nombre"] = "Libro de Familia";
            $servicio["id"] = $id;
            $servicio["price"] = 50;
        } else if ($id === "2"){
            $servicio["nombre"] = "Investigación a la Carta";
            $servicio["id"] = $id;
            $servicio["price"] = 50;
        } else {
            return view('services.services');
        }
        return view('purchase.services', ["servicio"=>$servicio]);
    }

    function buysubscription($id){
        $suscripcion = [];    

        $data = Product::find($id);    

        $suscripcion = json_decode(json_encode($data),true);

        return view('purchase.subscriptions', ["suscripcion"=>$suscripcion]);
    }

    function stripePostProductos(Request $request){
        $hubspot = HubSpot\Factory::createWithAccessToken(env('HUBSPOT_KEY'));

        $hssearch = json_decode(json_encode($request->all()),true);

        $filter = new HubSpot\Client\Crm\Contacts\Model\Filter();
        $filter
            ->setOperator('EQ')
            ->setPropertyName('email')
            ->setValue($hssearch["email"]);

        $filterGroup = new HubSpot\Client\Crm\Contacts\Model\FilterGroup();
        $filterGroup->setFilters([$filter]);

        $searchRequest = new HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest();
        $searchRequest->setFilterGroups([$filterGroup]);

        // Get specific properties
        $searchRequest->setProperties(['email']);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $infoproyect = json_decode(json_encode($request->all()),true);

        $data = json_decode(json_encode(DB::table('products')->where('id', $infoproyect['idproducto'])->get()),true);

        $id = $infoproyect['idproducto'];

        if ($id === "0"){
            $servicio["nombre"] = "Arbol Genealógico";
            $servicio["id"] = $id;
            $servicio["price"] = 50;
        } else if ($id === "1"){
            $servicio["nombre"] = "Libro de Familia";
            $servicio["id"] = $id;
            $servicio["price"] = 50;
        } else if ($id === "2"){
            $servicio["nombre"] = "Investigación a la Carta";
            $servicio["id"] = $id;
            $servicio["price"] = 50;
        }

        $customer = Stripe\Customer::create(array(
            "email" => $hssearch["email"],
            "name" => $hssearch["name"]. " " .$hssearch["lastname"],
            "source" => $request->stripeToken
         ));

        $charged = Stripe\Charge::create ([
                "amount" => $servicio["price"]*100,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Pago inicial: " . $servicio["nombre"] . "."
        ]);

        if ($charged->status == "succeeded"){
            
            $contactsPage = json_decode(json_encode($hubspot->crm()->contacts()->searchApi()->doSearch($searchRequest)),true);

            if ($contactsPage["total"]==0) {
                $contactInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
                $contactInput->setProperties([
                    'email' => $hssearch["email"],
                    'firstname' => $hssearch["name"],
                    'lastname' => $hssearch["lastname"],
                    'phone' => $hssearch["cellphone"],
                    'country' => $hssearch["country"],
                ]);

                $contact = json_decode(json_encode($hubspot->crm()->contacts()->basicApi()->create($contactInput)),true);;

                $hsuserid = $contact["id"];
            } else {
                $hsuserid = $contactsPage["results"][0]["id"];
            }

            $contactsPage = json_decode(json_encode($hubspot->crm()->contacts()->searchApi()->doSearch($searchRequest)),true);

            $dealInput = new \HubSpot\Client\Crm\Deals\Model\SimplePublicObjectInput();

            $dealInput->setProperties([
                'dealname' => $servicio["nombre"],
                'pipeline' => "default",
                'dealstage' => "47329299"
            ]);
            
            $apiResponse = json_decode(json_encode($hubspot->crm()->deals()->basicApi()->create($dealInput)),true);

            $iddeal = $apiResponse["id"];

            $associationSpec1 = new AssociationSpec([
                'association_category' => 'HUBSPOT_DEFINED',
                'association_type_id' => 3
            ]);

            $asocdeal = $hubspot->crm()->deals()->associationsApi()->create($iddeal, 'contacts', $hsuserid, [$associationSpec1]);

            return redirect()->route('services.home')->with("payment", 'Su pago ha sido procesado correctamente. En los próximos días nos comunicaremos con usted.')->with("paymenturl", $charged["receipt_url"]);
        } else {
            return redirect()->route('services.home')->with("error", 'Ha ocurrido un error al procesar su pago.');
        }
    }

    function stripePost(Request $request){

        $user = auth()->user();
        $input = $request->all();
        $token =  $request->stripeToken;
        $paymentMethod = $request->paymentMethod;

        $infoproyect = json_decode(json_encode($request->all()),true);

        $data = json_decode(json_encode(DB::table('products')->where('id', $infoproyect['idproducto'])->get()),true);

        $name = $data[0]["nameproject"];
        $tablename = $data[0]["idtableaffected"];
        $pid = $data[0]["priceidstripe"];

        $dataci = json_decode(json_encode(DB::table('products')->where('idtableaffected', $data[0]["idtableaffected"])->get()),true);

        $checkif = array();

        foreach ($dataci as $i){
            $checkif[] = $i["priceidstripe"];
        }

        try {

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
            } else {
                $stripe = new \Stripe\StripeClient((env('STRIPE_SECRET')));
            
                $subsuser = $stripe->subscriptions->all(['customer' => $user->stripe_id]);

                $a = 0;

                foreach ($subsuser["data"] as $i) {
                    if (in_array($i["plan"]["id"], $checkif) && in_array($pid, $checkif)) {
                        
                        $subscription = $stripe->subscriptions->retrieve($i["id"]);
                        $stripe->subscriptions->update( $subscription->id, [
                            'cancel_at_period_end' => false,
                            'proration_behavior' => 'create_prorations',
                            'items' => [
                                [
                                    'id' => $subscription->items->data[0]->id,
                                    'price' => $pid,
                                ],
                            ],
                        ]);

                        $a = $a + 1;

                        break;
                    }
                }

                if ($a > 0){
                    $affected = DB::table('users')->where('id', auth()->user()->id)->update([$tablename => $data[0]["levelsub"]]);
                    return redirect()->route('services.home')->with("payment", 'Su suscripción ha sido actualizada correctamente.');
                }
            }

            \Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $token]
            );

            $user->newSubscription("default",$pid)
                ->create($paymentMethod, [
                'email' => $user->email,
            ]);

            $affected = DB::table('users')->where('id', auth()->user()->id)->update([$tablename => $data[0]["levelsub"]]);
            return redirect()->route('services.home')->with("payment", 'Su suscripción ha sido procesada correctamente.');
        } catch (Exception $e) {
            return back()->with('success',$e->getMessage());
        }
        
      
        //Session::flash('success', 'Payment successful!');
              
    }
}
