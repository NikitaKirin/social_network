<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageComment extends Model
{
    protected $table = 'page_comments';

    protected $fillable = [
        'text',
        'creator_id',
        'user_id',
    ];


}
