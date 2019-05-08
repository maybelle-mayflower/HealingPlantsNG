@extends('admin.layouts.master')
@section('title', 'Recipes')
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
          <li class="breadcrumb-item active">All Herbs</li>
        </ol>



        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Recipes</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach($recipes as $recipe)
                  <tr>
                  <td><a href="#">{{$recipe->recipe_name}}</a></td>
                  <td><a href="#" class="btn btn-danger btn-xs">Delete</a></td>
                
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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