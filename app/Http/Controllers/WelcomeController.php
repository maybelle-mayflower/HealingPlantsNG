<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $plants = Plant::inRandomOrder()->take(8)->get();
        return view('welcome')->with('plants', $plants);
    }
}
