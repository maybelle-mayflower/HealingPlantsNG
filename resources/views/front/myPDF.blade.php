
<!DOCTYPE html>
<html>
<head>
	<title>{{$recipe->recipe_name}}</title>
</head>
<body>
        <section class="ftco-section bg-light" >
                <div class="container" style="margin-top:4em;">
                        <div class="row">
                                <div class="col-6 col-md-6 text-left">
                                        <p><a href="{{route('recipe.book')}} "><i class="fa fa-arrow-left"></i>Back</a></p>
        
                                </div>
        
                            </div>
                            <hr>
                            <div class="row"style="margin-top: 15px;">
                                    <div class="col-12 col-md-8">
                                            <h2>{{$recipe->recipe_name}}</h2>
                                    </div>
                                </div>
        
                                <hr>
                            <div class="row"style="margin-top: 4em; border: solid 2px grey; padding: 2em;">
        
                                <div class="col-md-4">
                                        <h5>Ingredients:</h5>
                                        <ul style="list-style: none;">
                                                @foreach($ingredients as $ingredient)
                                                <li><input type="checkbox" name="" id=""> {{$ingredient->name}}</li>
                                                @endforeach
                      
                                            </ul>
                                </div>
                                <div class="col-md-4">
                                        <h5>Directions:</h5>
                                        <div >
                                                <p>{!!$recipe->method!!}</p>
                                            </div>
        
                                </div>
        
                                <div class="col-md-4 text-center">
                                        <div >
                                            <img src="{{asset('/images/no_image.jpg/')}}" alt="" width="250" height="250" class="img-thumbnail">
                                        </div>
        
                                </div>
        
                            </div>
                            <hr>
                            <div class="row">
                                    <div class="col-md-4">
                                            <div >
                                                    <p><a href="{{route('print.recipe', $recipe->id)}}" class="btn btn-primary py-3 px-5">Print</a></p>
                                                </div>
            
                                    </div>
                            </div>
        
                </div>
            </section>
</body>
</html>