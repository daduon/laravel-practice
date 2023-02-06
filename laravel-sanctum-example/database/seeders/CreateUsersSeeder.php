<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'da.duon',
            'email' => 'da.duon1997@gmail.com',
            'device_name' => 'iPhone',
            'phone_number' => '+588888662304',
            'password' => bcrypt('password')
        ]);
    }
}
