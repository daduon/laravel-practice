<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'phone' => '098765432',
            'status' =>1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123@123'),
        ]);
    }
}
