<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use DeleteModelTrait;
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role= $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionParent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = $this->role->create([
            'name'=>$request->name,
            'display_name'=>$request->display_name,
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        $roleEdit = $this->role->find($id);
        $permissionChecked = $roleEdit->permissions;

        return view('admin.role.edit', compact('roleEdit', 'permissionChecked', 'permissionParent'));
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
        $this->role->find($id)->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name,
        ]);
        $role = $this->role->find($id);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->DeleteModel($id, $this->role);
    }
}
