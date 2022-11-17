<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\ProductType::factory(10)->create();
        $prices = \App\Models\ProductPrice::factory(3)->create();
        \App\Models\Product::factory(10)->create();

        \App\Models\Product::All()->each(function ($user) use ($prices){
            $user->price()->save($prices->random());
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
