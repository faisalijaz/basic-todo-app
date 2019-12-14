<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('platforms')->where('email', '=', 'testadmin@gmail.com')->count();
        if ($count == 0) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'testadmin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ]);
        }
    }
}
