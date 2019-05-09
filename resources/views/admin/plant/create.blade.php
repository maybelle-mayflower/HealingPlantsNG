@extends('admin.layouts.master')
@section('title', 'Create Plant')
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
            <h3>Add Item</h3>

            <div class="row">
                {!! Form::open(['route' => 'plant.store', 'method' => 'post', 'files'=> true])!!}
          
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description', null, ['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                        {{Form::label('details', 'Botanical Name')}}
                        {{Form::text('details', null, ['class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('slug', 'Slug')}}
                            {{Form::text('slug', null, ['class'=>'form-control'])}}
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