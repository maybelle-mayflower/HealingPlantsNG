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
            <table  class="table table-bordered" style="width:100%" id="carttable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>qty</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cartItems as $cartItem)
                <tr>
                  <td>{{$cartItem->name}}</td>
                  <td>{{$cartItem->price}}</td>
                  <td>
                    {!! Form::open(['route'=> ['cart.update', $cartItem->rowId], 'method' => 'post']) !!}

                    <input type="number" value="{{$cartItem->qty}}" style="width:2em">
                    <input type="submit" class="btn btn-sm btn-default" value="Ok">
                    {!! Form::close() !!}
                  </td>
                  <td><a href="{{route('cart.destroy', $cartItem->rowId)}}" class="btn btn-danger">Delete</a></td>
                </tr>
              @endforeach
            </tbody>

            </table>
          </div>
          <div class="row">
            <a href="empty" class="btn btn-info">Empty Cart</a>
          </div>
        </div>
      </section>
      @include('partials.footer')
	</body>
		@endsection