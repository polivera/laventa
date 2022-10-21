<?php

namespace App\Http\Controllers;

use App\Models\User;

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
        echo "This is the user add view";
    }

    public function details()
    {
        echo "This is for the user details";
    }

    public function save()
    {
        echo "This is for saving the user";
    }

    public function delete()
    {
        echo "This is for deleting the user";
    }
}
