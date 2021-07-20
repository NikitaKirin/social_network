<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title'      => 'Test_title',
            'annotation' => 'Test_annotation',
            'text'       => 'test_text',
            'user_id'    => 1,
        ]);

        DB::table('articles')->insert([
            'title'      => 'Test_title_2',
            'annotation' => 'Test_annotation_2',
            'text'       => 'test_text_2',
            'user_id'    => 2,
        ]);
    }
}
