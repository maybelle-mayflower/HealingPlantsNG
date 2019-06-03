<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::content();

        return view('cart.index', compact('cartItems'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
       $user = Auth::user()->email;
       if(Cart::store($user))
       {
           return redirect()->route('cart.index')->with('msg', 'Cart Stored');
       }
       else{
        return redirect()->route('cart.index')->with('msg', 'Cart not Stored');

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user()->email;
        Cart::restore($user);
        return redirect()->route('cart.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       /*$product = Product::find($id);
       Cart::add($id, $product->name, 1, $product->price);
       return redirect()->route('cart.index');*/

   }
   public function save($id)
   {
      $product = Product::find($id);
     // Cart::add(['id' => $id, 'name' =>  $product->name, 'qty' => 1, 'price' => $product->price, 'options' => $product->image]);
      Cart::add($id,  $product->name, 1,  $product->price, ['image' => $product->image]);
      return back()->with("successmsg", "Item added to cart!");

  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Cart::update($id, ['qty' => $request->qty]);
        Cart::update($id, $request->qty);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        
        return back();
    }

    public function checkout(){
        $cartItems = Cart::content();
        if(Cart::count() < 1){
            return redirect()->route('plant.shop');
        }
        return view('cart.checkout', compact('cartItems'));
    }
}
