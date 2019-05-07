<?php

namespace App\Http\Controllers;

use App\Recipes;
use App\Ingredient;
use PDF;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frontindex()
    {
        $recipes = Recipes::inRandomOrder()->get();
        return view('front.recipebook')->with('recipes', $recipes);
  
    }
    public function show($plant_id)
    {
        $recipes = Recipes::where('plant_id', $plant_id)->get();
        return view('front.recipebook')->with('recipes', $recipes);
    }

    public function single($recipe_id){
        
        $recipe = Recipes::where('id', $recipe_id)->firstOrFail();
        $ingredients = Ingredient::where('recipe_id', $recipe_id)->get();
        return view('front.singlerecipe')->with('recipe', $recipe)->with('ingredients', $ingredients);
    }

    public function printPDF($recipe_id)
    {
        $recipe = Recipes::where('id', $recipe_id)->firstOrFail();
        $ingredients = Ingredient::where('recipe_id', $recipe_id)->get();

        $data = ['recipe' => $recipe, 'ingredients' => $ingredients];

        $pdf = PDF::loadView('front.myPDF', $data);
  
        return $pdf->download('myrecipe.pdf');
    }

    
}
