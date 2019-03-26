<?php

use Illuminate\Database\Seeder;
use App\Plant;

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plant::create([
            'name' => 'Lemon',
            'slug' => 'lemon-1',
            'details' => 'A Citrus fruit',
            'price' => 100,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            
        ]);
        Plant::create([
            'name' => 'Aloe Vera',
            'slug' => 'aloe-1',
            'details' => 'A Plant',
            'price' => 50,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            
        ]);
        Plant::create([
            'name' => 'Ginger',
            'slug' => 'ginger-1',
            'details' => 'A root',
            'price' => 100,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            
        ]);
        Plant::create([
            'name' => 'Garlic',
            'slug' => 'garlic-1',
            'details' => 'A vegetable fruit',
            'price' => 130,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            
        ]);
    }
}
