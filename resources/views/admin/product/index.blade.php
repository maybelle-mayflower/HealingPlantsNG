@extends('admin.layouts.master')
@section('title', 'Herbs')
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
          <li class="breadcrumb-item active">All Products</li>
        </ol>

 


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Products
            <a href="{{route('product.create')}}"><button class="btn btn-primary btn-xs" style="float: right;"><i class="fas fa-plus"></i>Add New</button></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach($products as $product)
                  <tr>
                  <td>{{$product->name}}</td>
                    <td><img src="{{asset ('img/products/'.$product->image.'')}}" alt="{{$product->slug}}" width="150" height="100">
                    </td>
                    <td>₦{{  number_format($product->price, 2) }}</td>
                    <td><a href="" class="btn btn-info">Edit</a></td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Last update by Admin</div>
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