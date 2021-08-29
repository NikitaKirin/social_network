<?php

namespace App\Policies;

use App\Models\PageComment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PageCommentPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function update( User $user, PageComment $comment ): bool
    {
        return $user->id === $comment->creator_id;
    }
}
