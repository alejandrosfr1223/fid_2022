@extends('/layouts/mainlayout')

@section('content')

<form action="" method="POST">
	@csrf
	<div style="width: 100%; margin:auto;">
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
                                <h1 class="title_notmain">Aportar Documentos</h1>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    <div id="contributeform" >
    	<div class="row">
	        <div class="col-sm-12 mb-3">
	            <center><label><b>Información general del material</b></label></center>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-sm-12 col-md-12 mb-3">
	            <div class="row">
	                <div class="col-sm-12 col-md-6 mb-0">
	                    <div class="form-group">
	                        <label for="titulo">Título del libro</label>
	                        <input
	                            type="text"
	                            class="form-control"
	                            name="titulo"
	                            placeholder="Introduzca el título del libro"
	                        >
	                    </div>
	                    @error('titulo')
	                        <div class="col-span-12 sm:col-span-12">
	                            <small style="color:red">*{{ $message }}*</small>
	                        </div>
	                    @enderror
	                </div>
	                <div class="col-sm-12 col-md-6 mb-0">
	                    <div class="form-group">
	                        <label for="autor">Autor</label>
	                        <input
	                            type="text"
	                            class="form-control"
	                            name="autor"
	                            placeholder="Introduzca el autor del libro"
	                        >
	                    </div>
	                    @error('autor')
	                        <div class="col-span-12 sm:col-span-12">
	                            <small style="color:red">*{{ $message }}*</small>
	                        </div>
	                    @enderror
	                </div>
	            </div>
	            <br>
	            <div class="row">
	                <div class="col-sm-12 col-md-6 mb-0">
	                    <div class="form-group">
	                        <label for="editorial">Editorial</label>
	                        <input
	                            type="text"
	                            class="form-control"
	                            name="editorial"
	                            placeholder="Introduzca la editorial del libro"
	                        >
	                    </div>
	                    @error('editorial')
	                        <div class="col-span-12 sm:col-span-12">
	                            <small style="color:red">*{{ $message }}*</small>
	                        </div>
	                    @enderror
	                </div>
	                <div class="col-sm-12 col-md-6 mb-0">
	                    <div class="form-group">
	                        <label for="edicion">Edición</label>
	                        <input
	                            type="text"
	                            class="form-control"
	                            name="edicion"
	                            placeholder="Introduzca la edición del libro"
	                        >
	                    </div>
	                    @error('edicion')
	                        <div class="col-span-12 sm:col-span-12">
	                            <small style="color:red">*{{ $message }}*</small>
	                        </div>
	                    @enderror
	                </div>
	            </div>
	            <br>
	            <div class="row">
	                <div class="col-sm-12 col-md-6 mb-0">
	                    <div class="form-group">
	                        <label for="isbn">ISBN</label>
	                        <input
	                            type="text"
	                            class="form-control"
	                            name="isbn"
	                            placeholder="Introduzca el ISBN del libro"
	                        >
	                    </div>
	                    @error('isbn')
	                        <div class="col-span-12 sm:col-span-12">
	                            <small style="color:red">*{{ $message }}*</small>
	                        </div>
	                    @enderror
	                </div>
	                <div class="col-sm-12 col-md-6 mb-0">
	                    <div class="form-group">
	                        <label for="paginas">Páginas</label>
	                        <input
	                            type="number"
	                            class="form-control"
	                            name="paginas"
	                            placeholder="Introduzca el número de páginas del libro"
	                        >
	                    </div>
	                    @error('paginas')
	                        <div class="col-span-12 sm:col-span-12">
	                            <small style="color:red">*{{ $message }}*</small>
	                        </div>
	                    @enderror
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-sm-12 mb-3">
	            <div class="form-group">
	                <label for="notas">Notas</label>
	                <textarea class="form-control" name="notas" rows="3" placeholder="Escriba comentarios acerca del libro"></textarea>
	            </div>
	            @error('notas')
	                <div class="col-span-12 sm:col-span-12">
	                    <small style="color:red">Escriba una descripción</small>
	                </div>
	            @enderror
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-sm-12 mb-3">
	            <center><label><b>Clasificación del Material</b></label></center>
	        </div>
	    </div>
	    <style>
	        .form-control2 {
	            width: calc(2rem + 2px);
	            height: calc(2rem + 2px);
	            padding: 0.375rem 0.75rem;
	            font-size: 1rem;
	            font-weight: 400;
	            line-height: 1.5;
	            color: #495057;
	            background-color: #fff;
	            background-clip: padding-box;
	            border: 1px solid #ced4da;
	            border-radius: 0.25rem;
	            box-shadow: inset 0 0 0 transparent;
	            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	        }

	    </style>
	    <div class="row">
	        <div class="col-sm-12 col-md-6 mb-0">
	            <div class="form-group">
	                <label>
	                    <input type="checkbox" class="form-control2" name="clasific[]" value="InvestigacionFID"> Investigacion
	                </label>
	            </div>
	        </div>
	        <div class="col-sm-12 col-md-6 mb-0">
	            <div class="form-group">
	                <label>
	                    <input type="checkbox" class="form-control2" name="clasific[]" value="Digitalizacion1"> Digitalización (Libro)
	                </label>
	            </div>
	        </div>
	        <div class="col-sm-12 col-md-6 mb-0">
	            <div class="form-group">
	                <label>
	                    <input type="checkbox" class="form-control2" name="clasific[]" value="Digitalizacion2"> Digitalización (Audiovisual)
	                </label>
	            </div>
	        </div>
	        <div class="col-sm-12 col-md-6 mb-0">
	            <div class="form-group">
	                <label>
	                    <input type="checkbox" class="form-control2" name="clasific[]" value="Transcripción"> Transcripción
	                </label>
	            </div>
	        </div>
	        <div class="col-sm-12 col-md-6 mb-0">
	            <div class="form-group">
	                <label>
	                    <input type="checkbox" class="form-control2" name="clasific[]" value="Transcripción"> Catálogo Bibliográfico
	                </label>
	            </div>
	        </div>
	    </div>
	    @error('clasific')
            <div class="col-span-12 sm:col-span-12">
                <small style="color:red">Debe clasificar el material</small>
            </div>
        @enderror
	    <br><br>
	    <div class="row">
	        <div class="col-sm-12 mb-3">
	            <center><label><b>Si se trata un medio físico, por favor, adjunte 4 imagenes para evaluar el estado del mismo</b></label></center>
	        </div>
	    </div>
	    <style>
	        .imgloaders{
	            text-align:center;
	        }
	        .imgloaders input{
	            margin:auto;
	        }
	    </style>
	    <script>
	        function l_img1(){
	            document.getElementById("img_1").click();
	        }

	        function l_img2(){
	            document.getElementById("img_2").click();
	        }

	        function l_img3(){
	            document.getElementById("img_3").click();
	        }

	        function l_img4(){
	            document.getElementById("img_4").click();
	        }

	        function load_file(){
	            document.getElementById("l_file").click();
	        }

	        function delete_file(){
	            document.getElementById("dfile").style.display = 'none';
	            document.getElementById("lfile").style.display = 'block';
	            document.getElementById("l_file").value = "";
	            Swal.fire({
	                icon: 'success',
	                title: 'Archivo eliminado correctamente',
	                showConfirmButton: false,
	                timer: 2500
	            });
	        }

	        function d_img1(){
	            document.getElementById("dimg1").style.display = 'none';
	            document.getElementById("limg1").style.display = 'block';
	            document.getElementById("img_1").value = "";
	            Swal.fire({
	                icon: 'success',
	                title: 'Imagen eliminada correctamente',
	                showConfirmButton: false,
	                timer: 2500
	            });
	        }

	        function d_img2(){
	            document.getElementById("dimg2").style.display = 'none';
	            document.getElementById("limg2").style.display = 'block';
	            document.getElementById("img_2").value = "";
	            Swal.fire({
	                icon: 'success',
	                title: 'Imagen eliminada correctamente',
	                showConfirmButton: false,
	                timer: 2500
	            });
	        }

	        function d_img3(){
	            document.getElementById("dimg3").style.display = 'none';
	            document.getElementById("limg3").style.display = 'block';
	            document.getElementById("img_3").value = "";
	            Swal.fire({
	                icon: 'success',
	                title: 'Imagen eliminada correctamente',
	                showConfirmButton: false,
	                timer: 2500
	            });
	        }

	        function d_img4(){
	            document.getElementById("dimg4").style.display = 'none';
	            document.getElementById("limg4").style.display = 'block';
	            document.getElementById("img_4").value = "";
	            Swal.fire({
	                icon: 'success',
	                title: 'Imagen eliminada correctamente',
	                showConfirmButton: false,
	                timer: 2500
	            });
	        }

	        function img1(){
	            document.getElementById("dimg1").style.display = 'block';
	            document.getElementById("limg1").style.display = 'none';
	            var filename = document.getElementById("img_1").value;
	            if(filename!=""){
	                Swal.fire({
	                    icon: 'success',
	                    title: 'Imagen cargada correctamente',
	                    showConfirmButton: false,
	                    timer: 2500
	                });
	            }
	        }

	        function img2(){
	            document.getElementById("dimg2").style.display = 'block';
	            document.getElementById("limg2").style.display = 'none';
	            var filename = document.getElementById("img_2").value;
	            if(filename!=""){
	                Swal.fire({
	                    icon: 'success',
	                    title: 'Imagen cargada correctamente',
	                    showConfirmButton: false,
	                    timer: 2500
	                });
	            }
	        }

	        function img3(){
	            document.getElementById("dimg3").style.display = 'block';
	            document.getElementById("limg3").style.display = 'none';
	            var filename = document.getElementById("img_3").value;
	            if(filename!=""){
	                Swal.fire({
	                    icon: 'success',
	                    title: 'Imagen cargada correctamente',
	                    showConfirmButton: false,
	                    timer: 2500
	                });
	            }
	        }

	        function img4(){
	            document.getElementById("dimg4").style.display = 'block';
	            document.getElementById("limg4").style.display = 'none';
	            var filename = document.getElementById("img_4").value;
	            if(filename!=""){
	                Swal.fire({
	                    icon: 'success',
	                    title: 'Imagen cargada correctamente',
	                    showConfirmButton: false,
	                    timer: 2500
	                });
	            }
	        }

	        function loaded_file(){
	            document.getElementById("dfile").style.display = 'block';
	            document.getElementById("lfile").style.display = 'none';
	            var filename = document.getElementById("l_file").value;
	            if(filename!=""){
	                Swal.fire({
	                    icon: 'success',
	                    title: 'Archivo cargado correctamente',
	                    showConfirmButton: false,
	                    timer: 2500
	                });
	            }
	        }
	    </script>
	    <div class="row" id="img_s">
	        <div class="col-sm-12 col-md-3 mb-0">
	            <div class="form-group imgloaders">
	                <label>Imagen 1</label><br>

	                <input type="button" id="limg1" onclick="l_img1()" class="btn btn-primary" value="Cargar Imagen">
	                <input type="button" id="dimg1" onclick="d_img1()" class="btn btn-danger" value="Borrar Imagen" style="display:none;">
	                
	                <input type="file" onchange="img1()" accept="image/x-png,image/gif,image/jpeg" id="img_1" name="img_1" style="display:none;">
	            </div>
	        </div>
	        <div class="col-sm-12 col-md-3 mb-0">
	            <div class="form-group imgloaders">
	                <label>Imagen 2</label><br>

	                <input type="button" id="limg2" onclick="l_img2()" class="btn btn-primary" value="Cargar Imagen">
	                <input type="button" id="dimg2" onclick="d_img2()" class="btn btn-danger" value="Borrar Imagen" style="display:none;">
	                
	                <input type="file" onchange="img2()" accept="image/x-png,image/gif,image/jpeg" id="img_2" name="img_2" style="display:none;">
	            </div>
	        </div>
	        <div class="col-sm-12 col-md-3 mb-0">
	            <div class="form-group imgloaders">
	                <label>Imagen 3</label><br>

	                <input type="button" id="limg3" onclick="l_img3()" class="btn btn-primary" value="Cargar Imagen">
	                <input type="button" id="dimg3" onclick="d_img3()" class="btn btn-danger" value="Borrar Imagen" style="display:none;">
	                
	                <input type="file" onchange="img3()" accept="image/x-png,image/gif,image/jpeg" id="img_3" name="img_3" style="display:none;">
	            </div>
	        </div>
	        <div class="col-sm-12 col-md-3 mb-0">
	            <div class="form-group imgloaders">
	                <label>Imagen 4</label><br>

	                <input type="button" id="limg4" onclick="l_img4()" class="btn btn-primary" value="Cargar Imagen">
	                <input type="button" id="dimg4" onclick="d_img4()" class="btn btn-danger" value="Borrar Imagen" style="display:none;">
	                
	                <input type="file" onchange="img4()" accept="image/x-png,image/gif,image/jpeg" id="img_4" name="img_4" style="display:none;">
	            </div>
	        </div>
		</div>
		<br><br>
		<div class="row">
	        <div class="col-sm-12 mb-3">
	            <center><label><b>Si se trata un medio digital, por favor, adjúntelo aquí:</b></label></center>
	        </div>
	    </div>

	    <div class="row">
	        <div class="form-group imgloaders">
	            <label>Cargar Archivo:</label><br>

	            <input type="button" id="lfile" onclick="load_file()" class="btn btn-primary" value="Cargar Archivo">
	            <input type="button" id="dfile" onclick="delete_file()" class="btn btn-danger" value="Borrar Archivo" style="display:none;">
	            
	            <input type="file" onchange="loaded_file()" accept="image/x-png,image/gif,image/jpeg,pdf,xlsx,docx,pptx" id="l_file" name="l_file" style="display:none;">
	        </div>
	    </div>
	    <br><br>
	    <div class="row" style="align-items: center; justify-content: center;">
	    	<div class="col-sm-12 col-md-3 mb-0">
	            <div class="form-group imgloaders">
	                <input type="submit" class="btn btn-secondary" value="Cargar Material">
	            </div>
	        </div>

	        <div class="col-sm-12 col-md-3 mb-0">
	            <div class="form-group imgloaders">
	                <a class="btn btn-danger" href="{{route('contribute.home')}}">Volver atrás</a>
	            </div>
	        </div>
	    </div>

	</div>
</form>

@endsection