<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Roles;
use Illuminate\Http\Request;

class AdminAccess extends Controller
{
    public function index() {
        $roles = Roles::all()->sortBy('name');
        $access = Access::all()->groupBy('prefix')->sortBy('roles_id');
        return view('admin.access.access', [
            'roles' => $roles,
            'access' => $access
        ]);
    }

    public function create (Request $request) {

        $prefix =  trim($request->input('prefix'));
        $roles_id = $request->input('roles_id');
        $ac = Access::where('prefix', $prefix)->where('roles_id', $roles_id)->first();
        if ($ac == null) {
            Access::create([
                'prefix'   => $prefix,
                'roles_id' => $roles_id
            ]);
        }
        return redirect(route('access'));
    }

    public function delete(int $id) {
        $access = Access::findOrFail($id);
        $access->delete();
        return redirect(route('access'));
    }
}
