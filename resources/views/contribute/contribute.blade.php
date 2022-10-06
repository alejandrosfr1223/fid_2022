@extends('/layouts/mainlayout')

@section('content')

	@if(session("gracias"))
		<script type="text/javascript">
			Swal.fire({
	            icon: 'success',
	            title: '¡Muchas Gracias!',
	            html: '{{ session("gracias") }}',
	            showConfirmButton: false,
	            timer: 4500
	        });
		</script>
	@endif

	<div>
        <div class="home_container">
            <div class="submain_container">
                <table style="height: 15rem; width: 100%; text-align: center;">
                    <tr>
                        <td>
                            <div class='welcomescreen'>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                                </span>
                                <h1 class="title_notmain">Aportar</h1>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="home_container" id="whitebg">
            <div style="position: relative;">
                <img src="{{ asset('/img/home/logo-overlay2r.png') }}" class="backg-ovrl2 bigscreen ol2-r">
                <div id='departments_cont'>
                    
                    <div class="leftdivide" id="dep_info_cnt">
                        <h2 style="color:#cca766;">Con tu ayuda llegaremos más lejos</h2>
                        <p>
							Únete a nuestro proyecto, y <b>se uno de nuestros colaboradores.</b><br><br>
							<b>Nos puedes apoyar en alguno o todos nuestros proyectos:</b><br>
							Centro de Documentación FID.<br>
							Proyecto Juan del Rincón.<br>
							Proyecto Divina Pastora de las Almas.<br><br>
							<b>Nos puedes apoyar de muchas formas:</b><br>
							Aportando documentos físicos o digitales.<br>
							Difundiendo nuestro trabajo.<br>
							Catalogando documentos.<br>
							Transcribiendo documentos.<br>
							Aportando económicamente.
                        </p>
                    </div>
                    <div class="rightdivide row" id="btns_cnt_dept">
                        
                        @if (Route::has('login'))
	                        @auth
	                        	<script>
	                        		function hidew1(){
	                        			document.getElementById("win1").style.opacity = "0";
	                        			document.getElementById("win2").style.opacity = "1";
	                        			document.getElementById("win2").style.zIndex="99";
	                        			document.getElementById("win1").style.zIndex="-1";
	                        		}

	                        		function showw1(){
	                        			document.getElementById("win1").style.opacity = "1";
	                        			document.getElementById("win2").style.opacity = "0";
	                        			document.getElementById("win1").style.zIndex="99";
	                        			document.getElementById("win2").style.zIndex="-1";
	                        		}
	                        	</script>
	                        	<div class="parent">
	                        		<div id="win1" class="winscontribute">
		                            	<a class="loginbtns" id="discov_more2" onclick="hidew1()" style="margin:auto;">Contribuir con el FID</a>
									</div>
									<div id="win2" class="winscontribute">
		                            	<a class="loginbtns" id="discov_more2" href="{{ route('contribute.contributeform') }}" style="margin:auto;">Aportar Materiales</a><br><br>
		                            	<a class="loginbtns" id="discov_more2" href="#" style="margin:auto;">Donar al FID</a><br><br><br>
			                            <a onclick="showw1()" id="closew2">X</a>
									</div>
	                        	</div>
	                        @else
	                            <a class="loginbtns" id="discov_more2" href="{{ route('login') }}" style="margin:auto;">Contribuir con el FID</a>
	                        @endauth
	                    @endif
                    </div>
                    <!-- Parte Responsiva -->
                </div>
            </div>
        </div>
    </div>

@endsection