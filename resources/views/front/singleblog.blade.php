@extends('layouts.master')
@section('title', 'Plant Info')
@section('content')
  <body>
			@include('partials.nav_bar')
		
		<div class="hero-wrap hero-bread" style="background-image: url({{url('images/bg_8.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Information</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Blog</span></p>
          </div>
        </div>
      </div>
    </div>
		
    <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <h2 class="mb-3">{{$blog->title}}</h2>
          <p>{{$blog->body}}</p>
          <p>
            <img src="{{asset('images/'.$blog->image.'.jpg')}}" alt="" class="img-fluid">
          </p>
          

        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->
      
		@include('partials.footer')
        
       
	</body>
		@endsection
    
		