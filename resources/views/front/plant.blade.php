@extends('layouts.master')
@section('title', $plant->name)
@section('content')
<body>
        @include('partials.nav_bar')
        <div class="breadcrumbs">
                <div class="breadcrumbs-container container">
                    <div>
                        <a href="/">Home</a>
                        <i class="fas fa-chevron-right" style="font-size:0.8em;"></i>
                        <a href="{{route('plant-bible')}}">Learn</a>
                        <i class="fas fa-chevron-right" style="font-size:0.8em;"></i>
                        <span>{{$plant->name}}</span>
                    </div>
                </div>
            </div> <!-- end breadcrumbs -->
            
    <div class="product-section container" style="display:flex;">
        <div class="col-md-4">
            <div class="product-section-image">
                <img src="{{asset('/img/plants/'.$plant->slug.'.jpg')}}" alt="product" class="active" id="currentImage">
            </div>
        </div>
        <div class="product-section-information col-md-8">
        <h1 class="product-section-title">{{$plant->name}}</h1>
            <div class="product-section-subtitle">{{$plant->details}}</div>


            <p>
                {{$plant->description}}
            </p>
            <a href="/recipe" class="view-recipe">View recipes</a>

            <p>&nbsp;</p>
        </div>
    </div> <!-- end product-section -->
    @include('partials.footer')
</body>

    <script>
            (function(){
                const currentImage = document.querySelector('#currentImage');
                const images = document.querySelectorAll('.product-section-thumbnail');
    
                images.forEach((element) => element.addEventListener('click', thumbnailClick));
    
                function thumbnailClick(e) {
                    currentImage.classList.remove('active');
    
                    currentImage.addEventListener('transitionend', () => {
                        currentImage.src = this.querySelector('img').src;
                        currentImage.classList.add('active');
                    })
    
                    images.forEach((element) => element.classList.remove('selected'));
                    this.classList.add('selected');
                }
    
            })();
        </script>
@endsection
