@extends('/layouts/mainlayout')

@section('content')

    <div>
        <div class="home_container">
            <div class="submain_container">
                <table style="height: 15rem; width: 100%; text-align: center;">
                    <tr>
                        <td>
                            <div class='welcomescreen'>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                                </span>
                                <h1 class="title_notmain">{{ trans("formation.courses") }}</h1>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="home_container notmain" id="whitebg">
            <div id='departments_cont'>
                <div class="leftdivide" id="dep_info_cnt">
                    
                    <p>
                    Diseño y oferta de cursos cortos y diplomados sincrónicos y asincrónicos, que contribuyan al conocimiento específico en las áreas de experticia del FID y avalados por las casas de estudio e institutos de investigación más importantes de América Latina y Europa.
                    </p>
                </div>
                <div class="rightdivide" id="logo_subpage">
                    <div style="width: 100%; padding: 20px;">
                        <center>
                            <img class="imglogo_subpage" src="{{ asset('/img/logos/onebranch.png') }}" class="svgcolor" style="transform: rotate(180deg);" />
                            <h2>{{ trans("formation.courses") }}</h2>
                        </center>
                    </div>
                </div>
            </div>

            <div id="cont-books">
                <center>
                    <h2>Cursos Disponibles</h2>
                </center>
                @foreach ($cursos as $curso)
                    @php
                        $array = json_decode($curso['clasific']);
                        $disponible = json_decode($curso['disponib']);
                        if (in_array("Curso", $array)) {
                    @endphp
                    <div class="bookrow downborder">
                        <div class="books" style="margin: auto;">
                            <img style="width:90%; padding:20px; margin:auto;" src="{{ asset('/img/logos/logo-fid-llave.png') }}" />
                        </div>
                        <div class="booksinfo">
                            <h1>{{$curso["titulo"]}}</h1>
                            <h3>{{$curso["ponente"]}}</h3>
                        </div> 
                        <div class="booksmoreinfo">
                            @php
                                if (isset($disponible)) {
                                    if(in_array('Disponible', $disponible)){
                            @endphp
                            
                            <a class="loginbtns" id='curso_{{$curso["id"]}}' href='/fid/formation/courses/showcourse/{{$curso["id"]}}'>Descubrir más</a><br>

                            @php
                                    } else {
                            @endphp

                            <a class="loginbtns viewbook 3" id='curso_{{$curso["id"]}}'>Descubrir más</a><br>

                            @php            
                                    }
                                } else {
                            @endphp
                            
                            <a class="loginbtns viewbook 2" id='curso_{{$curso["id"]}}'>Descubrir más</a><br>

                            @php
                                }
                            @endphp
                            
                        </div>                   
                    </div>
                    @php
                        }
                    @endphp
                @endforeach
            </div>

        </div>
    </div>

@endsection