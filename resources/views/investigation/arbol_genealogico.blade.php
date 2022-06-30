@extends('/layouts/mainlayout')

@section('content')
    <script>
        function closemodal() {
            document.getElementById("o_cont").style.zIndex = -1;
            document.getElementById("o_cont").style.opacity = 0;
            document.querySelector("body").style.overflow = "auto";
        }
        function showmodal() {
            document.getElementById("o_cont").style.zIndex = 105;
            document.getElementById("o_cont").style.opacity = 1;
            document.querySelector("body").style.overflow = "hidden";
        }
    </script>

    <div class="glob_cont_prod_inv">
        <div style="display: inline-flex;
                    text-align: center;
                    align-items: center;
                    align-content: center;
                    justify-content: center;
                    width: 100%;">
            <img class="img_logotitle" src="{{ asset('/img/logos/onebranch.png') }}" style="margin-top: 10px; transform: rotate(0deg) scale(-1);" />
            <h2 style="text-align: center; margin: auto 0px;">Árboles Genealógicos</h2>
            <img class="img_logotitle" src="{{ asset('/img/logos/onebranch.png') }}" style="margin-top: -10px; transform: rotate(0deg);" />
        </div>
        <div class="cont_prod_inv">
            <div class="half_prod_inv half_prod_inv_l2">
                <img src="/img/logos/vector-logo.svg" class="backg-ovrl2">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="half_prod_inv half_prod_inv_r2">
                <a onclick="showmodal()" style="height:100%; position:relative;">
                    <img class="imgs_crs" src="{{ asset('/img/investigacion/ARBOL GENEALOGICO.png') }}">
                </a>
            </div>
        </div>
        <center>
            <a class="loginbtns" id="discov_more2">Adquirir Servicio</a>
        </center>
    </div>

    <div id="o_cont">
        <style>
            .carousel .carousel-item {
                height: 90vh !important;
            }
            .carousel-item img{
                height: 90vh;
                top: 0%;
                left: 0%;
                transform: translate(0%, 0%);
                min-height: 0;
                object-fit: contain;
            }
            .carousel {
                height: 90vh;
            }

            #closewindow{
                padding: 15px 20px;
                z-index: 99;
                position: absolute;
                font-size:1.5rem;
            }
        </style>
        <div id="wbg">
            <a id="closewindow" onclick="closemodal()">
                <span class="members_index_icons fa-stack fa-1x">
                    <i class="fas fa-circle fa-stack-2x recolor"></i>
                    <i class="fas fa-times fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <img style="width:100%;
                        margin: auto;
                        position: relative;
                        top: 50%;
                        left: 50%;
                        transform: inherit;" src="{{ asset('/img/investigacion/ARBOL GENEALOGICO.png') }}">
        </div>
    </div>

@endsection