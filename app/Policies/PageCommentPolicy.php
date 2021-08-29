<?php

namespace App\Policies;

use App\Models\PageComment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PageCommentPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function update( User $user, PageComment $comment ): Response
    {
        if($user->id === $comment->creator_id)
            return Response::allow();
        return Response::deny('Вы не можете править чужой комментарий!');
    }
}
