@extends('admin.layouts.master')
@section('title', 'Create Category')
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
            <h3>Add Category</h3>
                </div>
                <hr>

            <div class="row">
                {!! Form::open(['route' => 'category.store', 'method' => 'post', 'files'=> true])!!}
          
                <div class="form-group">
                    {{Form::label('category_name', 'Name')}}
                    {{Form::text('category_name', null, ['class'=>'form-control'])}}
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