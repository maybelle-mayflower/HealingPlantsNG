
@if(!empty($failureMsg))
<div class="alert alert-danger"> {{ $failureMsg }}</div>
@endif
<div class="row">
  @foreach($data as $row)

  <div class="card col-md-3">
      <h5 class="card-title">{{$row->name}}</h5>
      <a href="{{route('single.show', $row->slug)}}"><img class="card-img-top" src="{{asset('/img/plants/'.$row->image.'')}}" alt="Card image cap"  width="100" height="150"></a>
      <div class="card-body">
        
        <p class="card-text">{{$row->details}}</p>
        <a href="{{route('single.show', $row->slug)}}" class="btn btn-primary">Open</a>
      </div>
    </div>
    @endforeach

  </div>
    <div class="row" style="margin-top: 10px;">
      {!!$data->render()!!}

  </div>