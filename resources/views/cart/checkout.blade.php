@extends('layouts.master')
@section('title', 'Cart')
@section('content')
  <body>
      @include('partials.nav_bar')

      <div class="hero-wrap hero-bread" style="background-image: url('images/cart.jpg');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-0 bread">Your Order</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Order</span></p>
            </div>
          </div>
        </div>
      </div>

      <section class="ftco-section contact-section bg-light">
            <div class="container">
              <div class="row">
                  @if($errors->any())
                  <h4>{{$errors->first()}}</h4>
                  @endif
              </div>
              <div class="row">
                  <div class="col-md-8">
                        <div class="card">
                            <h5 class="card-header">Delivery Details</h5>
                            <div class="card-body">
                                    <form method="POST" action="{{ route('pay') }}" id="paymentform" name="paymentform" accept-charset="UTF-8" role="form">
                                            <div class="form-group">
                                              <label for="recipientname">Recipient Name</label>
                                              <input type="text" class="form-control" id="recipientname" name="recipientname" placeholder="">
                                            </div>
                                            <div class="form-group">
                                              <label for="state">State *</label>
                                              <select class="form-control" id="state" name="state">
                                                <option value="Lagos">Lagos</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address *</label>
                                                <input type="text" class="form-control" id="deliveryaddress" name="deliveryaddress" required>
                                            </div>
                                            <div class="form-group" style="width: 50%;">
                                                    <label for="name">Mobile Number *</label>
                                                    <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <div class="input-group-text">+234</div>
                                                          </div>
                                                    <input type="number" class="form-control" id="mobileno" name="mobileno" required>
                                                </div>
                                                  </div>
                                            <div class="form-group">
                                              <label for="deliverynote">Delivery Notes</label>
                                              <textarea class="form-control" id="comments" rows="3" name="comments"></textarea>
                                            
                                            </div>

                                            <input type="hidden" name="shoppingcart" id="shoppingcart" value="{{serialize(Cart::content())}}">
                                            <input type="hidden" name="email" id="email" value="{{Auth::user()->email}}"> {{-- required --}}
                                            <input type="hidden" name="orderID" id="orderID" value="345">
                                            <input type="hidden" name="amount" id="amount" value="{{Cart::subtotal()}}"> {{-- required in kobo --}}
                                            <input type="hidden" name="quantity" id="quantity" value="{{Cart::count()}}">
                                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                            <input type="hidden" name="reference" id="reference" value=""> {{-- required --}}
                                            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                                            {{ csrf_field() }} 

                                
                                            <button type="submit" class="btn btn-primary py-3 px-5">Confirm & Pay</button>
                                            
                                          </form>
                            </div>
                        </div>                  
                    </div>
                  <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header">Order Summary</h5>
                            <div class="card-body">

                                @foreach($cartItems as $items)

                                <div class="card" style="width: 18rem; border: none; border-bottom: 1px solid #e5e5e5;">
                                  <div class="row">
                                  <div class="col-6">
                                    <img class="card-img-top" src="{{ asset('/img/products/'.$items->options->image.'')}}" alt="" style="width: 10rem; height: 7rem">
                                  </div>
                                  <div class="col-6">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$items->name}}</h5>
                                      <p class="card-text">Qty:  {{$items->qty}}</p>
                                      <p class="card-text">₦{{number_format ($items->price * $items->qty, 2)}}</p>
                                    </div>
                                  </div>
                                </div>
                                  </div>
                                  @endforeach
                                <hr>
                                <h5 class="card-title">Order Total:</h5>
                                <p class="card-text">₦{{Cart::subtotal()}}</p>
                            </div>
                        </div>                    
                    </div>
              </div>
            </div>
      </section>



@include('partials.footer')
</body>
    @endsection

    @section('scripts')
    <script>
           $(document).ready(function(){

/*            $("input[type='text']").on("keyup", function(){
                if($(this).val() != ""){
                    $("input[type='submit']").removeAttr("disabled");
                } else {
                    $("input[type='submit']").attr("disabled", "disabled");
                }
            });
*/

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $(document).on('submit', '#paymentform', function(event){
                    event.preventDefault();
                    var name, state, deliveryaddress, mobileno, comments, email, recipientname, quantity,amount, 
                    reference, shoppingcart, paymentstatus, deliverystatus;
                    email = $('#email').val();
                    recipientname = $('#recipientname').val();
                    quantity = $('#quantity').val();
                    amount = $('#amount').val();
                    shoppingcart = $('#shoppingcart').val();
                    deliveryaddress = $('#deliveryaddress').val();
                    state = $('#state').val();
                    comments = $('#comments').val();
                    mobileno = $('#mobileno').val();
                    deliverystatus = "pending";
                    paymentstatus = "unpaid";
                  var amount_unformatted = amount.replace(",","");
                  var amt_in_kobo = parseFloat(amount_unformatted) * 100;
                    $.ajax({
                        url:"{{route('orders.store')}}",
                        method:"POST",
                        data:{email: email, recipientname: recipientname, quantity: quantity, 
                        amount: amount, shoppingcart:shoppingcart, deliveryaddress:deliveryaddress, 
                        state:state, comments: comments, mobileno: mobileno, paymentstatus: paymentstatus, deliverystatus: deliverystatus} ,
                        dataType :'json',
                        success:function(data)
                        {
                          //after creating order in database, set order id before going to payment gateway
                            var orderid = data['orderid'];
                            var ref = data['reference'];

                            $('#orderID').val(orderid);
                            $('#amount').val(amt_in_kobo);
                            $('#reference').val(ref);

                            $("#paymentform")[0].submit();  
                        },
                        error: function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            console.log(err.Message);
                        }
                    })
                });
           });
    </script>
    @endsection