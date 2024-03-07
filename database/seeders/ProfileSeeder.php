<?php

namespace Database\Seeders;

use App\Models\Profile;
// use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table("profiles")->insert([
        //     "name" => Str::random(10),
        //     "email" => Str::random(10)."@gmail.com",
        //     "password" => Hash::make('password'),
        //     "bio" => Str::random(255),
        // ]);

        Profile::factory(20)->create();
    }
}
