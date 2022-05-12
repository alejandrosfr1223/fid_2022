<div>
    <div class="p-4">
        <div class="card">
            <div class="card-header">
                <div class="row m-2">
                    <h2 class="card-title flex-1"><strong>Lista de usuarios</strong></h2>
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
            @can('admin.crud.users.create')
                <a href="{{ route('admin.users.create') }}" class="btn btn-secondary m-4">
                    Añadir usuario
                </a>
            @endcan

            <div class="card-body table-responsive p-0">
                @if ($users->count())
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Foto</th> {{-- ID --}}
                            <th>Nombre</th>
                            <th>e-mail</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            @can('admin.crud.users.edit')
                            <th class="text-center">Editar</th>
                            @endcan
                            @can('admin.crud.users.destroy')
                            <th class="text-center">Eliminar</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td title="{{ $user->id }}">
                                <img
                                    src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                    {{-- onerror="this.onerror=null; this.src='/img/person.png'" --}}
                                    onerror="this.src='{{ asset('img/person.png') }}'"
                                    alt="{{ 'Imagen de ' . $user->name }}"
                                    class="img-circle img-size-32 mr-2"
                                >
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            @can('admin.crud.users.edit')
                            <td class="text-center">
                                <a href="{{ route('admin.users.edit', $user) }}" title="Editar"><i class="fas fa-edit"></i></a>
                            </td>
                            @endcan
                            @can('admin.crud.users.destroy')
                            <td class="text-center">
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button
                                        type="submit"
                                        title="Eliminar"
                                        style="color: red"
                                        onclick="return confirm('¿Está seguro que desea eliminar a este usuario?')"><i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-4">
                    {{ $users->links() }}
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
