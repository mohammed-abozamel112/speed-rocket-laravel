<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // user default admin

        $user = User::create([
            'name_ar' => 'المدير',
            'name_en' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456789'),
            'role_en' => 'admin',
            'role_ar' => 'مسئول',
        ]);


        $this->call([
            ServiceSeeder::class,
            BlogSeeder::class,
            ProjectSeeder::class,
            ClientSeeder::class,
            ReviewSeeder::class,
            TagSeeder::class,
            ImageSeeder::class,
        ]);



    }
}
