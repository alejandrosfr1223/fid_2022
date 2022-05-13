@extends('/layouts/mainlayout')

@section('content')

    <div>
        <div class="home_container">
            <div class="submain_container">
                <table style="height: 15rem; width: 100%; text-align: center;">
                    <tr>
                        <td>
                            <div style="margin:auto; display: inline-flex;">
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-bullhorn fa-stack-1x fa-inverse"></i>
                                </span>
                                <h1 class="title_notmain">{{ trans("diffusion.ebv") }}</h1>
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
                            <img src="/img/logos/onebranch.png" class="svgcolor"/>
                            <h2>{{ trans("diffusion.ebv") }}</h2>
                        </center>
                    </div>
                </div>
            </div>
            <div id="cont-books">
                @foreach ($books as $book)
                    @if ($book["editorial"] == "Editorial BV")
                        <div class="bookrow downborder">
                            <div class="books">
                                <div class="book-cover">
                                    <div class="info">
                                        <p class="book-title">{{$book["titulo"]}}</p>
                                        <br><br><br>
                                        <p class="book-author">{{$book["autor"]}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="booksinfo">
                                <h1>{{$book["titulo"]}}</h1>
                                <h3>{{$book["autor"]}}</h3>
                            </div> 
                            <div class="booksmoreinfo">
                                <a class="loginbtns viewbook" id='libro_{{$book["id"]}}'>{{ trans("diffusion.viewbook") }}</a><br>
                            </div>                   
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection