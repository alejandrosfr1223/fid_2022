<div>
    <div class="p-4">
        <div class="card">
            <div class="card-header">
                <div class="row m-2">
                    <h2 class="card-title flex-1"><strong>Lista de cursos</strong></h2>
                    <div class="card-tools flex-1">
                        <div class="input-group input-group-sm">
                            <input wire:model="search" type="text" class="form-control float-right" placeholder="Buscar">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="input-group-sm mx-3 flex" style="width: 140px">
                        <select wire:model="perPage" class="form-control float-right">
                            <option value="5">5 por pág. </option>
                            <option value="10">10 por pág.</option>
                            <option value="15">15 por pág.</option>
                            <option value="25">25 por pág.</option>
                            <option value="50">50 por pág.</option>
                            <option value="100">100 por pág.</option>
                        </select>
                        @if ($search !== '')
                        <div class="input-group-sm flex">
                            <button wire:click="clear" class="btn btn-secondary form-control float-right"><i class="far fa-window-close"></i></button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @can('admin.crud.cursos.create')
                <a href="{{ route('admin.cursos.create') }}" class="btn btn-secondary m-4">
                    Añadir libro
                </a>
            @endcan

            <div class="card-body table-responsive p-0">
                @if ($cursos->count())
                <table class="table table-hover text-wrap">
                    <thead>
                        <tr>
                            <th>Titulo / Ponente</th> {{-- ID --}}
                            <th>Creado</th>
                            <th>Actualizado</th>
                            @can('admin.crud.cursos.edit')
                            <th class="text-center">Editar</th>
                            @endcan
                            @can('admin.crud.cursos.destroy')
                            <th class="text-center">Eliminar</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
                        <tr>
                            <td title="{{ $curso->id }}">
                                <p class="m-0">{{ $curso->titulo }}</p>
                                <small><strong>{{ $curso->ponente }}</strong></small>
                            </td>
                            <td>{{ $curso->created_at }}</td>
                            <td>{{ $curso->updated_at }}</td>
                            @can('admin.crud.cursos.edit')
                            <td class="text-center">
                                <a href="{{ route('admin.cursos.edit', $curso) }}" title="Editar"><i class="fas fa-edit"></i></a>
                            </td>
                            @endcan
                            @can('admin.crud.cursos.destroy')
                            <td class="text-center">
                                <form action="{{ route('admin.cursos.destroy', $curso) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button
                                        type="submit"
                                        title="Eliminar"
                                        style="color: red"
                                        onclick="return confirm('¿Está seguro que desea eliminar a este libro?')"><i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-4">
                    {{ $cursos->links() }}
                </div>
                @else
                    <div class="m-4">
                        <p>No hay resultado para la búsqueda: <strong>{{ $search }}</strong></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
