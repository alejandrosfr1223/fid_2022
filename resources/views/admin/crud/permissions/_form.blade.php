<div class="card-body m-4">
    <div class="form-group">
        <label for="name">Nombre del permiso</label>
        <input
            type="text"
            class="form-control"
            name="name"
            placeholder="Introduzca el nombre del permiso"
            value="{{ old('name', $permission->name) }}"
        >
    </div>
    @error('name')
        <div class="col-span-12 sm:col-span-12">
            <small style="color:red">*{{ $message }}*</small>
        </div>
    @enderror
    <div class="form-check">
        <p><label>Roles a asignarle el permiso</label></p>
        <div class="m-4">
            <div class="row">
                @foreach ($roles as $role)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    @if($origen == 'edit')
                        @if ($role->hasPermissionTo($permission->name))
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
    </div>
</div>
