@extends('layouts.master')
@section('title', 'Plant Info')
@section('content')
  <body>
			@include('partials.nav_bar')
		
		<div class="hero-wrap hero-bread" style="background-image: url({{url('images/bg_4.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Information</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Information</span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<img class="img-fluid img-rounded" src="{{asset('/img/plants/'.$plant->slug.'.jpg')}}" alt="{{$plant->name}}" width="450" height="450">
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$plant->name}}</h3>
						<p>{{$plant->description}}</p>
          	<p><a href="{{route('plant.recipes', $plant->id)}}" class="btn btn-primary py-3 px-5">Recipes</a></p>
    			</div>
    		</div>
    	</div>
    </section>
		@include('partials.footer')
        
       
	</body>
		@endsection
    
		