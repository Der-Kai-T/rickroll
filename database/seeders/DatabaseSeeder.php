<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(config('app.env') === 'production') {
            $password = Str::password(8);
        }else{
            $password = "password";
        }
        $user = User::create([
            "name" => "admin",
            "email" => "admin@example.org",
            "password" => Hash::make($password),
        ]);

        $this->command->info("  created user $user->email with password $password");


        Link::create([
            "url" => "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
            "name" => "Rick",
            "weight" => 10
        ]);
    }
}
