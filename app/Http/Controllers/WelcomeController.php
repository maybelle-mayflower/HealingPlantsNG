<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;
use PDF;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        if(Auth::user())
        {
            $user = Auth::user()->email;
            Cart::restore($user);
        }

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

    public function logOut(){
        $user = Auth::user();
        Cart::store($user->email);
    
        Auth::logout();
        return redirect()->route('logout');
    }
}
