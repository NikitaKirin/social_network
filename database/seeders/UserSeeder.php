<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Nikita',
            'surname'  => 'Kirin',
            'email'    => 'kirin2001@mail.ru',
            'password' => 'admin',
        ]);

        DB::table('users')->insert([
            'name'     => 'Artem',
            'surname'  => 'Belov',
            'email'    => 'belov@mail.ru',
            'password' => 'admin',
            'city'     => 'EKB',
        ]);
    }
}
