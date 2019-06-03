@extends('layouts.master')
@section('title', 'Cart')
@section('content')
  <body>
      @include('partials.nav_bar')

      <div class="hero-wrap hero-bread" style="background-image: url('images/cart.jpg');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-0 bread">Shopping Cart</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Carts</span></p>
            </div>
          </div>
        </div>
      </div>
  
      <section class="ftco-section contact-section bg-light">
        <div class="container">
          <div class="row">
            @if(session()->has('msg'))
            <div class="alert alert-info">
              {{session()->get('msg')}}
            </div>
            @endif
          </div>
          <div class="row">
            @if(Cart::count() < 1) 
            <div class="alert alert-warning">
                <p>You shopping cart is empty!</p>
              </div>
              @endif
          </div>

          <div class="row">
            <table  class="table table-bordered" style="width:100%" id="carttable">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cartItems as $cartItem)
                <tr>
                  <td><img src="{{ asset('/img/products/'.$cartItem->options->image.'')}}" alt="" height="100" width="100"></td>
                  <td>{{$cartItem->name}}</td>
                  <td>{{number_format ($cartItem->price, 2)}}</td>
                  <td>
                    {!! Form::open(['route'=> ['cart.update', $cartItem->rowId], 'method' => 'PUT']) !!}

                    <input type="number" name="qty" value="{{$cartItem->qty}}" min="1" oninput="this.value = Math.abs(this.value)" style="width:2em">
                    
                    <button type="submit" class="btn btn-sm btn-default"><i class="fas fa-sync"></i></button>
                     {!! Form::close() !!}
                  </td>
                  <td>{{number_format ($cartItem->price * $cartItem->qty, 2)}}</td>
                  <td>
                      <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-times"></i></button>
                        </form></td>
                </tr>
              @endforeach
              <tr>
                <td></td>
                  <td>SubTotal:</td>
                  <td> {{Cart::count()}} item(s)</td>
                  <td>{{Cart::subtotal()}}</td>
                </tr>
            </tbody>

            </table>
            <table class="table table-bordered" style="width:100%">
              <thead>

              </thead>
              <tbody>
             
            </tbody>
            </table>
          </div>
          <div class="row">
            <a href="empty" class="btn btn-info">Empty Cart</a>
            @if(Cart::count() < 1) 
                <button href="" class="btn btn-warning" disabled style="margin-left: auto;" data-toggle="tooltip" data-placement="top" title="Shopping cart is empty">Proceed to Checkout</button>
              @else
              <a href="{{ route('cart.checkout')}}" class="btn btn-warning" style="margin-left: auto;">Proceed to Checkout</a>

              @endif
          </div>
        </div>
      </section>
      @include('partials.footer')
	</body>
		@endsection