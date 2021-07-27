<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    const ARTICLE_VALIDATOR = [
        'title'      => 'required|string|max:40',
        'annotation' => 'required|string|max:30',
        'text'       => 'string|required',
    ];

    const  ARTICLE_MESSAGES = [
        'required' => 'Данное поле обязательно для заполнения',
        'max:'     => 'Поле должно содержать не более max: символов',
        'string'   => 'Данное поле содержит недопустимые символы',
    ];

    public function index()
    {
        return view('article-form');
    }

    public function create(Request $request)
    {
        $validate_fields = $request->validate(self::ARTICLE_VALIDATOR, self::ARTICLE_MESSAGES);

        Auth::user()->articles()->create($validate_fields);
        return redirect()->route('home')->with('success', 'Ваша статья успешно создана!');
    }

    public function allArticles()
    {
        $articles = Article::all();
        /*        foreach ($articles as $article)
                {
                    dd($article->user()->first());
                }*/
        return view('articles.articles', ['articles' => $articles]);
    }

    public function article($id)
    {
        $article = Article::find($id);
        $comments = ArticleComment::where('article_id', $id)->latest()->get();
        if (isset($comments))
        {
            foreach ($comments as $comment)
            {
                $author_comment = User::where('id', $comment->user_id)->get()->first();
                $comment['author_name'] = $author_comment->name;
                $comment['author_surname'] = $author_comment->surname;
                $comment['author_id'] = $author_comment->id;
            }
        }
        return view('articles.article', ['article' => $article, 'comments' => $comments]);
    }

    public function showEditForm(Article $article)
    {
        return view('articles.edit-article-form', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $validate_fields = $request->validate(self::ARTICLE_VALIDATOR, self::ARTICLE_MESSAGES);
        $article->fill($validate_fields);
        $article->save();
        return redirect()->route('article', ['id' => $article->id])->with('success', 'Ваша статья успешно обновлена!');
    }

    public function showUserArticles($user_id)
    {
        $articles = Article::where('user_id', $user_id)->get();
        $user = User::find($user_id);
        return view('articles.user-articles', [
            'articles' => $articles,
            'user'     => $user,
        ]);
    }
}
