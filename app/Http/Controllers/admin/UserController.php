<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crud.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $user = new User();
        $origen = 'create';
        return view('admin.crud.users.create', compact('roles', 'user', 'origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|max:254',
            'password' => 'min:5',
            'email' => 'required|unique:users,email'
        ]);

        // Creando usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // Comentar esta asignación cuando se decida activar la verificación de usuario
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        // Asignando roles seleccionados
        $roles = Role::all();
        foreach($roles as $role){
            if($request->input("role" . $role->id)){
                $user->assignRole($role->name);
            }
        }

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha creado el usuario: ' . $request->name);

        // Redireccionar a la vista index
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $origen = 'show';
        return view('admin.crud.users.edit', compact('user', 'roles', 'permissions', 'origen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $origen = 'edit';
        return view('admin.crud.users.edit', compact('user', 'roles', 'permissions', 'origen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validación
        if($request->password){
            $request->validate([
                'name' => 'required|max:254',
                'password' => 'min:5',
                'email' => 'email|required|unique:users,email,'.$user->id
            ]);
            $user->password = bcrypt($request->password);
        } else {
            $request->validate([
                'name' => 'required|max:254',
                'email' => 'email|required|unique:users,email,'.$user->id
            ]);
        }

        // Actualizando usuario
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Actualizando los roles del usuario
        $roles = Role::all();
        foreach($roles as $role){
            if($request->input("role" . $role->id)){
                $user->assignRole($role->name);
            }else {
                $user->removeRole($role->name);
            }
        }

        // Actualizando los permisos del usuario
        $permissions = Permission::all();
        foreach($permissions as $permission){
            if($request->input("permiso" . $permission->id)){
                $user->givePermissionTo($permission->name);
            }else {
                $user->revokePermissionTo($permission->name);
            }
        }

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha actualizado el usuario: ' . $request->name);

        // Redireccionar a la vista index
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $nombre = $user->name;
        $user->delete();
        Alert::info('¡Advertencia!', 'Se ha eliminado el usuario: ' . $nombre);
        return redirect()->route('admin.users.index');
    }
}
