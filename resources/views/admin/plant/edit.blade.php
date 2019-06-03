@extends('admin.layouts.master')
@section('title', 'Edit Plant')
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
            <h3>{{$plant->name}}</h3>
        </div>
        <hr>
            <div class="row">
                    {!! Form::model($plant,['route' => ['plant.update',$plant->id], 'method' => 'PUT', 'files' => true]) !!}
          
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', $plant->name, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description',  $plant->description, ['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                        {{Form::label('details', 'Botanical Name')}}
                        {{Form::text('details',  $plant->details, ['class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('slug', 'Slug')}}
                            {{Form::text('slug',  $plant->slug, ['class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                            {{Form::label('image', 'Image')}}
                            {{Form::file('image', ['class'=>'form-control'])}}
                            <img src="{{asset('img/plants/'.$plant->image.'')}}" alt="{{$plant->slug}}" width="150" height="100">
                    </div>
                    {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>

        </div>
        @include('admin.partials.footer')

</div>
   @include('admin.partials.logoutmodal')
  </div>
 
</body>
@endsection