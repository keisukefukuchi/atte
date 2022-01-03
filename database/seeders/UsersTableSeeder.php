<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'name' => 'test1',
            'email' =>  'test1@test1.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'remember_token' => Str::random(10),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
    }
}
