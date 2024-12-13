<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Rizky Amanda',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'tgl_lahir' => '2003-10-10',
            ],
            [
                'nama' => 'Rizky Amanda',
                'username' => 'admin1',
                'password' => Hash::make('123'),
                'tgl_lahir' => '2003-10-10',
            ],
        ]);
    }
}
