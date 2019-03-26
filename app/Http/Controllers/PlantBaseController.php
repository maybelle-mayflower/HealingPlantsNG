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
        $plants = Plant::inRandomOrder()->take(8)->get();
        return view('plantbase')->with('plants', $plants);
  
    }
    
    public function show($slug)
    {
        $plant = Plant::where('slug', $slug)->firstOrFail();
        return view('plant')->with('plant', $plant);
    }

    
}
