<?php

namespace App\Http\Controllers\Admin;

use App\Models\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRole extends Controller
{
    public function roles() {
        $roles = Roles::all()->sortBy('name');
        return view('admin.roles.roles', [
            'roles' => $roles
        ]);
    }

    public function create(Request $request) {

        $this->validate($request, [
           'name' => 'required|unique:roles'
        ], [
            'name.required' => 'Пустое поле "name"',
            'name.unique'   => 'Запись уже существует'
        ]);

        $name = trim($request->input('name'));
        $description = trim($request->input('description'));
        $is_edit = ($request->input('is_edit') === 'on' ? true : false);
        $is_read = ($request->input('is_read') === 'on' ? true : false);
        $is_delete = ($request->input('is_delete') === 'on' ? true : false);
        Roles::create([
            'name'=> $name,
            'description' => $description,
            'is_edit'     => $is_edit,
            'is_read'     => $is_read,
            'is_delete'   => $is_delete
        ]);
        return redirect(route('roles'));
    }

    public function editForm(int $id) {
        $role = Roles::findOrFail($id);
        return view('admin.roles.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request) {
        $id = trim($request->input('id'));
        $name = trim($request->input('name'));
        $description = trim($request->input('description'));
        $is_edit = ($request->input('is_edit') === 'on' ? true : false);
        $is_read = ($request->input('is_read') === 'on' ? true : false);
        $is_delete = ($request->input('is_delete') === 'on' ? true : false);

        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$id
        ], [
            'name.required' => 'Пустое поле "name"',
            'name.unique'   => 'Запись уже существует'
        ]);



        $role = Roles::findOrFail($id);
        $role->name = $name;
        $role->description = $description;
        $role->is_edit = $is_edit;
        $role->is_read = $is_read;
        $role->is_delete = $is_delete;

        $role->save();
        return redirect(route('roles'));
    }

    public function delete($id) {
        $role = Roles::findOrFail($id);
        $role->delete();
        return redirect(route('roles'));
    }
}
