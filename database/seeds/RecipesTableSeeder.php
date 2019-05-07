<?php

use Illuminate\Database\Seeder;
use App\Recipes;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipes::create([
            'recipe_base_id' => '1',
            'recipe_name' => 'Organic Flat Tummy Tea',
            'treatment_for' => 'Stomach Fat',
            'keywords' => 'stomach, fat, flat, tummy, waist, slim, weightloss',
            'method' => ' Heat 1 cup of water until it starts boiling. Add grated ginger root to the water and simmer 5 minutes.
            Strain and add freshly squeezed lemon juice to the cup, with a teaspoon of honey for taste.
            Drink this before eating in the morning',
            
        ]);
        Recipes::create([
            'recipe_base_id' => '2',
            'recipe_name' => 'Antibacterial face mask',
            'treatment_for' => 'Acne',
            'keywords' => 'skin face mask acne antibacterial aloe pimples',
            'method' => 'Mix 2 tbsp of honey, 1tbsp of aloevera and 1/4 tsp of cinnamon.
            Apply to face and leave for 10 minutes.
            Wash and rinse with warm water.',
            
        ]);
        Recipes::create([
            'recipe_base_id' => '2',
            'recipe_name' => 'burn treatment',
            'treatment_for' => 'sunburns and minor skin burns',
            'keywords' => 'sunburn burn skin soothe inflamatory',
            'method' => ' Remove a few meaty leaves near the bottom of your alove vera plant. Cut off the spines. Cut the leaf in the middle and score the insides with a knife. 
            Once enough aloe is extracted apply directly on burn. 
            Repeat 2 to 3 times daily until burn is no longer painful',
            
        ]);
        Recipes::create([
            'recipe_base_id' => '4',
            'recipe_name' => 'Reduce Blood Pressure',
            'treatment_for' => 'Hypertension',
            'keywords' => 'high pressure garlic hypertension',
            'method' => 'Allow garlic cloves to steep in hot water for 10 minutes.
            Add honey and lemon and strain.
            Drink this once daily for maximum effect.',
            
        ]);
        Recipes::create([
            'recipe_base_id' => '14',
            'recipe_name' => 'Constipation Tonic',
            'treatment_for' => 'Constipation',
            'keywords' => 'laxative constipation relief colon cleanse digestion',
            'method' => 'Pour hot (not boiling) water over 1 to 2 grams of crushed Senna herb.
            Allow to steep for 10 minutes and then strain.
            drink 2-3ml 2-3 times per day.',
            
        ]);
    }
}
