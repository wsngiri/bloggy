<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'name' => 'admin',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'username' => 'author',
            'name' => 'author',
            'role' => 'author',
            'password' => bcrypt('author'),
        ]);
    }
}
