@extends('layouts.master')

@section('title', $plant->name)
<header>
    @include('partials.nav_bar')
</header>
@section('content')

    @component('components.breadcrumbs')
        <a href="/learn"><i class="fas fa-arrow-left"></i>Back</a>
    @endcomponent

<body>
    <div class="product-section container" style="display:flex;">
        <div class="col-md-4">
            <div class="product-section-image">
                <img src="img/plants/lemon.png" alt="product" class="active" id="currentImage">
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
