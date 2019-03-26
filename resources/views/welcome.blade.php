@extends('layouts.master')
@section('title', 'Home')
@section('content')
<body>
        <header>
                @include('partials.nav_bar')
            <div class="hero container">
                <div class="hero-copy">
                    <h1>Healing Plants NG</h1>
                    <p style="font-weight:bolder">A practical guide for plant-based home remedies.</p>
                    <p class="quote">"Let food be thy medicine and medicine be thy food."</p>
                </div> <!-- end hero-copy -->

                <div class="hero-image">
                    <img class="rounded img-thumbnail" src="img/plant-heal.jpg" alt="hero image">
                </div>
            </div> <!-- end hero -->
        </header>

        <div class="featured-section">
            <div class="container">
                <h1 class="text-center">What's our deal?</h1>

                <p class="section-description text-center">Learn about the many healing plants and herbs available in Africa, with a focus on indigenous Nigerian plants. You can create your own remedies, or have one of our herbal specialists customize a wellness package on your behalf.</p>
                <br>
                <p class="section-description text-center">We are not physicians; we are a group of extremely passionate advocates for holistic living. It is our belief that the earth provides everything we need, to heal both our bodies and our souls</p>
                <br>
                <p class="section-description text-center">Go Forth and be Whole!</p>
                <div class="text-center button-container">
                    <a href="#" class="button">Featured</a>
                    <a href="#" class="button">On Sale</a>
                </div>


                <div class="products text-center">
                    @foreach($plants as $plant )
                    <div class="product">
                        <a href="{{route('plant.show', $plant->slug)}}"><img src="img/tumeric.jpg" alt="product"></a>
                        <a href="{{route('plant.show', $plant->slug)}}"><div class="product-name">{{$plant->name}}</div></a>
                    <div class="product-price">{{$plant->PresentPrice()}}</div>
                    </div>
                    @endforeach
                </div> <!-- end products -->

                <div class="text-center button-container">
                    <a href="/shop" class="button">View more products</a>
                </div>

            </div> <!-- end container -->

        </div> <!-- end featured-section -->

        <div class="blog-section">
            <div class="container">
                <h1 class="text-center">Shared Experiences</h1>
                <p class="section-description text-center">Our remedies are suggestions not prescriptions, You may tweak them as much as you like to suit your needs. If you are on prescription medication, please speak with your doctor before trying our alternative treatments.</p>


                <div class="blog-posts">
                    <div class="blog-post" id="blog1">
                        <a href="#"><img src="img/greentea_honey.jpg" alt="blog image"></a>
                        <a href="#"><h2 class="blog-title">Green Tea Magic</h2></a>
                        <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ullam, ipsa quasi?</div>
                    </div>
                    <div class="blog-post" id="blog2">
                        <a href="#"><img src="img/acv.jpg" alt="blog image"></a>
                        <a href="#"><h2 class="blog-title">One Cure Fits All: Apple Cider Vinegar</h2></a>
                        <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ullam, ipsa quasi?</div>
                    </div>
                    <div class="blog-post" id="blog3">
                        <a href="#"><img src="img/skincare.jpg" alt="blog image"></a>
                        <a href="#"><h2 class="blog-title">Daily Skincare Practices</h2></a>
                        <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ullam, ipsa quasi?</div>
                    </div>
                </div> <!-- end blog-posts -->
            </div> <!-- end container -->
        </div> <!-- end blog-section -->

        @include('partials.footer')

    </body>
@endsection