<?php

namespace App\Http\Controllers\Admin;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Controller
{
    public function users() {
        $users = User::all()->sortBy('name');
        $roles = Roles::all()->sortBy('name');
        return view('admin.users.users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function create() {
        // модуль RegisterController
    }

    public function editForm(int $id) {
        $user = User::findOrFail($id);
        $roles = Roles::all()->sortBy('name');
        return view('admin.users.edit', [
            'user'=>$user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request) {
        $id = $request->input('id');
        $name = trim($request->input('name'));
        $email = trim($request->input('email'));
        $roles_id = $request->input('roles_id');
        $is_enable = ($request->input('is_enable') === 'on' ? true : false);

        $this->validate($request, [
            'name'  => 'required|unique:users,name,'.$id,
            'email' => 'required|unique:users,email,'.$id
        ], [
            'name.required'  => 'Пустое поле "name"',
            'name.unique'    => 'Имя используется',
            'email.required' => 'Пустое поле "email"',
            'email.unique'   => 'email используется'
        ]);

        $user = User::findOrFail($id);
        $user->name = $name;
        $user->email = $email;
        $user->roles_id = $roles_id;
        $user->is_enable = $is_enable;
        $user->save();

        return redirect(route('users'));
    }

    public function resetForm(int $id) {
        $user = User::findOrFail($id);
        return view('admin.users.reset-password', [
            'user' => $user
        ]);
    }

    public function reset(Request $request) {
        $this->validate($request, [
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8||same:password',
        ], [
            'password.required' => 'пустое поле "пароль"',
            'password.min' => 'Минимальная длина пароля 8 символов',
            'password_confirmation.required' => 'пустое поле "Подтверждение пароля"',
            'password_confirmation.min' => 'Минимальная длина пароля 8 символов',
            'password_confirmation.same' => 'Пароль не совпадает'
        ]);

        $id = $request->input('id');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        if ($password !== $password_confirmation)
            return redirect(route('users'));

        $user = User::findOrFail($id);
        $user->password = Hash::make($password);
        $user->save();
        return redirect(route('users'));
    }

    public function delete(int $id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('users'));
    }
}
