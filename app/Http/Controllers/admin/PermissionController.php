<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crud.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = new Permission();
        $roles = Role::all();
        $origen = 'create';
        return view('admin.crud.permissions.create', compact('roles', 'permission', 'origen'));
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
            'name' => 'required|max:254'
        ]);

        // Creando permiso
        $permission = Permission::create(['name' => $request->name]);

        // Asignando permisos a roles seleccionados
        $roles = Role::all();
        foreach($roles as $role){
            if($request->input("role" . $role->id)){
                $roles->find($role->id)->givePermissionTo($permission);
            }
        }

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha creado el permiso: ' . $request->name);

        // Redireccionar a la vista index
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        $roles = Role::all();
        $origen = 'show';
        return view('admin.crud.permissions.edit', compact('permission', 'roles', 'origen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $roles = Role::all();
        $origen = 'edit';
        return view('admin.crud.permissions.edit', compact('permission', 'roles', 'origen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        // Validación
        $request->validate([
            'name' => 'required|max:254'
        ]);

        // actualizando permiso
        $permission->name = $request->name;
        $permission->save();

        // Actualizando permisos a roles seleccionados
        $roles = Role::all();
        foreach($roles as $role){
            if($request->input("role" . $role->id)){
                $roles->find($role->id)->givePermissionTo($permission);
            }else {
                $roles->find($role->id)->revokePermissionTo($permission);
            }
        }

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha actualizado el permiso a: ' . $request->name);

        // Redireccionar a la vista index
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $nombre = $permission->name;
        $permission->delete();
        Alert::info('¡Advertencia!', 'Se ha eliminado el permiso: ' . $nombre);
        return redirect()->route('admin.permissions.index');
    }
}
