<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PageComment;
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

    public function edit()
    {
        return view('user.user-edit-form', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $validate_fields = $request->validate(self::REGISTER_VALIDATOR, self::REGISTER_MESSAGES);
        $user = Auth::user()->fill($validate_fields);
        $user->save();
        return redirect()->route('users.index')->with('success', 'Вы успешно обновили свои данные!');
    }

    public function show($id)
    {
        $comments = PageComment::where('user_id', '=', $id)->latest()->get();
        if (isset($comments))
        {
            foreach ($comments as $comment)
            {
                $author_comment = User::where('id', $comment->creator_id)->get()->first();
                $comment['author_name'] = $author_comment->name;
                $comment['author_surname'] = $author_comment->surname;
                $comment['author_id'] = $author_comment->id;
            }

        }

        if (Auth::id() == $id)
            return redirect()->route('users.index', ['comments' => $comments]);

        $user = User::find($id);
        if (count($comments))
            return view('user.user-page', [
                'user'     => $user,
                'comments' => $comments,
            ]);

        return view('user.user-page', ['user' => $user]);
    }
}
