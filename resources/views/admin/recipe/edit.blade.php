@extends('admin.layouts.master')
@section('title', 'Edit Recipe')
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
            <h3>{{$recipe->recipe_name}}</h3>
        </div>
        <hr>

            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="alert alert-success print-success-msg" style="display:none">
                <ul></ul>
            </div>

            <div class="row">
                    {!! Form::model($recipe,['route' => ['recipe.update',$recipe->id], 'id'=>'add_recipe', 'name' => 'add_recipe', 'method' => 'PUT', 'files' => true]) !!}
          
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
                        {{Form::select('recipe_base_id', $plants , null, ['class'=>'form-control'])}}
                    </div>
                <div class="form-group">
                        {{Form::label('category_id', 'Category')}}
                        {{Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select'])}}
                </div>
                <div class="form-group">
                    {{Form::label('keywords', 'Search Tags')}}
                    {{Form::text('keywords' ,null, ['class'=>'form-control', 'placeholder'=>'Enter search keywords separated by a single space'])}}
                </div>
                {{Form::label('name[]', 'Ingredients:')}}
                <div class="row"  id="data_bucket">
               
                @include('admin.recipe.ingredientstable')
            </div>
                
                <div class="table-responsive form-inline">  
                        <table class="table table-bordered" id="dynamic_field"> 

                            <tr>  
                                <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i>Add Ingredient</button></td>  
                            </tr>  
                        </table>  
                    </div>

                <div class="form-group">
                    {{Form::label('method', 'Method')}}
                    {{Form::textarea('method', null, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                        {{Form::label('display_image', 'Change Image')}}
                        {{Form::file('display_image', ['class'=>'form-control'])}}
                </div>

                {{Form::submit('Update', ['class'=>'btn btn-info', 'name' => 'submit', 'id'=>'submit'])}}
                {!! Form::close() !!}
            </div>

        </div>
        @include('admin.partials.footer')

</div>
   @include('admin.partials.logoutmodal')
  </div>

  <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit Ingredient</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="editform" class="form-horizontal" enctype="multipart/form-data">
                        <input type="text" class="form-control" name="ing" id="ing">
                </div>
                <input type="hidden" name="ing_id" id="ing_id">
                <input type="hidden" name="edit" id="edit">
                <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-success" value="Save">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Delete Ingredient</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post" id="deleteform" class="form-horizontal" enctype="multipart/form-data">
                            <p class="confirm_msg"></p>
                    </div>
                    <input type="hidden" name="ing_id" id="ing_id">
                    <input type="hidden" name="edit" id="edit">
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
    
                </div>
            </div>
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

      $(document).on('click', '#editbtn', function(event){ 
        var id =$(this).data("id");
        var name = $(this).data("name");
        $('#ing').val(name);
        $('#ing_id').val(id);
        $('#editModal').modal('show');

    });
    $(document).on('click', '#deletebtn', function(event){ 
        var id =$(this).data("id");
        var name = $(this).data("name");

        $('#ing_id').val(id);
        $('.confirm_msg').html('Are you sure you want to delete '+name+'?');
        $('#deleteModal').modal('show');

    });
    $(document).on('submit', '#editform', function(event){
        event.preventDefault();
        var newname = $('#ing').val();
        var id = $('#ing_id').val();

        $.ajax({
            url:"{{route('update.ingredient')}}",
            method:'get',
            data: {id: id, name: newname},
            dataType:'json',
            success:function(data)
            {
                
                var recipe_id = data[0]['recipe_id'];
                var url = '{{route("load.table", ":recipe_id")}}';
                url = url.replace(':recipe_id', recipe_id);

                $('#data_bucket').html('');
                $('#data_bucket').load(url, function(){
                    $('#data_bucket').fadeIn;
                });
               
                $('#editModal').modal('toggle');

            }
        })
    });
        $(document).on('submit', '#deleteform', function(event){
        event.preventDefault();
        var id = $('#ing_id').val();

        $.ajax({
            url:"{{route('destroy.ingredient')}}",
            method:'get',
            data: {id: id},
            dataType:'json',
            success:function(data)
            {
                var recipe_id = data[0]['recipe_id'];
                var url = '{{route("load.table", ":recipe_id")}}';
                url = url.replace(':recipe_id', recipe_id);
                
                $('#data_bucket').html('');
                $('#data_bucket').load(url, function(){
                    $('#data_bucket').fadeIn;
                });
                $('#deleteModal').modal('toggle');

            },
            error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
            }
        })
    });
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
</script>
@endsection