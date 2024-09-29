<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'john',
            'email' => 'john@gmail.com',
            'password' => bcrypt('john12345')
            
        ]);
        DB::table('users')->insert([
            'name' => 'christo',
            'email' => 'christo@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        DB::table('carts')->insert([
            'user_id' => '1'
        ]);
    }
}
