<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;

class ArticleController extends Controller
{
    const ARTICLE_VALIDATOR = [
        'title'      => 'required|string|max:20',
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
}
