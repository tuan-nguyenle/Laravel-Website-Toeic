<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\AdminController;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends AdminController
{
    public function index()
    {
        $listRole = Role::getAllRole();
        return view('role.index')->with([
            'lstRole' => $listRole
        ]);
    }

    public function add(Request $request)
    {
        $roleName = $request->txtRoleName;
        $checkRole = role::getNameRole($roleName);

        if (count($checkRole) > 0) {
            return back()->with('error', 'Role Name Exist');
        }

        role::insertRole($roleName);

        return redirect()->route('role.index');
    }

    public function delete(Request $request)
    {

        $roleID = $request->id;
        role::deleteRole($roleID);
        return response()->json([
            'status' => 'success',
            'message' => 'Delete Role Successfully !!'
        ]);
    }

    public function update(Request $request)
    {
        $roleID = $request->id;
        $data = array($request->col => $request->value);
        role::updateRole($roleID, $data);
        return response()->json([
            'status' => 'success',
            'message' => 'Update Successfully !!'
        ]);
    }
}
