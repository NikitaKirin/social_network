<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PageComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Http\Message\RequestInterface;

class CommentController extends Controller
{
    const PAGE_COMMENT_VALIDATOR = [
        'text' => 'required',
    ];

    const PAGE_COMMENT_RULES = [
        'required' => 'Данное поле является обязательным для заполнения!',
    ];

    public function index()
    {
        //
    }

    public function edit(PageComment $comment)
    {
        return view('user.comment.comment-edit-form', ['comment' => $comment]);
    }

    /**
     * @param Request $request
     * @param PageComment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Request $request, PageComment $comment): \Illuminate\Http\RedirectResponse
    {
        $validate = $request->validate(self::PAGE_COMMENT_VALIDATOR, self::PAGE_COMMENT_RULES);
        $comment->fill($validate);
        $comment->save();
        return redirect()->back()->with('success', 'Вы успешно обновили свой комментарий!');
    }

    public function store(Request $request, $user_id)
    {
        $validate_fields = $request->validate(self::PAGE_COMMENT_VALIDATOR, self::PAGE_COMMENT_RULES);
        $creator_id = Auth::id();
        $comment = PageComment::create([
            'text'        => $validate_fields['text'],
            'creator_id' => $creator_id,
            'user_id'     => $user_id,
        ]);

        return redirect()->route('users.show', ['user' => $user_id])->with('success', 'Ваш комментарий успешно добавлен!');
    }
}
