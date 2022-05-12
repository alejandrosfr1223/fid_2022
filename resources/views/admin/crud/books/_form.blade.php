<div class="card-body m-4">
    <div class="row">
        <div class="col-sm-12 col-md-2 mb-3">
            <img
                src="{{ $book->url_img_caratula }}"
                onerror="this.onerror=null; this.src='/img/caratula.jpg'"
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
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3">
            <div class="form-group">
                <label for="notas">Notas</label>
                <textarea class="form-control" name="notas" rows="3" placeholder="Escriba comentarios acerca del libro">{{ old('notas', $book->notas) }}</textarea>
            </div>
            @error('isbn')
                <div class="col-span-12 sm:col-span-12">
                    <small style="color:red">*{{ $message }}*</small>
                </div>
            @enderror
        </div>
    </div>
</div>
