<div class="card-body m-4">
    <div class="form-group">
        <label for="name">Nombre del rol</label>
        <input
            type="text"
            class="form-control"
            name="name"
            placeholder="Introduzca el nombre del rol"
            value="{{ old('name', $role->name) }}"
        >
    </div>
    @error('name')
        <div class="col-span-12 sm:col-span-12">
            <small style="color:red">*{{ $message }}*</small>
        </div>
    @enderror
    <div class="form-check">
        <p><label>Permisos a asignarle el rol</label></p>
        <div class="m-4">
            <div class="row">
                @foreach ($permissions as $permission)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    @if($origen == 'edit')
                        @if ($role->hasPermissionTo($permission->name))
                        <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input" checked>
                        @else
                        <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input">
                        @endif
                    @else
                        <input name="{{ "permiso" . $permission->id }}" type="checkbox" class="form-check-input">
                    @endif
                    <label for="{{ "permiso" . $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
