<?php

namespace App\Http\Controllers;
use App\Plant;
use Illuminate\Http\Request;

class PlantBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = Plant::orderBy('name')->paginate(8);
        return view('front.plantbase')->with('plants', $plants);
  
    }
    
    public function show($slug)
    {
        $plant = Plant::where('slug', $slug)->firstOrFail();
        return view('front.plant')->with('plant', $plant);
    }
    public function single($slug){
        
        $plant = Plant::where('slug', $slug)->firstOrFail();
        return view('front.plantsingle')->with('plant', $plant);
    }

    public function shop()
    {
        $plants = Plant::inRandomOrder()->take(12)->get();
        return view('front.shop')->with('plants', $plants);
  
    }

    public function indextwo(){
        $data = Plant::orderBy('name')->paginate(8);
        return view('front.plantbase', compact('data'));    
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
         $sort_by = $request->get('sortby');
         $sort_type = $request->get('sorttype');
               $query = $request->get('query');
               $query = str_replace(" ", "%", $query);
         $data = Plant::where('name', 'like', '%'.$query.'%')->orderBy($sort_by, $sort_type)->paginate(8);
         return view('front.plantbased', compact('data'))->render();
        
       
     }
    }
    
}
