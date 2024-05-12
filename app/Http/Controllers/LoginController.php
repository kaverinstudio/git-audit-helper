<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if (Auth::check()){
            return redirect()->intended(route('audits'));
        }

        $formField = $request->only(['email', 'password']);

        if (Auth::attempt($formField)){
            return redirect()->intended(route('audits'));
        }

        return redirect(route('home'))->withErrors([
            'error' => 'Не удалось авторизоваться'
        ]);
    }
}
