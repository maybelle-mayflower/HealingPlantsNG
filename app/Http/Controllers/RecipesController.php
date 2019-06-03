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
        $recipes = Recipes::with('category')->get();
       // $category = Category::find(1);
        return view('admin.recipe.index')->with('recipes', $recipes);
  
    }
    public function create(){
        $categories = Category::pluck('category_name', 'id');
        $plants = Plant::pluck('name', 'id');
        return view('admin.recipe.create', compact('categories', 'plants'));
    }
    public function store(Request $request){
        $formInput = $request->except('display_image');
        $validData = $request->validate([
            'recipe_name' => 'required|unique:recipes|max:255',
            'recipe_base_id' => 'required',
            'treatment_for' => 'nullable',
            'keywords' => 'nullable',
            'category_id' => 'required',
            'method' => 'required' ,
            'display_image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        $image = $request->display_image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('img/recipes/', $imageName);
            $formInput['display_image'] = $imageName;
        }

       $recipeInsert = Recipes::create($formInput);
       if($recipeInsert){
        $rules = [];
        foreach($request->input('name') as $key => $value){
            $rules["name.{$key}"] = 'required';
        }
        $validIngredient = $request->validate($rules);
        if($validIngredient){
            foreach($request->input('name') as $key => $value){
                Ingredient::create([
                    'name'=>$value,
                    'recipe_id' => $recipeInsert->id
                ]);
            }
            return redirect()->route('recipe.index');
        }
        return response()->json(['error'=>$validIngredient->errors()->all()]);
       }
       // return redirect()->route('recipe.index');
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
    public function fetchIng($id){
        $ingredients = Ingredient::where('recipe_id', $id)->get();
        return view('admin.recipe.ingredientstable', compact('ingredients'))->render();

    }

    public function edit($id){
        $recipe = Recipes::find($id);
        $categories = Category::pluck('category_name', 'id');
        $plants = Plant::pluck('name', 'id');
        $ingredients = Ingredient::where('recipe_id', $id)->get();
        return view('admin.recipe.edit', compact('recipe','categories', 'plants', 'ingredients'));
    }

    public function update(Request $request, $id){
        $recipe=Recipes::find($id);

        $formInput = $request->except('display_image');
        $validData = $request->validate([
            'recipe_name' => 'max:255|required|unique:recipes,recipe_name,'.$id,
            'recipe_base_id' => 'required',
            'treatment_for' => 'nullable',
            'keywords' => 'nullable',
            'category_id' => 'required',
            'method' => 'required',
            'display_image'=>'image|mimes:png,jpg,jpeg|max:10000'

        ]);
      // $recipeInsert = Recipes::create($formInput);

      $image = $request->display_image;
      if($image){
          $imageName = $image->getClientOriginalName();
          $image->move('img/recipes/', $imageName);
         // $formInput['display_image'] = $imageName;
      }
      else{
          $imageName = $recipe->display_image;
      }
        $recipe->recipe_name = $request->recipe_name;
         $recipe->recipe_base_id = $request->recipe_base_id;
         $recipe->treatment_for = $request->treatment_for;
         $recipe->keywords = $request->keywords;
         $recipe->category_id = $request->category_id;
         $recipe->method = $request->method;
         $recipe->display_image = $imageName;

        $recipeInsert = $recipe->save();
        if($recipeInsert){
        $rules = [];
        if($request->input('name'))
        {
            foreach($request->input('name') as $key => $value){
                $rules["name.{$key}"] = 'required';
            }
            $validIngredient = $request->validate($rules);
            if($validIngredient){
                foreach($request->input('name') as $key => $value){
                    Ingredient::create([
                        'name'=>$value,
                        'recipe_id' => $id
                    ]);
                }
                return redirect()->route('recipe.index');
            }
        }
        else{
            return redirect()->route('recipe.index');
        }
        return response()->json(['error'=>$validIngredient->errors()->all()]);
       }
       // return redirect()->route('recipe.index');
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
  
        return $pdf->download('recipe.pdf');
    }


    
}
