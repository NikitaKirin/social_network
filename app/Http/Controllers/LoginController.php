<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    const LOGIN_RULES = [
        'email'    => 'required|email',
        'password' => 'required',
    ];

    const LOGIN_MESSAGES = [
        'required' => 'Данное поле обязательно для заполнения',
        'email'    => 'Введен некорректный формат адреса электронной почты',
    ];


    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $validate_fields = $request->validate(self::LOGIN_RULES, self::LOGIN_MESSAGES);

        if (Auth::attempt($validate_fields))
        {
            $user = User::where('email', $validate_fields['email'])->get()->first();
            Auth::login($user);
            return redirect()->route('home')->with('success', 'Вы успешно вошли в систему!');
        }

        return redirect()->back()->withErrors('Введен неверный email или пароль');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
