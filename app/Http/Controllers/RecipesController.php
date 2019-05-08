<?php

namespace App\Http\Controllers;

use App\Recipes;
use App\Ingredient;
use PDF;
use Illuminate\Http\Request;
use App\Category;
use App\Plant;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipes::all();
        return view('admin.recipe.index', compact('recipes'));
  
    }
    public function create(){
        $categories = Category::pluck('category_name', 'id');
        $plants = Plant::pluck('name', 'id');
        return view('admin.recipe.create', compact('categories', 'plants'));
    }
    public function store(Request $request){
        $formInput = $request->all();
        $validData = $request->validate([
            'recipe_name' => 'required|unique:recipes|max:255',
            'recipe_base_id' => 'required',
            'treatment_for' => 'nullable',
            'keywords' => 'nullable',
            'category_id' => 'required',
            'method' => 'required'
        ]);
       $recipeInsert = Recipes::create($formInput);
       if($recipeInsert){
           $ingredients = array(
               [
                'recipe_id' => '1',
                'name' => 'aloevera'
               ],
               [
                   'recipe_id' => '1',
                   'name' => 'glycerin'
               ]
           );
           Ingredient::insert($ingredients);
       }
        return redirect()->route('recipe.index');
    }


    public function addIngredientPost(Request $request){
        $rules = [];
        foreach($request->input('name') as $key => $value){
            $rules["name.{$key}"] = 'required';
        }
        $validIngredient = $request->validate($rules);
        if($validIngredient){
            foreach($request->input('name') as $key => $value){
                Ingredient::create([
                    'name'=>$value,
                    'recipe_id' => '1'
                ]);
            }
            return response()->json(['success' => 'done']);
        }
        return response()->json(['error'=>$validIngredient->errors()->all()]);

    }


   //////////////CLIENT END FUNCTIONS/////////////////
    public function frontindex()
    {
        $recipes = Recipes::inRandomOrder()->get();
        return view('front.recipebook')->with('recipes', $recipes);
  
    }

    public function frontshow($plant_id)
    {
        $recipes = Recipes::where('recipe_base_id', $plant_id)->get();
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
