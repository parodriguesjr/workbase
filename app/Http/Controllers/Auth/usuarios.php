<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('users.index')
                         ->with('success', 'Usuário cadastrado com sucesso!');
    }
}