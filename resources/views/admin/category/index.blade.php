@extends('admin.layouts.master')
@section('title', 'Categories')
@section('content')
<body id="page-top">

    @include('admin.partials.navbar')

  <div id="wrapper">

   @include('admin.partials.sidebar')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Categories</li>
        </ol>

 


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Plants/Categories
            <a href="{{route('category.create')}}"><button class="btn btn-primary btn-xs" style="float: right;"><i class="fas fa-plus"></i>Add New</button></a>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                  <tr>
                  <td>{{$category->category_name}}</td>
                  <td><a href="{{route('category.edit', $category->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                  <td><a href="#" class="btn btn-danger btn-sm" id="delbtn" name="delbtn" data-id="{{$category->id}}">Del</a></td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@include('admin.partials.footer')

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

@include('admin.partials.logoutmodal')
 
</body>

@endsection

@section('scripts')
<script>
  $(document).on('click', '#delbtn', function(event){
    event.preventDefault();
    var id = $(this).data('id')
    $('#cat_id').val(id);
    $('#categoryDeleteModal').modal('show');
  });
  $(document).on('submit', '#deletecategoryform', function(event){
    event.preventDefault();
    $.ajax({
      url:"",
      method:"get",
      data:{id:id},
      dataType:'json',
      success:function(data){
        
      }
    })
    console.log("submit");
  });
</script>
@endsection