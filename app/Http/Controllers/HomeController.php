<?php

namespace App\Http\Controllers;

use App\Models\PageComment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $comments = PageComment::where('user_id', '=', Auth::id())->latest()->get();
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

        $user = User::find(Auth::id());
        if (count($comments))
            return view('home', [
                'user'     => $user,
                'comments' => $comments,
            ]);

        return view('home', ['user' => $user]);
    }
}
