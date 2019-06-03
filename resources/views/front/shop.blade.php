@extends('layouts.master')
@section('title', 'Shop')
@section('content')
  <body>
			@include('partials.nav_bar')
		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_22.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" >Shop</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Shop</span></p>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section bg-light">
        <div class="container-fluid">
          <div class="row">
              @if(session()->has('successmsg'))
              <div class="alert alert-success col-md-3">
                  {{ session()->get('successmsg') }}
              </div>
          @endif
          </div>
          <div class="row">
            @foreach($products as $product)
					
					<div class="col-sm col-md-6 col-lg-3 ftco-animate">
              <div class="product">
                <a href="#" class="img-prod"><img class="img-fluid" src="{{ asset('/img/products/'.$product->image.'')}}" alt="{{$product->slug}}" height="150">
                </a>
                <div class="text py-3 px-3">
                  <h3><a href="#">{{$product->name}}</a></h3>
                  <div class="d-flex">
                    <div class="pricing">
                      <p class="price">₦<span class="price-sale">{{number_format ($product->price)}}</span></p>
                    </div>
          
                  </div>
                  <hr>
                  <p class="bottom-area d-flex">
                    <a href="{{route('cart.save', $product->id)}}" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                    <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
                  </p>
                </div>
              </div>
            </div>
            @endforeach
    		
    		</div>
    	</div>
    </section>
		@include('partials.footer')
	</body>
		@endsection
    