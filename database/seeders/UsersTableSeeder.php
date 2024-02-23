<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;
use Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>Str::random(10),
            'email'=>   Str::random(5).'@gamil.com',
            'password'=>Hash::make(Str::random(10)),
        ]);
        // DB::table('users')->insert([
        //     'name'=>'shubham',
        //     'email'=>'shubham@gamil.com',
        //     'password'=>Hash::make('123456789'),
        // ]);
    }
}
