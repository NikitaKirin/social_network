<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_comments')->insert([
            'text'       => 'test_article_comment',
            'user_id'    => 1,
            'article_id' => 1,
        ]);

        DB::table('article_comments')->insert([
            'text'       => 'test_article_comment_1',
            'user_id'    => 2,
            'article_id' => 2,
        ]);
    }
}
