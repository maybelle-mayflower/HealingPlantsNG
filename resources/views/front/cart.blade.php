@extends('layouts.master')
@section('title', 'Home')
@section('content')
  <body>
      @include('partials.nav_bar')

      <div class="hero-wrap hero-bread" style="background-image: url('images/cart.jpg');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-0 bread">Shopping Cart</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>Cart</span></p>
            </div>
          </div>
        </div>
      </div>
      <section class="ftco-section contact-section bg-light">
            <div class="container">
                <div class="row">
                        @if(session()->has('success_message'))
                        <div class="alert alert-success">
                          {{ session()->get('success_message')}}
                        </div>
                    
                        @endif
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                          <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif
                    </div>

                  <div class="row">
                <table class="table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>qty</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(Cart::content() as $cartItem)
                          <tr>
                            <td>{{$cartItem->name}}</td>
                            <td>{{$cartItem->price}}</td>
                            <td>{{$cartItem->qty}}</td>
                          </tr>
                        @endforeach
                    </tbody>
                      </table>

        </div>

    </div> <!-- end cart-section -->



@endsection

@section('extra-js')
    <script src="#"></script>
    <script>
      /*  (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();*/
    </script>
    @include('partials.footer')
    </body>

@endsection
