<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    private User $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    //
    public function index()
    {
        $users = $this->userModel->getUsers();
        return view('admin.users.list', ['users' => $users]);
    }

    public function add()
    {
        return view('admin.users.form', [
            'id' => '',
            'name' => '',
            'email' => '',
            'password' => '',
        ]);
    }

    public function details($id)
    {
        $user = $this->userModel->getById($id);
        if (!$user) {
            return abort(404, 'Page not found');
        }
        return view('admin.users.form', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'password' => ''
        ]);
    }

    public function save(SaveUserRequest $request)
    {
        $id = $request->input('id', null);
        if ($id) {
            $user = $this->userModel->getById($id);
            if ($user && $user->role == 'admin') {
                return abort(500, 'Internal server error');
            }
        }

        $request->validated();
        $dataToStore = [
            User::EMAIL => $request->input('email'),
            User::NAME => $request->input('name'),
        ];

        $password = $request->input('password', null);
        if ($password) {
            $dataToStore[User::PASSWORD] = Hash::make($password);
        }

        if ($id) {
            $this->userModel->change($id, $dataToStore);
        } else {
            $this->userModel->new($dataToStore);
        }

        return redirect('/admin/usuarios');
    }

    public function delete($id)
    {
        $user = $this->userModel->getById($id);
        if ($user && $user->role == 'admin') {
            return abort(500, 'Internal server error');
        }
        $this->userModel->remove($id);

        return redirect('/admin/usuarios');
    }
}
