@extends('admin.layouts.master')
@section('title', 'Edit Product')
@section('content')
<body id="page-top">

    @include('admin.partials.navbar')

  <div id="wrapper">

   @include('admin.partials.sidebar')

   <div id="content-wrapper">

        <div class="container" style="margin: 20px 20px 20px 20px;"> 
                <div class="row">
                        <div class="col-md-4">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                </div>
                <div class="row">
            <h3>Add Product Item</h3>
                </div>
                <hr>

            <div class="row">
                {!! Form::open(['route' => 'product.update', 'method' => 'post', 'files'=> true])!!}
          
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                        {{Form::label('details', 'Details')}}
                        {{Form::text('details', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                        {{Form::label('slug', 'Slug')}}
                        {{Form::text('slug', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                        {{Form::label('price', 'Price')}}
                        {{Form::number('price', null, ['class'=>'form-control', 'step'=>'any'])}}
                </div>
                <div class="form-group">
                        {{Form::label('in_stock', 'In Stock')}}
                        {{Form::radio('in_stock', 1, ['class'=>'form-control'])}}

                        {{Form::label('in_stock', 'Out of Stock')}}
                        {{Form::radio('in_stock', 0, ['class'=>'form-control'])}}
              
                </div>
                <div class="form-group">
                        {{Form::label('image', 'Image')}}
                        {{Form::file('image', ['class'=>'form-control'])}}
                </div>
                    {{Form::submit('Add', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>

        </div>
        @include('admin.partials.footer')

</div>
   @include('admin.partials.logoutmodal')
  </div>
 
</body>
@endsection