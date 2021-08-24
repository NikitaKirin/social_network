<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    const ARTICLE_COMMENT_VALIDATOR = [
        'text' => 'required',
    ];

    const ARTICLE_COMMENT_RULES = [
        'required' => 'Данное поле является обязательным для заполнения!',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Article $article)
    {
        $user_id = Auth::id();
        $validate_fields = $request->validate(self::ARTICLE_COMMENT_VALIDATOR, self::ARTICLE_COMMENT_RULES);
        $comment = ArticleComment::create([
            'text'       => $validate_fields['text'],
            'user_id'    => $user_id,
            'article_id' => $article->id,
        ]);

        return redirect()->route('articles.show', ['article' => $article])->with('success', 'Ваш комментарий успешно добавлен!');

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
