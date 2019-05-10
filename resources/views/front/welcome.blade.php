@extends('layouts.master')
@section('title', 'Home')
@section('content')

<body>

	@include('partials.nav_bar')
	
	<div class="hero-wrap js-fullheight" style="background-image: url('images/hs_banner.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">

				<div class="col-md-11 ftco-animate text-center">
					<h1>Healing Herbs</h1>
					<h2><span>"Let food be thy medicine"</span></h2>
				</div>

			</div>
		</div>
	</div>

	<div class="goto-here"></div>
	<section class="ftco-section testimony-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate" style="margin-top: 2em;">
					<h1 class="big">Inspiration</h1>
					<h2>Favorite Quotes</h2>
				</div>
			</div>    		
			<div class="row justify-content-center">
				<div class="col-md-8 ftco-animate">
					<div class="row ftco-animate">
						<div class="col-md-12">
							<div class="carousel-testimony owl-carousel ftco-owl">
								<div class="item">
									<div class="testimony-wrap py-4 pb-5">
										<div class="user-img mb-4" style="background-image: url(images/person_11.jpg)">
											<span class="quote d-flex align-items-center justify-content-center">
												<i class="icon-quote-left"></i>
											</span>
										</div>
										<div class="text text-center">
											<p class="mb-4">“I believe that for every illness or ailment known to man, that God has a plant out here that will heal it. We just need to keep discovering the properties for natural healing.” </p>
											<p class="name">Vannoy Fite</p>
											<span class="position">Author</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimony-wrap py-4 pb-5">
										<div class="user-img mb-4" style="background-image: url(images/person_22.jpg)">
											<span class="quote d-flex align-items-center justify-content-center">
												<i class="icon-quote-left"></i>
											</span>
										</div>
										<div class="text text-center">
											<p class="mb-4">“Medicine’s a funny business. After all, dispensing chemicals is considered mainstream and diet and nutrition is considered alternative.”</p>
											<p class="name">Charles F. Glassman</p>
											<span class="position">Author</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimony-wrap py-4 pb-5">
										<div class="user-img mb-4" style="background-image: url(images/person_33.jpg)">
											<span class="quote d-flex align-items-center justify-content-center">
												<i class="icon-quote-left"></i>
											</span>
										</div>
										<div class="text text-center">
											<p class="mb-4">“To truly regenerate, to find what we are seeking, we must change from within.” </p>
											<p class="name">Heidi DuPree</p>
											<span class="position">Author</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimony-wrap py-4 pb-5">
										<div class="user-img mb-4" style="background-image: url(images/person_44.jpg)">
											<span class="quote d-flex align-items-center justify-content-center">
												<i class="icon-quote-left"></i>
											</span>
										</div>
										<div class="text text-center">
											<p class="mb-4">“There’s a popular saying among doctors: There’s no such thing as alternative medicine; if it works, it’s just called medicine.” </p>
											<p class="name">Ed Yong</p>
											<span class="position">Author</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="testimony-wrap py-4 pb-5">
										<div class="user-img mb-4" style="background-image: url(images/person_55.jpg)">
											<span class="quote d-flex align-items-center justify-content-center">
												<i class="icon-quote-left"></i>
											</span>
										</div>
										<div class="text text-center">
											<p class="mb-4">“Nature itself is the best physician.”</p>
											<p class="name">Hippocrates</p>
											<span class="position">Hippocrates</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--<div>Reviews thing goes here</div>-->

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/bg_2.jpg);">
					<!--<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
						<span class="icon-play"></span>
					</a>-->
				</div>
				<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
					<div class="heading-section-bold mb-5 mt-md-5">
						<div class="ml-md-0">
							<h2 class="mb-4">What's Our <br> <span>Deal?</span></h2>
						</div>
					</div>
					<div class="pb-md-5">
						<p> We want to help you learn about the many medicinal plants and herbs available in Africa, with a focus on indigenous Nigerian plants. You can create your own remedies, or have one of our herbal specialists customize a wellness package on your behalf.
						</p>
						<p>Go Forth and be Whole!</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate" style="margin-top: 2em;">
					<h1 class="big">Knowledge</h1>
					<h2 class="mb-4">Our Herbs</h2>
				</div>
			</div>    		
		</div>
		<div class="container-fluid">
			<div class="row">
				@foreach($plants as $plant )
				<div class="col-sm col-md-6 col-lg ftco-animate">
					<div class="product">
						<a href="{{route('single.show', $plant->slug)}}" class="img-prod"><img class="img-fluid" src="{{asset('/img/plants/thumbnail/'.$plant->slug.'.jpg')}}" alt="{{$plant->slug}}"></a>
						<div class="text py-3 px-3">
							<h3><a href="#">{{$plant->name}}</a></h3>
							
						</div>
					</div>
				
				</div>
				@endforeach
				
			</div>
		</div>
	</section>


	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate" style="margin-top: 2em;">
					<h1 class="big">Expression</h1>
					<h2>Our Blogs</h2>
				</div>
			</div>
			<div class="row d-flex">
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry align-self-stretch">
						<a href="#" class="block-20" style="background-image: url('images/greentea.jpg');">
						</a>
						<div class="text mt-3 d-block">
							<h3 class="heading mt-3"><a href="#">Green Tea Magic <span style="color: white;">whitespace whitespace</span></a></h3>
							<div class="meta mb-3">
								<div><a href="#">Dec 6, 2018</a></div>
								<div><a href="#">Admin</a></div>
								<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry align-self-stretch">
						<a href="#" class="block-20" style="background-image: url('images/acv.jpg');">
						</a>
						<div class="text mt-3">
							<h3 class="heading mt-3"><a href="#">One Cure Fits All: Apple Cider Vinegar<span style="color: white;">whitespace whitespace</span></a></h3>
							<div class="meta mb-3">
								<div><a href="#">Dec 6, 2018</a></div>
								<div><a href="#">Admin</a></div>
								<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry align-self-stretch">
						<a href="#" class="block-20" style="background-image: url('images/skincare.jpg');">
						</a>
						<div class="text mt-3">
							<h3 class="heading mt-3"><a href="#">Daily Skincare Practices<span style="color: white;">whitespace whitespace</span></a></h3>
							<div class="meta mb-3">
								<div><a href="#">Dec 6, 2018</a></div>
								<div><a href="#">Admin</a></div>
								<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@include('partials.footer')
</body>
@endsection