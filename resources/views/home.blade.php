@extends('layouts/mainlayout')

@section('content')

    <div>
        <div class="home_container">
            <div id="containerbackground">
                <div class="post_home_container">
                    <div class="firstsquare leftdivide" style="text-align: center;">
                        <table id="main" style="text-align: center; align-content: center; margin: auto; ">
                            <tr>
                                <td>
                                    <img class="first_img" src="{{ asset('/img/logos/logo-fid-llave.png') }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 class="first_key">FID</h1>
                                </td>
                            </tr>
                        </table>

                        <table id="notmain" style="text-align: center; align-content: center; margin: auto;">
                            <tr>
                                <td>
                                    <img class="first_img" src="{{ asset('/img/logos/logo-fid-llave.png') }}">
                                </td>
                                <td>
                                    <h1 class="first_key">FID</h1>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="rightdivide">
                        <p id="infomaintext">
                        El <b>Centro de Documentación FID</b> basa su actividad en la Formación, Investigación y Difusión en tres áreas fundamentales del conocimiento humano: la genealogía, el derecho genealogista y la historia. Para el desarrollo y promoción de sus actividades y proyectos dispone de un importante y extenso fondo bibliográfico y documental, el cual sirve de apoyo a las investigaciones genealógicas de <a href="https://sefaruniversal.com" style="text-decoration: none; color:white; font-weight: bold;">Sefar Universal</a>. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="home_container" id="whitebg">
            <div style="position: relative;">
                <img src="{{ asset('/img/home/logo-overlay2r.png') }}" class="backg-ovrl2 bigscreen ol2-r">
                <div id='departments_cont'>
                    
                    <div class="leftdivide" id="dep_info_cnt">
                        <h2 style="color:#cca766;">{{ trans("home.departments") }}</h2>
                        <p>
                        El Centro de Documentación FID se compone de cuatro ramas:<br>
                        <b>Formación</b>, con una atractiva oferta de cursos relacionados con los temas que rigen la labor de FID.<br>
                        <b>Investigación</b>, con los trabajos y proyectos de investigación que se desarrollan en las áreas de genealogía, historia y derecho genealogista.<br>
                        <b>Documentación</b>, con capacidad para la digitalización y catalogación de archivos biblio-hemerográficos, documentales y audiovisuales.<br>
                        <b>Difusión</b>, que comprende las publicaciones de la Editorial BV, cuyos contenidos responden a las áreas temáticas del Centro de Documentación FID.
                        </p>
                    </div>
                    <div class="rightdivide row" id="btns_cnt_dept">
                        
                        <a class="subtext col-6 col-md-3" href="{{route('formation.home')}}">
                            <div>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x recolor"></i>
                                    <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h2 class="marger">{{ trans("home.formation") }}</h2>
                        </a><br><br>

                        <a class="subtext col-6 col-md-3" href="{{route('investigation.home')}}">
                            <div>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x recolor"></i>
                                    <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h2 class="marger">{{ trans("home.investigation") }}</h2>
                        </a><br><br>

                        <a class="subtext col-6 col-md-3" href="{{route('documentation.home')}}">
                            <div>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x recolor"></i>
                                    <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h2 class="marger">{{ trans("home.documentation") }}</h2>
                        </a><br><br>

                        <a class="subtext col-6 col-md-3" href="{{route('diffusion.home')}}">
                            <div>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x recolor"></i>
                                    <i class="fas fa-bullhorn fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h2 class="marger">{{ trans("home.diffusion") }}</h2>
                        </a>
                    </div>
                    <!-- Parte Responsiva -->
                </div>
                <div class="contributediv">
                    <h2 style="color:#12313a;">¿Deseas aportar a nuestras investigaciones?</h2>
                    <a class="loginbtns" id="discov_more2" href="{{route('contribute.home')}}" style="margin:auto;">Aportar Aquí</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bluebg">
        <img src="{{ asset('/img/home/logo-overlay2r.png') }}" class="backg-ovrl4 bigscreen ol2-r">
        <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl4 smallscreen">
        <div id="div_inapastora">
            <div id="div_inapastoral" class="clmain_divpastora">
                <img src="{{ asset('/img/juandelrincon/jdr.png') }}" id="divimg" class="changecolorpngsyellow">
            </div>
            <div id="div_inapastorar" class="clmain_divpastora mv_cont2">
                <h2>{{ trans("home.jdelrincon") }}</h2>
                <p style="color: white;">Te invitamos a colaborar con esta investigación histórico-genealógica en torno al capitán Juan del Rincón, descubridor y poblador de las Sierras Nevadas del Nuevo Reino de Granada, cuyo objeto es demostrar, mediante documentación fidedigna, el origen sefardí de este tronco común de muchos apellidos hispanoamericanos.</p>
                <a class="loginbtns" id="discov_more2" href="https://www.corporacioncabv.com/jdr">Descubrir más</a>
            </div>
        </div>
    </div>
    <div class="yellowbg">
        <img src="{{ asset('/img/home/logo-overlay2.png') }}" class="backg-ovrl3 bigscreen ol2-l">
        <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl3 smallscreen">
        <div id="div_inapastora">
            <div id="div_inapastoral" class="clmain_divpastora">
                <img src="{{ asset('/img/home/Divinapastora.png') }}" id="divimg" class="changecolorpngs">
            </div>
            <div id="div_inapastorar" class="clmain_divpastora mv_cont">
                <h2>{{ trans("home.divpastora") }}</h2>
                <p style="color: white;">Te invitamos a colaborar con la investigación histórico-devocional que realizamos en torno a la Divina Pastora y a fray Isidoro de Sevilla, iniciador del culto a esta advocación mariana desde el convento de Capuchinos de Sevilla, cuna de la devoción pastoreña.</p>
                <a class="loginbtns" id="discov_more" href="https://www.corporacioncabv.com/divinapastora">Descubrir más</a>
            </div>
        </div>
    </div>
    <div id="missionvision" class="whitebg" style="position: relative;">
        <img src="{{ asset('/img/home/logo-overlay2.png') }}" class="backg-ovrl2 bigscreen ol2-l">
        <img src="{{ asset('/img/home/logo-overlay2r.png') }}" class="backg-ovrl2 bigscreen ol2-r">
        <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl2 smallscreen">
        <div id="containermv">
            <h2 style="text-align: center; padding-bottom: 20px;">El FID tiene como... </h2>
            <div class="mv_cont" id="mission">
                <h2>{{ trans("home.mission") }}</h2>
                <p>Gestionar y difundir el conocimiento en las áreas de la genealogía, la historia y el derecho genealógico, garantizando el acceso a la información especializada que ofrece su fondo bibliográfico y documental; satisfacer la demanda de formación en dichas áreas, y contribuir al fomento de la cultura mediante la concepción y el desarrollo de proyectos editoriales sobre los temas mencionados.</p>
            </div>
            <div class="mv_cont" id="vision">
                <h2>{{ trans("home.vision") }}</h2>
                <p>Alcanzar la excelencia en el manejo de los recursos de información, formación y difusión del conocimiento, con el fin de apoyar de manera eficiente el desarrollo de investigaciones, y la generación de productos y servicios en las materias de su competencia.</p>
            </div>
        </div>
    </div>

@endsection