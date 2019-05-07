@extends('layouts.master')
@section('title', 'Plant Info')
@section('content')
  <body>
			@include('partials.nav_bar')
		
		<div class="hero-wrap hero-bread" style="background-image: url({{url('images/bg_11.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Recipe Book</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Recipe Book</span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section bg-light">
				<div class="container-fluid">
					<table id="recipebase" class="table table-striped table-bordered" style="width:100%">
						<thead>
								<tr>
										<th>Recipe</th>
										<th>Treatment</th>
										<th></th>
										
								</tr>
						</thead>
						<tbody>
							 
	@foreach($recipes as $recipe)
								<tr>
										<td><a href="{{route('single.recipe', $recipe->id)}}" >{{$recipe->recipe_name}}</a></td>
										<td>{{$recipe->treatment_for}}</td>
										<td>{{$recipe->keywords}}</td>
								</tr>
								@endforeach
								
							 
						</tbody>
				</table>
					
				</div>
			</section>
		@include('partials.footer')
        
       
	</body>
		@endsection
    
		