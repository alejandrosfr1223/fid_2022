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
        <p><label>Roles a asignarle al permiso</label></p>
        <div class="flex">
            @foreach ($roles as $role)
            <div class="mx-4">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        @if($origen == 'edit')
                            @if ($role->hasPermissionTo($permission->name))
                            <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input" checked>
                            @else
                            <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input">
                            @endif
                        @else
                            <input name="{{ "role" . $role->id }}" type="checkbox" class="form-check-input">
                        @endif

                    </div>
                    <div class="ml-3 text-sm">
                        <label for="{{ "role" . $role->id }}" class="form-check-label">{{ $role->name }}</label>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
