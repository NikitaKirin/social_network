<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    const REGISTER_VALIDATOR = [
        'name'     => 'required|string|max:12',
        'surname'  => 'string|max:12',
        'city'     => 'string|max:15|nullable',
        'email'    => 'required|email|unique:users',
        'password' => 'required',
        'birthday' => 'date|nullable',
    ];

    const  REGISTER_MESSAGES = [
        'required' => 'Данное поле обязательно для заполнения',
        'max:'     => 'Поле должно содержать не более max: символов',
        'date'     => 'Неверно указан формат даты',
        'email'    => 'Неверно указан email',
        'string'   => 'Данное поле содержит недопустимые символы',
        'unique'   => 'Данный email адрес уже используется',
    ];

    public function index()
    {
        return view('auth.registration-form');
    }

    public function create(Request $request)
    {
        $validate_fields = $request->validate(self::REGISTER_VALIDATOR, self::REGISTER_MESSAGES);
        $user = User::create($validate_fields);
        Auth::login($user);
        if ($user)
            return redirect()->route('users.index')->with('success', 'Вы успешно зарегистрированы и вошли в аккаунт!');

        return redirect()->back()->withErrors('Произошла ошибка при регистрации пользователя. Попробуйте еще раз.');
    }

}
