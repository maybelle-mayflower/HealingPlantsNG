@extends('layouts.master')
@section('title', 'Cart')
@section('content')
  <body>
      @include('partials.nav_bar')

      <div class="hero-wrap hero-bread" style="background-image: url('images/order.jpg');">
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
              <h1>Order History</h1>
              <table class="table">
                  <thead>
                      <th>Date</th>
                      <th>Products</th>
                      <th>Amount</th>
                      <th>Payment Status</th>
                      <th>Delivery Status</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                      @foreach($orders as $order)
                      @if($order->paymentstatus == "unpaid")
                      <tr>
                        <td>{{$order->created_at}}</td>
                        <td></td>
                        <td><span class="badge badge-danger">{{$order->paymentstatus}}</span></td>
                        <td>{{$order->deliverystatus}}</td>
                        <td><a href="{{route('orders.show', $order->id)}}" class="btn btn-warning">Checkout</a></td>

                      </tr>
                      @else
                      <tr>
                    
                            <td>{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                            <td>{{$order->quantity}}</td>
                            <td>₦{{$order->amount}}</td>
                            <td><span class="badge badge-success">{{$order->paymentstatus}}</span></td>
                            <td>{{$order->deliverystatus}}</td>
                            <td><a href="{{route('orders.show', $order->id)}}" class="btn btn-primary">View</a></td>

                      </tr>
                      @endif
                      @endforeach
                  </tbody>
              </table>
          </div>
        </div>
      </section>
      @include('partials.footer')
    </body>
        @endsection