<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


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
       /*Cart::add($request->id, $request->name, 1, $request->price)
       ->associate('App\Plant');
       return redirect()->route('cart.index')->with('success_message', 'Item was added');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
      Cart::add($id, $product->name,1,$product->price);
      return back();

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
        Cart::update($id, ['qty' => $request->qty]);

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
}
