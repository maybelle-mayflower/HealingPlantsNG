<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;
use PDF;

class WelcomeController extends Controller
{
    public function index()
    {
        $plants = Plant::inRandomOrder()->take(5)->get();
        return view('front.welcome')->with('plants', $plants);

        //return view('welcome');
    }

    public function generatePDF()
    {
        $data = ['title' => 'Maybelle'];
        $pdf = PDF::loadView('front.myPDF', $data);
  
        return $pdf->download('thisPdf.pdf');
    }
}
