<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use function GuzzleHttp\json_encode;
use App\Orders;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\json_decode;
use function Opis\Closure\unserialize;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\OrderedItem;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $user_email = Auth::user()->email;
        $orders = Orders::where('email', $user_email)->where('paymentstatus', 'paid')->orderBy('created_at', 'DESC')->get();
        return view('front.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validData = $request->validate([
            "recipientname" => "nullable|max:255",
            "state" => "required",
            "deliveryaddress"=> "required",
            "mobileno"=>"required|regex:/[0-9]/|min:10|max:10",
            "comments"=> "nullable",
            "reference"=>"nullable",
            "quantity" => "required",
            "amount" => "required",
            "deliverystatus" => "nullable",
            "paymentstatus" => "nullable"
        ]);
        $orderCreate = Orders::create($input);

        if($orderCreate){
            $createdOrder = Orders::find($orderCreate->id);
            $payment_ref = Paystack::genTranxRef();

            $createdOrder->reference = $payment_ref;
            $createdOrder->save();
            $output = array('id'=> '1','orderid' => $orderCreate->id, 'reference' => $payment_ref);
            echo json_encode($output);

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
        $order = Orders::find($id);
        $items = OrderedItem::where('orderid', $id)->get();

        return view('front.order', compact('order','items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

      /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        
        //redirect to paystack gateway
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();

      //  dd($paymentDetails);
        //update order in database
     
        $reference = $paymentDetails['data']['reference'];
        $transaction = Orders::where('reference', $reference)->first();

        $orderid = $transaction->id;
        if(!$paymentDetails['status']){
            // there was an error from the API
            $errormsg =  $paymentDetails['message'];
            $transaction->paymentstatus = "declined";
            $transaction->save();
            return Redirect::back()->withErrors(['msg', $errormsg]);
        }
       else{
            $transaction->paymentstatus = "paid";
            $transaction->save();

            $cartItems = Cart::content();
            foreach($cartItems as $item){
                Ordereditem::create([
                    'orderid' => $orderid,
                    'product_name'=>$item->name,
                    'product_price'=>$item->price,
                    'qty' => $item->qty
                ]);
            }
            Cart::destroy();

        }
        $items = OrderedItem::where('orderid', $orderid)->get();
        return redirect()->route('orders.index')->with('items', $items)->with('transaction', $transaction);
  

        //TODO
        //save order_items in db
        //Redirect from here with the tfr reference / authorization code 
    }
}
