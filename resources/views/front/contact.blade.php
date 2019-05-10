@extends('layouts.master')
@section('title', 'Home')
@section('content')
  <body>
      @include('partials.nav_bar')
		
		<div class="hero-wrap hero-bread" style="background-image: url('images/contact.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Contact</span></p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row">
            @if(session('message'))
            <div class='alert alert-success'>
              {{ session('message') }}
            </div>
            @endif
        </div>
        <div class="row block-9">

          <div class="col-md-6 order-md-last d-flex">
            
            <form action="/contact" method="post" class="bg-white p-5 contact-form" >
              {{ csrf_field() }} 
              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="meesage " cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>
        <div class="row d-flex mt-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:</span> <a href ="#">Lekki, Lagos</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span> <a href="tel://1234567920">+234 8000000000</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@healingherbs.co.ng</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Website</span> <a href="#">healingherbs.co.ng</a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>
		
		@include('partials.footer')
	</body>
		@endsection