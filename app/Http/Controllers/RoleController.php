<?php

namespace App\Http\Controllers;

use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:index-rol|store-rol|update-rol|destroy-rol', ['only' => ['index', ' show']]);
        $this->middleware('permission:store-rol', ['only' => ['store']]);
        $this->middleware('permission:update-rol', ['only' => ['update']]);
        $this->middleware('permission:destroy-rol', ['only' => ['destroy', 'destroys']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return response()->json(
            [
                'data' => $roles,
                'summary' => 'consulta exitosa',
                'detail' => '',
                'code' => '200'
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        //prueba en pantalla de angular para asignar los permisos de la tabla permission
        $role = new Role();
        $role->name = $request->input('name');
        $role->syncPermissions($request->input('permission'));

        $role->save();


        return (new RoleResource($role))
            ->additional([
                'msg' => [
                    'summary' => 'rol creado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return (new RoleResource($role))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => 'consulta exitosa',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return (new RoleResource($role))
            ->additional([
                'msg' => [
                    'summary' => 'rol actualizado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        //prueba en pantalla de angular para asignar los permisos de la tabla permission
        $role = Role::find($role);
        $role->delete();
        return (new RoleResource($role))
            ->additional([
                'msg' => [
                    'summary' => 'rol eliminado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
}
