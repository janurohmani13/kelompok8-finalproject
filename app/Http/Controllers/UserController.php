<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Ambil data pengguna dari database (misalnya)
        $users = \App\Models\User::all();

        return view('users.index', compact('users'));
    }
}
