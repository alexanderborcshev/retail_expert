<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users', ['users' => User::all()]);
    }

    public function index_test()
    {
        return UserResource::collection(User::all());
    }
}
