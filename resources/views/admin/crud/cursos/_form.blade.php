<div class="card-body m-4">
    <div class="row">
        <div class="col-sm-12 col-md-10 mb-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="titulo">Título del curso/congreso</label>
                        <input
                            type="text"
                            class="form-control"
                            name="titulo"
                            placeholder="Introduzca el título del curso/congreso"
                            value="{{ old('titulo', $curso->titulo) }}"
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
                        <label for="ponente">Ponente</label>
                        <input
                            type="text"
                            class="form-control"
                            name="ponente"
                            placeholder="Introduzca el ponente del curso/congreso"
                            value="{{ old('ponente', $curso->ponente) }}"
                        >
                    </div>
                    @error('ponente')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="enlace">URL del curso/congreso</label>
                        <input
                            type="url"
                            class="form-control"
                            name="enlace"
                            placeholder="Introduzca la URL del curso/congreso"
                            value="{{ old('enlace', $curso->enlace) }}"
                        >
                    </div>
                    @error('enlace')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="costo">Costo</label>
                        <input
                            type="text"
                            class="form-control"
                            name="costo"
                            placeholder="Introduzca el costo del curso/congreso"
                            value="{{ old('costo', $curso->costo) }}"
                        >
                    </div>
                    @error('costo')
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
                <textarea class="form-control" name="notas" rows="3" placeholder="Escriba comentarios acerca del curso/congreso">{{ old('notas', $curso->notas) }}</textarea>
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
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" rows="3" placeholder="Escriba la descripción detallada del curso/congreso">{{ old('descripcion', $curso->descripcion) }}</textarea>
            </div>
            @error('descripcion')
                <div class="col-span-12 sm:col-span-12">
                    <small style="color:red">*{{ $message }}*</small>
                </div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3">
            <center><label>Clasificación del Curso</label></center>
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
        $clasification = json_decode($curso->clasific);
        if (is_null($clasification)){
            $clasification=[];
        }
    @endphp
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-0">
            <div class="form-group">
                <label>
                    <input type="checkbox" class="form-control2" name="clasific[]" value="Congreso" {{ in_array('Congreso', $clasification) ? 'checked' : '' }}> Congreso
                </label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-0">
            <div class="form-group">
                <label>
                    <input type="checkbox" class="form-control2" name="clasific[]" value="Curso" {{ in_array('Curso', $clasification) ? 'checked' : '' }}> Curso
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
        $disponible = json_decode($curso->disponib);
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
</div>
