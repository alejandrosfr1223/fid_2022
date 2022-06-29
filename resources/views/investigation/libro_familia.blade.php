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
            <img class="img_logotitle" src="/img/logos/onebranch.png" style="margin-top: 10px; transform: rotate(0deg) scale(-1);" />
            <h2 style="text-align: center; margin: auto 0px;">Libros de Familia</h2>
            <img class="img_logotitle" src="/img/logos/onebranch.png" style="margin-top: -10px; transform: rotate(0deg);" />
        </div>
        <div class="cont_prod_inv">
            <div class="half_prod_inv half_prod_inv_l">
                <img src="/img/logos/vector-logo.svg" class="backg-ovrl2">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="half_prod_inv half_prod_inv_r">
                <a onclick="showmodal()" style="height:100%; position:relative;">
                    <img class="imgs_crs" src="/img/investigacion/LIBRO DE FAMILIA1.png">
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
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="/img/investigacion/LIBRO DE FAMILIA1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="/img/investigacion/LIBRO DE FAMILIA2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="/img/investigacion/LIBRO DE FAMILIA3.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

@endsection