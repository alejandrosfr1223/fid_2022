<div class="card-body m-4">
    <div class="row">
        <div class="col-sm-12 col-md-2 p-3">
            <img
                src="{{ asset('storage/' . $user->profile_photo_path) }}"
                onerror="this.onerror=null; this.src='/img/person.png'"
                alt="{{ 'Imagen de ' . $user->name }}"
                class="img-circle"
                width="150px"
                class="mt-5"
            >
        </div>
        <div class="col-sm-12 col-md-10 mb-3">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="name">Nombre del usuario</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            placeholder="Introduzca el nombre del usuario"
                            value="{{ old('name', $user->name) }}"
                        >
                    </div>
                    @error('name')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            placeholder="Introduzca el e-mail del usuario"
                            value="{{ old('email', $user->email) }}"
                        >
                    </div>
                    @error('email')
                        <div class="col-span-12 sm:col-span-12">
                            <small style="color:red">*{{ $message }}*</small>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-0">
                    <div class="form-group">
                        @if($origen == 'edit')
                        <label for="name">Reasignar password</label>
                        @else
                        <label for="name">Asignar password</label>
                        @endif
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            placeholder="Introduzca el password del usuario"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 mb-0">
            <div class="form-check">
                <p><label>Roles del usuario</label></p>
                <div class="m-4">
                    <div class="row">
                        @foreach ($roles as $role)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            @if($origen == 'edit')
                                @if ($user->hasRole($role->name))
                                <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input" checked>
                                @else
                                <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input">
                                @endif
                            @else
                                <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input">
                            @endif
                            <label for="{{ "role" . $role->id }}" class="form-check-label">{{ $role->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if($origen == 'edit')
                <p><label>Permisos del usuario</label></p>
                <div class="m-4">
                    <div class="row">
                        @foreach ($permissions as $permission)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            @if ($user->hasPermissionTo($permission->name))
                            <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input" checked>
                            @else
                            <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input">
                            @endif
                            <label for="{{ "permiso" . $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
