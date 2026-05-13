<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
        public function index()
    {
        // Retorna a view do formulário
        return view('users');
    }
}
