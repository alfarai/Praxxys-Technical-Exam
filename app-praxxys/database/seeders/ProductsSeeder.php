<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory(15)->create();

        // App\Models\Product::factory()->create([
        //      'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);
    }
}
