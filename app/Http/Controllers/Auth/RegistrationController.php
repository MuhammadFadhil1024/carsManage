<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('pages.authentication.registration');
    }

    public function store(RegistrationRequest $request)
    {
        // dd($request);

        if ($request->password != $request->passwordConfirmation) {
            return redirect()->back()->with('failed', 'confirmation password is not the same');
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
            ]);

            auth()->login($user);

            return redirect()->route('dashboard.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Error during the creation!');
        }
    }
}
