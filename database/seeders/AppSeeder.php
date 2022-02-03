<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # USER
        $users = [
            [
                'name' => 'Abela',
                'email' => 'abelardhana96@gmail.com',
                'password' => '$2y$10$EoaKVtezPUvs2LiGM4eOF.Z1rmAy0iaNzvkmsPUfICJbRM998JWYi',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $this->command->info('Admin user created.');
    }
}
