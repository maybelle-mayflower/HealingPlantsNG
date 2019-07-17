@extends('layouts.master')
@section('title', 'Plant Bible')
@section('styles')
<style>
  #herb-card{
    border-radius: 20%;
    margin-left: 5px;
  }
</style>

@endsection
@section('content')
  <body>
			@include('partials.nav_bar')
		<div class="hero-wrap hero-bread" style="background-image: url('images/herbs.jpg'); margin-bottom: 0px;">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" >HerbCyclopedia</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('welcome-page')}}">Home</a></span> <span>HerbCyclopedia</span></p>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section bg-light" style="margin-top: 0px;">
    <div class="container-fluid">
      <div class="row">
          <form class="form-inline" action="/search" method="POST" role="search">
          {{ csrf_field() }}
            <label class="sr-only" for="search">Search</label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="q" name="q" placeholder="Search database...">
          
              <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i></button>
            </form>
      </div>
        <div class="d-flex justify-content-between flex-wrap"  id="data_bucket">
              @include('front.plantbased')
        </div>

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />


      
    </div>
  </section>
 </body>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>











  /*
  
$(document).ready(function(){

 function clear_icon()
 {
  $('#id_icon').html('');
  $('#post_title_icon').html('');
 }

 function action(page, sort_type, sort_by, query)
 {
  $.ajax({
   url:"/learn/action?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
   success:function(data)
   {
    $('#data_bucket').html('');
    $('#data_bucket').html(data);
   }
  })
 }

 $(document).on('keyup', '#serach', function(){
  var query = $('#serach').val();
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  var page = $('#hidden_page').val();
  action(page, sort_type, column_name, query);
 });

 $(document).on('click', '.sorting', function(){ 
  var column_name = $(this).data('column_name');
  var order_type = $(this).data('sorting_type');
  var reverse_order = '';
  if(order_type == 'asc')
  {
   $(this).data('sorting_type', 'desc');
   reverse_order = 'desc';
   clear_icon();
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
  }
  if(order_type == 'desc')
  {
   $(this).data('sorting_type', 'asc');
   reverse_order = 'asc';
   clear_icon
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
  }
  $('#hidden_column_name').val(column_name);
  $('#hidden_sort_type').val(reverse_order);
  var page = $('#hidden_page').val();
  var query = $('#serach').val();
  action(page, reverse_order, column_name, query);
 });

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  $('#hidden_page').val(page);
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();

  var query = $('#serach').val();

  $('li').removeClass('active');
        $(this).parent().addClass('active');
        action(page, sort_type, column_name, query);
 });

});*/
</script>
@endsection