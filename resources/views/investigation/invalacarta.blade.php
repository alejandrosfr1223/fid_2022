@extends('/layouts/mainlayout')

@section('content')

    <div class="glob_cont_prod_inv">
        <div style="display: inline-flex;
                    text-align: center;
                    align-items: center;
                    align-content: center;
                    justify-content: center;
                    width: 100%;">
            <img class="img_logotitle" src="{{ asset('/img/logos/onebranch.png') }}" style="margin-top: 10px; transform: rotate(0deg) scale(-1);" />
            <h2 style="text-align: center; margin: auto 0px;">Investigación a la Carta</h2>
            <img class="img_logotitle" src="{{ asset('/img/logos/onebranch.png') }}" style="margin-top: -10px; transform: rotate(0deg);" />
        </div>
        <div class="cont_prod_inv">
            <div class="half_prod_inv half_prod_inv_l2">
                <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl2">
                <p>
                    Texto de Relleno Texto de Relleno Texto de Relleno Texto de Relleno Texto de Relleno Texto de Relleno Texto de Relleno Texto de Relleno Texto de Relleno.
                </p>
            </div>
            <div class="half_prod_inv half_prod_inv_r2">
                <a onclick="showmodal()" style="height:100%; position:relative;">
                    <img class="imgs_crs" src="{{ asset('/img/lupa.png') }}">
                </a>
            </div>
        </div>
        <center>
            <a class="loginbtns" href="{{ route('purchase.buyservice', ['id' => 2]) }}" id="discov_more2">Adquirir Servicio</a>
        </center>
    </div>

@endsection