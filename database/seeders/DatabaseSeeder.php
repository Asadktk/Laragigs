<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Database\Factories\ListingfactorFactory;
use Database\Factories\ListingFactorFactory as FactoriesListingFactorFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'test user',
            'email' => 'test12@test.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Islamabad , i9',
        //     'email' => 'asad23@gmail.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis 
        //     nulla corrupti tempora adipisci doloremque at, dolorem sit deleniti. Consectetur
        //      veniam labore totam pariatur impedit atque soluta et, quidem tempore facilis!'
        // ]); 
        
        // Listing::create([
        //     'title' => 'Laravel jonior Developer',
        //     'tags' => 'laravel, backend, api',
        //     'company' => 'starc Industries',
        //     'location' => 'Rawalpindi , i9',
        //     'email' => 'sad23@gmail.com',
        //     'website' => 'https://www.starc.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis 
        //     nulla corrupti tempora adipisci doloremque at, dolorem sit deleniti. Consectetur
        //      veniam labore totam pariatur impedit atque soluta et, quidem tempore facilis!'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
