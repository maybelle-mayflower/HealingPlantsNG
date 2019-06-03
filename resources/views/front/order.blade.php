@extends('layouts.master')
@section('title', 'Order')
@section('content')
  <body>
      @include('partials.nav_bar')
      <div class="hero-wrap hero-bread" style="background-image: url('images/order.jpg'); margin-bottom: 0px;">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Order</span></p>
            </div>
          </div>
        </div>
      </div>
  
      <section class="ftco-section contact-section bg-light">
        <div class="container" style="widht: 50%;">
          <div class="row">
            @if(session()->has('msg'))
            <div class="alert alert-info">
              {{session()->get('msg')}}
            </div>
            @endif
          </div>
          <div class="row">
            <h4>Order ID: #12345</h4>
          </div>
          <div class="row" style="margin-bottom: 2em;">
              <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Delivery Address: </h5>
                    <p class="card-text">{{$order->deliveryaddress}}<br />
                      {{$order->state}}<br />
                      <br />
                      Phone Number: {{$order->mobileno}}
                    </p>
                    
                  </div>
                </div>
          </div>

          <div class="row">
              <table class="table text-left table-bordered">
                <thead class="thead-light">
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>

                </thead>
                <tbody>
               @foreach($items as $item)
               <tr>
                 <td>{{$item->product_name}}</td>
                 <td>{{number_format($item->product_price, 2)}}</td>
                 <td>{{$item->qty}}</td>
                 <td>{{number_format( $item->product_price * $item->qty, 2)}}</td>
               </tr>
               @endforeach
                </tbody>
              </table>
            </div>
          
          <div class="row">
            <a href="{{route('orders.index')}}" class="btn btn-info"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
        </div>
      </section>
      @include('partials.footer')
	</body>
		@endsection