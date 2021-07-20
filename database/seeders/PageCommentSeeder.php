<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_comments')->insert([
            'text'       => 'test_comment',
            'creator_id' => 1,
            'user_id'    => 2,
        ]);

        DB::table('page_comments')->insert([
            'text'       => 'test_comment',
            'creator_id' => 2,
            'user_id'    => 1,
        ]);
    }
}
