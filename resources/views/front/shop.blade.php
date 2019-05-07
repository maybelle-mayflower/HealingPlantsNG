@extends('layouts.master')
@section('title', 'Home')
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
					
						<h1 class="mb-0 bread" >HealingHerbs Online Shop Opening Soon</h1>
    		
    		</div>
    	</div>
    </section>
		@include('partials.footer')
	</body>
		@endsection
    