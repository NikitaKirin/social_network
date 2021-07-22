<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'annotation',
        'text',
    ];

    // Создаем обратную связь много-с-одним
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
