
<!DOCTYPE html>
<html>
<head>
	<title>{{$recipe->recipe_name}}</title>
</head>
<body>
<section class="ftco-section bg-light">
    	<div class="container">
                <div class="row"style="margin-top: 15px;">
                    <div class="col-12 col-md-8">
                            <h2>{{$recipe->recipe_name}}</h2>
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

    	</div>
    </section>
</body>
</html>