<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function create()
    {
        return view('admin.permission.add');
    }
    public function store(Request $request)
    {
        $permission = Permission::create([
            'name'=> $request-> module_parent,
            'display_name'=> $request -> module_parent,
            'parent_id' => 0,
            'key_code'=> ''
        ]);
        foreach ($request-> module_children as $value) {
            Permission::create([
                'name' => $value . ' ' . $request-> module_parent,
                'display_name' => $value . ' ' . $request-> module_parent,
                'parent_id' => $permission->id,
                'key_code' => $value . '_' . $request-> module_parent
            ]);
        }
        return redirect()->route('permission.create');
    }
}
