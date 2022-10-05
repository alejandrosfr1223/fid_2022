<div class="card-body m-4">
    <div class="row">
        <div class="col-sm-12 col-md-2 mb-3">
            <img
                src="{{ $book->url_img_caratula }}"
                {{-- onerror="this.onerror=null; this.src='/img/caratula.jpg'" --}}
                onerror="this.src='{{ asset('img/caratula.jpg') }}'"
                alt="{{ 'Caratula de ' . $book->titulo }}"
                width="150px"
                class="mt-5"
            >
        </div>
        <div class="col-sm-12 col-md-10 mb-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="titulo">Título del libro</label>
                        <input
                            type="text"
                            class="form-control"
                            name="titulo"
                            placeholder="Introduzca el título del libro"
                            value="{{ old('titulo', $book->titulo) }}"
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
                            value="{{ old('autor', $book->autor) }}"
                        >
                    </div>
                    @error('autor')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="enlace">URL del libro</label>
                        <input
                            type="url"
                            class="form-control"
                            name="enlace"
                            placeholder="Introduzca la URL del libro"
                            value="{{ old('enlace', $book->enlace) }}"
                        >
                    </div>
                    @error('enlace')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="url_img_caratula">URL de la caratula</label>
                        <input
                            type="url"
                            class="form-control"
                            name="url_img_caratula"
                            placeholder="Introduzca la URL de la caratula del libro"
                            value="{{ old('url_img_caratula', $book->url_img_caratula) }}"
                        >
                    </div>
                    @error('url_img_caratula')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="editorial">Editorial</label>
                        <input
                            type="text"
                            class="form-control"
                            name="editorial"
                            placeholder="Introduzca la editorial del libro"
                            value="{{ old('editorial', $book->editorial) }}"
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
                            placeholder="Introduzca el edición del libro"
                            value="{{ old('edicion', $book->edicion) }}"
                        >
                    </div>
                    @error('edicion')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input
                            type="text"
                            class="form-control"
                            name="isbn"
                            placeholder="Introduzca el ISBN del libro"
                            value="{{ old('isbn', $book->isbn) }}"
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
                            value="{{ old('paginas', $book->paginas) }}"
                        >
                    </div>
                    @error('paginas')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input
                            type="text"
                            class="form-control"
                            name="precio"
                            placeholder="Introduzca el precio del libro"
                            value="{{ old('precio', $book->precio) }}"
                        >
                    </div>
                    @error('precio')
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
                <textarea class="form-control" name="notas" rows="3" placeholder="Escriba comentarios acerca del libro">{{ old('notas', $book->notas) }}</textarea>
            </div>
            @error('notas')
                <div class="col-span-12 sm:col-span-12">
                    <small style="color:red">*{{ $message }}*</small>
                </div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3">
            <center><label>Clasificación del Material</label></center>
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
    @php
        $clasification = json_decode($book->clasific);
        if (is_null($clasification)){
            $clasification=[];
        }
    @endphp
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-0">
            <div class="form-group">
                <label>
                    <input type="checkbox" class="form-control2" name="clasific[]" value="EditorialBV" {{ in_array('EditorialBV', $clasification) ? 'checked' : '' }}> Editorial BV
                </label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-0">
            <div class="form-group">
                <label>
                    <input type="checkbox" class="form-control2" name="clasific[]" value="InvestigacionFID" {{ in_array('InvestigacionFID', $clasification) ? 'checked' : '' }}> Investigacion FID
                </label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-0">
            <div class="form-group">
                <label>
                    <input type="checkbox" class="form-control2" name="clasific[]" value="Digitalizacion1" {{ in_array('Digitalizacion1', $clasification) ? 'checked' : '' }}> Digitalización (Libro)
                </label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-0">
            <div class="form-group">
                <label>
                    <input type="checkbox" class="form-control2" name="clasific[]" value="Digitalizacion2" {{ in_array('Digitalizacion2', $clasification) ? 'checked' : '' }}> Digitalización (Audiovisual)
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3">
            <center><label>Disponibilidad</label></center>
        </div>
    </div>
    @php
        $disponible = json_decode($book->disponib);
        if (is_null($disponible)){
            $disponible=[];
        }
    @endphp
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-0">
            <div class="form-group">
                <label>
                    <input type="checkbox" class="form-control2" name="disponib[]" value="Disponible" {{ in_array('Disponible', $disponible) ? 'checked' : '' }}> Disponible
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3">
            <center><label>Carrucel</label></center>
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
    </script>
    <div class="row" id="img_s">
        <div class="col-sm-12 col-md-3 mb-0">
            <div class="form-group imgloaders">
                <label>Imagen 1</label><br>
                @php
                    if ($book->img_1 == null){
                @endphp

                <input type="button" id="limg1" onclick="l_img1()" class="btn btn-primary" value="Cargar Imagen">
                <input type="button" id="dimg1" onclick="d_img1()" class="btn btn-danger" value="Borrar Imagen" style="display:none;">

                @php    
                    } else {
                @endphp

                <input type="button" id="limg1" onclick="l_img1()" class="btn btn-primary" value="Cargar Imagen" style="display:none;">
                <input type="button" id="dimg1" onclick="d_img1()" class="btn btn-danger" value="Borrar Imagen">

                @php         
                    }
                @endphp
                
                <input type="file" onchange="img1()" value="{{ old('img_1', $book->img_1) }}" accept="image/x-png,image/gif,image/jpeg" id="img_1" name="img_1" style="display:none;">
            </div>
        </div>
        <div class="col-sm-12 col-md-3 mb-0">
            <div class="form-group imgloaders">
                <label>Imagen 2</label><br>
                @php
                    if ($book->img_2 == null){
                @endphp

                <input type="button" id="limg2" onclick="l_img2()" class="btn btn-primary" value="Cargar Imagen">
                <input type="button" id="dimg2" onclick="d_img2()" class="btn btn-danger" value="Borrar Imagen" style="display:none;">

                @php    
                    } else {
                @endphp

                <input type="button" id="limg2" onclick="l_img2()" class="btn btn-primary" value="Cargar Imagen" style="display:none;">
                <input type="button" id="dimg2" onclick="d_img2()" class="btn btn-danger" value="Borrar Imagen">
                
                @php         
                    }
                @endphp
                
                <input type="file" onchange="img2()" value="{{ old('img_2', $book->img_2) }}" accept="image/x-png,image/gif,image/jpeg" id="img_2" name="img_2" style="display:none;">
            </div>
        </div>
        <div class="col-sm-12 col-md-3 mb-0">
            <div class="form-group imgloaders">
                <label>Imagen 3</label><br>
                @php
                    if ($book->img_3 == null){
                @endphp

                <input type="button" id="limg3" onclick="l_img3()" class="btn btn-primary" value="Cargar Imagen">
                <input type="button" id="dimg3" onclick="d_img3()" class="btn btn-danger" value="Borrar Imagen" style="display:none;">

                @php    
                    } else {
                @endphp

                <input type="button" id="limg3" onclick="l_img3()" class="btn btn-primary" value="Cargar Imagen" style="display:none;">
                <input type="button" id="dimg3" onclick="d_img3()" class="btn btn-danger" value="Borrar Imagen">
                
                @php         
                    }
                @endphp
                
                <input type="file" onchange="img3()" value="{{ old('img_3', $book->img_3) }}" accept="image/x-png,image/gif,image/jpeg" id="img_3" name="img_3" style="display:none;">
            </div>
        </div>
        <div class="col-sm-12 col-md-3 mb-0">
            <div class="form-group imgloaders">
                <label>Imagen 4</label><br>
                @php
                    if ($book->img_4 == null){
                @endphp

                <input type="button" id="limg4" onclick="l_img4()" class="btn btn-primary" value="Cargar Imagen">
                <input type="button" id="dimg4" onclick="d_img4()" class="btn btn-danger" value="Borrar Imagen" style="display:none;">

                @php    
                    } else {
                @endphp

                <input type="button" id="limg4" onclick="l_img4()" class="btn btn-primary" value="Cargar Imagen" style="display:none;">
                <input type="button" id="dimg4" onclick="d_img4()" class="btn btn-danger" value="Borrar Imagen">
                
                @php         
                    }
                @endphp
                
                <input type="file" onchange="img4()" value="{{ old('img_4', $book->img_4) }}" accept="image/x-png,image/gif,image/jpeg" id="img_4" name="img_4" style="display:none;">
            </div>
        </div>
    </div>
</div>