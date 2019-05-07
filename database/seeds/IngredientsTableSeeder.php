<?php

use Illuminate\Database\Seeder;
use App\Ingredient;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::create([
            'recipe_id' => 1,
            'name' => 'lemon',
            
        ]);
        Ingredient::create([
            'recipe_id' => 1,
            'name' => '1 inch ginger root',
            
        ]);
        Ingredient::create([
            'recipe_id' => 2,
            'name' => 'raw honey',
            
        ]);
        Ingredient::create([
            'recipe_id' => 2,
            'name' => 'aloe vera',
            
        ]);
        Ingredient::create([
            'recipe_id' => 2,
            'name' => 'Cinnamon',
            
        ]);
        Ingredient::create([
            'recipe_id' => 3,
            'name' => 'aloe vera',
            
        ]);
        Ingredient::create([
            'recipe_id' => 4,
            'name' => 'raw garlic',
            
        ]);
        Ingredient::create([
            'recipe_id' => 4,
            'name' => 'honey (optional)',
            
        ]);
        Ingredient::create([
            'recipe_id' => 4,
            'name' => 'lemon (optional)',
            
        ]);
        Ingredient::create([
            'recipe_id' => 5,
            'name' => 'senna',
            
        ]);
    }
}
