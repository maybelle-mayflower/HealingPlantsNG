@extends('layouts.master')
@section('title', 'Home')
@section('content')
  <body>
			@include('partials.nav_bar')
		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_4.jpg');">
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

					@foreach($plants as $plant)
    			<div class="col-sm col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="{{route('plant.show', $plant->slug)}}" class="img-prod"><img class="img-fluid" src="{{asset('/img/plants/thumbnail/'.$plant->slug.'.jpg')}}" alt="Colorlib Template"></a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">{{$plant->name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>{{$plant->PresentPrice()}}</span></p>
		    					</div>
	    					</div>
	    					<hr>
    						<p class="bottom-area d-flex">
    							<a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
    						</p>
    					</div>
    				</div>
					</div>
					@endforeach

    		
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
		@include('partials.footer')
	</body>
		@endsection
    