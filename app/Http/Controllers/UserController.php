<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const REGISTER_VALIDATOR = [
        'name'     => 'required|string|max:12',
        'surname'  => 'string|max:12',
        'city'     => 'string|max:15|nullable',
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
        //
    }

    public function showEditForm()
    {
        return view('user.user-edit-form', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $validate_fields = $request->validate(self::REGISTER_VALIDATOR, self::REGISTER_MESSAGES);
        $user = Auth::user()->fill($validate_fields);
        $user->save();
        return redirect()->route('home')->with('success', 'Вы успешно обновили свои данные!');
    }

    public function showUserPage($id)
    {
        $user = User::find($id);
        return view('user.user-page', ['user' => $user]);
    }
}
