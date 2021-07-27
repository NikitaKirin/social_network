<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 */
class ArticleComment extends Model
{
    protected $fillable = [
        'text',
        'user_id',
        'article_id',
    ];
}
