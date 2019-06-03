@extends('admin.layouts.master')
@section('title', 'Create Recipe')
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
            <h3>New Recipe</h3>
        </div>
        <hr>

            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="alert alert-success print-success-msg" style="display:none">
                <ul></ul>
            </div>

            <div class="row">
                {!! Form::open(['route' => 'recipe.store', 'id'=>'add_recipe', 'name' => 'add_recipe', 'method' => 'post', 'files'=> true])!!}
          
                <div class="form-group">
                    {{Form::label('recipe_name', 'Name')}}
                    {{Form::text('recipe_name', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('treatment_for', 'Remedy For')}}
                    {{Form::text('treatment_for', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                        {{Form::label('recipe_base_id', 'Principal Herb')}}
                        {{Form::select('recipe_base_id', $plants ,null, ['class'=>'form-control'])}}
                    </div>
                <div class="form-group">
                        {{Form::label('category_id', 'Category')}}
                        {{Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select'])}}
                </div>
                <div class="form-group">
                    {{Form::label('keywords', 'Search Tags')}}
                    {{Form::text('keywords' ,null, ['class'=>'form-control', 'placeholder'=>'Enter search keywords separated by a single space'])}}
                </div>

                {{Form::label('name[]', 'Ingredients')}}
                <div class="table-responsive form-inline">  
                        <table class="table table-bordered" id="dynamic_field">  
                            <tr>  
                                <td>{{Form::text('name[]' ,null, ['class'=>'form-control name_list', 'id' => 'name[]', 'placeholder' => 'Enter Ingredient'])}}</td>
                                <!--<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  -->
                                <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i></button></td>  
                            </tr>  
                        </table>  
                    </div>

                <div class="form-group">
                    {{Form::label('method', 'Method')}}
                    {{Form::textarea('method', null, ['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                        {{Form::label('display_image', 'Image')}}
                        {{Form::file('display_image', ['class'=>'form-control'])}}
                </div>

                {{Form::submit('Create Recipe', ['class'=>'btn btn-info', 'name' => 'submit', 'id'=>'submit'])}}
                {!! Form::close() !!}
            </div>

        </div>
        @include('admin.partials.footer')

</div>
   @include('admin.partials.logoutmodal')
  </div>
 
</body>
@endsection
@section('scripts')



<script type="text/javascript">
    CKEDITOR.replace( 'method' );
    $(document).ready(function(){      
      var postURL = "<?php echo url('addingredient'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter Ingredient" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-xs btn_remove"><i class="fas fa-times"></i></button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

/*
      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_recipe').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_recipe')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }*/
    });  
</script>
@endsection