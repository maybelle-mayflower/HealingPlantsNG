@extends('layouts.master')
@section('title', 'Recipe')
@section('content')
  <body>
			@include('partials.nav_bar')

		<section class="ftco-section bg-light">
    	<div class="container">
                <div class="row">
                        <div class="col-6 col-md-6 text-left">
                                <p><a href="{{route('recipe.book')}} "><i class="fa fa-arrow-left"></i>Back</a></p>

                        </div>

                    </div>
                <div class="row"style="margin-top: 15px;">
                    <div class="col-12 col-md-8">
                            <h2 style="text-decoration: underline;">{{$recipe->recipe_name}}</h2>
                    </div>
                </div>

                <div class="row" style="margin-top: 15px;">
                        <div class="col-12 col-lg-4">
                                <h4>Ingredients:</h4>
    
                      <ul>
                          @foreach($ingredients as $ingredient)
                          <li>{{$ingredient->name}}</li>
                          @endforeach


                      </ul>
                        </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-12 col-md-8">
                            <h4>Method:</h4>
                    </div>
                </div>
    
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <p>{!!$recipe->method!!}</p>
                        </div>

                    </div>
                    <div class="row" style="margin-top:20px;">
                    <div class="col-6 col-md-6 text-left">
                        <p><a href="{{route('print.recipe', $recipe->id)}}" class="btn btn-primary py-3 px-5">Print</a></p>

                </div>
            </div>

    	</div>
    </section>
		@include('partials.footer')
        
       
	</body>
		@endsection
    
		