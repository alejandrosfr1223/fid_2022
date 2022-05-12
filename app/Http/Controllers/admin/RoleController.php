<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crud.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $role = new Role();
        $origen = 'create';
        return view('admin.crud.roles.create', compact('permissions', 'role', 'origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|max:254|unique:roles,name'
        ]);

        // almacenando rol
        $role = Role::create(['name' => $request->name]);

        // Asignando permisos seleccionados al rol
        $permissions = Permission::all();
        foreach($permissions as $permission){
            if($request->input("permiso" . $permission->id)){
                $role->givePermissionTo($permission->name);
            }
        }

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha creado el rol: ' . $request->name);

        // Redireccionar a la vista index
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = permission::all();
        $origen = 'show';
        return view('admin.crud.roles.edit', compact('role', 'permissions', 'origen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = permission::all();
        $origen = 'edit';
        return view('admin.crud.roles.edit', compact('role', 'permissions', 'origen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // Validación
        $request->validate([
            'name' => 'required|max:254|unique:roles,name,'.$role->name.',name'
        ]);

        // actualizando rol
        $role->name = $request->name;
        $role->save();

        // Actualizando permisos seleccionados al rol
        $permissions = Permission::all();
        foreach($permissions as $permission){
            if($request->input("permiso" . $permission->id)){
                $role->givePermissionTo($permission->name);
                //$roles->find($role->id)->givePermissionTo($permission);
            }else {
                $role->revokePermissionTo($permission->name);
                //$roles->find($role->id)->revokePermissionTo($permission);
            }
        }

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha actualizado el rol a : ' . $request->name);

        // Redireccionar a la vista index
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $nombre = $role->name;
        $role->delete();
        Alert::info('¡Advertencia!', 'Se ha eliminado el rol: ' . $nombre);
        return redirect()->route('admin.roles.index');
    }
}
