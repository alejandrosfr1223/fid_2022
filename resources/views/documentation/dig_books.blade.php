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
                                    <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                                </span>
                                <h1 class="title_notmain">{{ trans("documentation.dig_books") }}</h1>
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="rightdivide" id="logo_subpage">
                    <div style="width: 100%; padding: 20px;">
                        <center>
                            <img src="{{ asset('/img/logos/onebranch.png') }}" class="svgcolor" style="transform: rotate(90deg);" />
                            <h2>{{ trans("documentation.dig_books") }}</h2>
                        </center>
                    </div>
                </div>
            </div>
            <div id="cont-books">
                <center>
                    <h2>Digitalizaciones</h2>
                </center>
                @foreach ($books as $book)
                    @php
                        $array = json_decode($book['clasific']);
                        if (in_array("Digitalizacion1", $array)) {
                    @endphp
                    <div class="bookrow downborder">
                        <div class="books">
                            <img style="width:90%; padding:20px; margin:auto;" src="{{ asset('/img/logos/logo-fid-llave.png') }}" />
                        </div>
                        <div class="booksinfo">
                            <h1>{{$book["titulo"]}}</h1>
                            <h3>{{$book["autor"]}}</h3>
                            <p>{{$book["notas"]}}</p>
                        </div> 
                        <div class="booksmoreinfo">
                            <a class="loginbtns viewbook" id='libro_{{$book["id"]}}'>Descubrir más</a><br>
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