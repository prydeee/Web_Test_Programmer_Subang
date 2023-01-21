<?php

namespace Database\Seeders;

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
            'nama' => 'staf Agen X',
            'username' => 'staf_agen_x',
            'password' => bcrypt('staf_agen_x')
        ]);
    }
}
