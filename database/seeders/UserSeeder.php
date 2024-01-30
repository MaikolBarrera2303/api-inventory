<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Maikol Barrera",
            "email" => "maicol@test.co",
            "password" => Hash::make(2303),
            "role_id" => 1
        ]);

        User::create([
            "name" => "Alexander Lasso",
            "email" => "alexander@test.co",
            "password" => Hash::make(1234),
            "role_id" => 2
        ]);
    }
}
