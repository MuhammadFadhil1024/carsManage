<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {

        return view('pages.authentication.login');
    }

    public function store(LoginRequest $request)
    {
        try {

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard.');
            }
            return redirect()->back()->with('failed', 'email or password wrong');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Error during the creation!');
        }
    }

    public function logout()
    {
        try {
            auth()->logout();

            return redirect()->route('login');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
