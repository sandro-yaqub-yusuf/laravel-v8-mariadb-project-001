<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(AuthService $authService) 
    {
        return view('home');
    }

    public function project(AuthService $authService) 
    {
        return view('project');
    }
}
