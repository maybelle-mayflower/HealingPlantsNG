@extends('layouts.master')
@section('title', 'Cart')
@section('content')
<header> @include('partials.nav_bar')</header>
<body>
        <div class="breadcrumbs">
                <div class="breadcrumbs-container container">
                    <div>
                        <a href="/">Home</a>
                        <i class="fas fa-chevron-right" style="font-size:0.8em;"></i>
                        <span>Cart</span>
                    </div>
                </div>
            </div> <!-- end breadcrumbs -->
    <div class="cart-section container">
        <div>
                <div>
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
                    @if(Cart::count()>0)
                <h2>{{ Cart::count() }} item(s) in Cart</h2>
                    
            <div class="cart-table">
                @foreach(Cart::content() as $item)

                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                    <a href="{{ route('plant.show', $item->model->slug)}}"><img src="{{asset('/img/plants/thumbnail/'.$item->model->slug.'.jpg')}}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('plant.show', $item->model->slug)}}">{{$item->model->name}}</a></div>
                            <div class="cart-table-description">{{$item->model->details}}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                  
                                        <button type="submit" class="cart-options">Remove</button>
                                    </form>

                            <form action="#" method="POST">

                                <button type="submit" class="cart-options">Save for Later</button>
                            </form>
                        </div>
                        <div>
                            <select class="quantity" data-id="1" data-productQuantity="1">
                               
                                    <option>Option</option>
                                
                            </select>
                        </div>
                    <div>{{$item->model->presentPrice()}}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end cart-table -->

                <a href="#" class="have-code">Have a Code?</a>

                <div class="have-code-container">
                    <form action="#" method="POST">
                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="button button-plain">Apply</button>
                    </form>
                </div> <!-- end have-code-container -->


            <div class="cart-totals">
                <div class="cart-totals-left">
                    Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
                </div>

                <div class="cart-totals-right">
                    <div>
                        Subtotal <br>

                        <form action="#" method="POST">

                                <button type="submit" class="cart-options">Remove</button>
                            </form>
                            <hr>
                            New Subtotal <br>
                 
                        Tax (4%)<br>
                        <span class="cart-totals-total">Total</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        Price <br>
                        <span class="cart-totals-total">Price</span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="#" class="button">Continue Shopping</a>
                <a href="#" class="button-primary">Proceed to Checkout</a>
            </div>

            @else
               <h3>No items in Cart!</h3>
                <!-- <div class="spacer"></div>
                <a href="#" class="button">Continue Shopping</a>
                <div class="spacer"></div>-->
                @endif

        </div>

    </div> <!-- end cart-section -->



@endsection

@section('extra-js')
    <script src="#"></script>
    <script>
        (function(){
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
        })();
    </script>
    @include('partials.footer')
    </body>

@endsection
