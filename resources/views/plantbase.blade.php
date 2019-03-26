@extends('layouts.master')
@section('title', 'Plant Bible')
<header>
    @include('partials.nav_bar')
</header>
@section('content')
<body>
<div class="featured-section">
    <div class="container">
        <h1 class="text-center">Plant Bible</h1>

        <div class="search-bar col-md-3">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </div>
        <div id="myBtnContainer" class="filter">
            <button class="btn active" onclick="filterSelection('all')"> Show All</button>
            <button class="btn" onclick="filterSelection('lemon')"> Skin</button>
            <button class="btn" onclick="filterSelection('ginger')"> Weight</button>
            <button class="btn" onclick="filterSelection('aloe')"> Fertility</button>
            <button class="btn" onclick="filterSelection('lemon')"> Anemia</button>
            <button class="btn" onclick="filterSelection('ginger')"> Antibiotics</button>
            <button class="btn" onclick="filterSelection('aloe')"> Blood Pressure & Diabetes</button>
            <button class="btn" onclick="filterSelection('lemon')"> Hair</button>
            <button class="btn" onclick="filterSelection('giner')"> Cold & Flu</button>
        </div>
        <div class="products text-center">
            @foreach($plants as $plant)
          
          <div class="product filterDiv {{$plant->nameToLowerCase()}}">
                <a href="{{route('plant.show', $plant->slug)}}"><img src="img/plants/thumbnail/lemon.png" alt="product"></a>
          <a href="{{route('plant.show', $plant->slug)}}"><div class="product-name">{{$plant->name}}</div></a>
                
            </div>
            @endforeach
            <div class="product filterDiv aloe">
                <a href="#"><img src="img/plants/thumbnail/aloevera.jpg" alt="product"></a>
                <a href="#"><div class="product-name">Aloevera</div></a>
            </div>
            <div class="product filterDiv ginger">
                    <a href="#"><img src="img/plants/thumbnail/ginger.jpg" alt="product"></a>
                    <a href="#"><div class="product-name">Ginger</div></a>
            </div>
            <div class="product filterDiv lemon">
                <a href="/plant"><img src="img/plants/thumbnail/lemon.png" alt="product"></a>
                <a href="#"><div class="product-name">Lemon</div></a>
                
            </div>
            <div class="product filterDiv aloe">
                <a href="#"><img src="img/plants/thumbnail/aloevera.jpg" alt="product"></a>
                <a href="#"><div class="product-name">Aloevera</div></a>
            </div>
            <div class="product filterDiv ginger">
                    <a href="#"><img src="img/plants/thumbnail/ginger.jpg" alt="product"></a>
                    <a href="#"><div class="product-name">Ginger</div></a>
            </div>
            <div class="product filterDiv lemon">
                <a href="/plant"><img src="img/plants/thumbnail/lemon.png" alt="product"></a>
                <a href="#"><div class="product-name">Lemon</div></a>
                
            </div>
            <div class="product filterDiv aloe">
                <a href="#"><img src="img/plants/thumbnail/aloevera.jpg" alt="product"></a>
                <a href="#"><div class="product-name">Aloevera</div></a>
            </div>
            <div class="product filterDiv ginger">
                    <a href="#"><img src="img/plants/thumbnail/ginger.jpg" alt="product"></a>
                    <a href="#"><div class="product-name">Ginger</div></a>
            </div>
        </div>
    </div> <!-- end container -->

</div> <!-- end featured-section -->
@include('partials.footer')

<script>
filterSelection("all");

function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") {
      c = "";
  }
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

</body>
@endsection