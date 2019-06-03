@extends('layouts.master')
@section('title', 'Blog')
@section('content')
  <body>
			@include('partials.nav_bar')
		<div class="hero-wrap hero-bread" style="background-image: url('images/blog.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" >Blog</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Blog</span></p>
          </div>
        </div>
      </div>
    </div>
		
    <section class="ftco-section">
        <div class="container">
          <h2>HHNG Blog coming soon!</h2>
          <div class="row d-flex">
              @foreach($blogs as $blog)
              <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                      <a href="{{route ('single.blog', $blog->slug)}}" class="block-20" style="background-image: url('images/{{$blog->image}}.jpg');">
                      </a>
                      <div class="text mt-3 d-block pl-md-5">
                      <h3 class="heading mt-3"><a href="{{route ('single.blog', $blog->slug)}}">{{$blog->title}}</a></h3>
                        <div class="meta mb-3">
                          <div><a href="#">{{$blog->created_at}}</a></div>
                          <div><a href="#" class="meta-chat"><span class="icon-chat"></span>{{$blog->comment_count}}</a></div>
                        </div>
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
    