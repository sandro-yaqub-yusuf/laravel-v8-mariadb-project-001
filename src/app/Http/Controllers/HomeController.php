<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(AuthService $authService) 
    {
        $loggedUser = $authService->getById(session('LoggedUser'));

        return view('home', ['loggedUser' => $loggedUser]);
    }

    public function project(AuthService $authService) 
    {
        $loggedUser = $authService->getById(session('LoggedUser'));

        return view('project', ['loggedUser' => $loggedUser]);
    }
}
