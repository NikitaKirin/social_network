<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function update( User $user, Article $article ): Response
    {
        if ( $user->id === $article->user->id ) {
            return Response::allow();
        }
        return Response::deny('Вы не можете править чужую статью');
    }
}
