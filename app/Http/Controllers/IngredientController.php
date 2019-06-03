<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use function GuzzleHttp\json_encode;

class IngredientController extends Controller
{
    public function edit($id){
        if(request()->ajax())
        {
            $data = Ingredient::findOrFail($id);
            //return response()->json(['data' => $data]);
            echo json_encode($data);
        }
    }

    public function fetchdata(Request $request)
    {
        $id = $request->id;
       // return response()->json($id);
        $ingredient = Ingredient::find($id);
       /* $output = array(
            'id'=> $ingredient->id,
            'name'    =>  $ingredient->name,
            'recipe_id' => $ingredient->recipe_id
        );*/
        echo json_encode($ingredient);
    }

    public function updateData(Request $request)
    {
        $id = $request->id;
        $ingredient = Ingredient::find($id);
        $recipe_id = $ingredient->recipe_id;
        $ingredient->name = $request->name;
        $ingredient->save();

        $ingredients = Ingredient::select('id', 'name', 'recipe_id')->where('recipe_id', $recipe_id)->get();
        
        echo json_encode($ingredients);
    }

    public function destroyData(Request $request){
        $id = $request->id;
        $ingredient = Ingredient::find($id);
        $recipe_id = $ingredient->recipe_id;
        $ingredient->delete();
        $ingredients = Ingredient::select('id', 'name', 'recipe_id')->where('recipe_id', $recipe_id)->get();

        echo json_encode($ingredients);
    }
    
}
