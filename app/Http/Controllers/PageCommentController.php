<?php

namespace App\Http\Controllers;

use App\Models\PageComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageCommentController extends Controller
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

    public function store(Request $request, $user_id)
    {
        $validate_fields = $request->validate(self::PAGE_COMMENT_VALIDATOR, self::PAGE_COMMENT_RULES);
        $creator_id = Auth::id();
        $comment = PageComment::create([
            'text'        => $validate_fields['text'],
            'creator_id' => $creator_id,
            'user_id'     => $user_id,
        ]);

        return redirect()->route('user-page', ['id' => $user_id])->with('success', 'Ваш комментарий успешно добавлен!');
    }
}
