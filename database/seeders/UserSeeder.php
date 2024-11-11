<?php

namespace Database\Seeders;

use App\Models\CurriculumVitae;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make admin user
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@manmachineltd.com',
            'password' => bcrypt('secret')
        ]);

        // make some additional users
        User::factory(10)->create();

        // make some Curriculum Vitaes for the admin user
        CurriculumVitae::factory()->count(10)->create(['user_id' => $adminUser->id]);
    }
}
