<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Role::orderBy('id', 'desc')->with('permissions')->paginate(8);
        //return $categories;
        return view('roles.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|unique:roles,name,NULL,id',
            'attach_permissions' => 'required'
        ]);

        $attach_permissions = $request->attach_permissions;

        $new_role = new Role($request->all());
        $new_role->save();
        if ($new_role) {
            if($attach_permissions){
                $new_role->permissions()->attach($attach_permissions);
            }
            return redirect()->route('roles.index')->with('success', 'Operation Successfull!');
        } else {
            return redirect()->route('roles.index')->with('failure', 'Operation Failed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'attach_permissions' => 'required'
        ]);

        $attach_permissions = $request->attach_permissions;
        $role = Role::findOrFail($id);
        $role->fill($request->all());

        $role->save();
        if ($role) {
            if($attach_permissions){
                $role->permissions()->sync($attach_permissions);
            }
            return redirect()->route('roles.index')->with('success', 'Operation Successfull!');
        } else {
            return redirect()->route('roles.index')->with('failure', 'Operation Failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
