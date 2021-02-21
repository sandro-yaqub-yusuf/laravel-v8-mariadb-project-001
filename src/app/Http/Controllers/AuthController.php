<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterCreateRequest;
use App\Services\AuthService;
use Exception;

class AuthController extends Controller
{
    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');

            return redirect('/auth/login');
        }
    }

    public function login() 
    {
        return view('auth.login');
    }

    public function loginCheck(AuthLoginRequest $request, AuthService $authService)
    {
        $result = [];

        try {
            $data = $request->only([
                'email',
                'password'
            ]);

            $userInfo = $authService->getLogin($data);

            $request->session()->put('LoggedUser', ['user_id' => $userInfo->id, 'user_name' => $userInfo->name]);

            return redirect()->route('home');
        } 
        catch (Exception $ex) {
            $message[] = ['ERROR' => $ex->getMessage()];

            $result = [
                'status' => 'ERRO',
                'message' => $message
            ];
        }

        return view('auth.login', ['resultAction' => $result]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerCheck(AuthRegisterCreateRequest $request, AuthService $authService)
    {
        $result = [];

        try {
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);

            $authService->create($data);

            return redirect()->route('auth-login');
        } 
        catch (Exception $ex) {
            $message[] = ['ERROR' => $ex->getMessage()];

            $result = [
                'status' => 'ERRO',
                'message' => $message
            ];
        }

        return view('auth.register', ['resultAction' => $result]);
    }
}
