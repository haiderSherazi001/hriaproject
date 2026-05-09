<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Submission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@hria.org')->exists()) {
            
            User::factory()->create([
                'name' => 'HRIA Admin',
                'email' => 'admin@hria.org',
                'password' => Hash::make(env('ADMIN_DEFAULT_PASSWORD', 'fallback_password')), 
            ]);
        }
    }
}
