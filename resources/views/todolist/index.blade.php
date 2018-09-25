@extends('layouts.default')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="alert alert-light" role="alert">
        @foreach ($btn as $key => $value)
        <button class="btn btn-{{$value['btn']}}" style="pointer-events: none;" type="button" disabled>{{$value['name']}}</button>
        @endforeach
      </div>
    </div>
    <div class="col-md-12">

    </div>
    <div class="col-md-12">
      <!-- <div class="card-columns"> -->
        @foreach ($list as $key => $value)
        <div class="card border-primary">
          <div class="card-body">
            <h5 class="card-title"><button class="btn btn-{{$value->btn_done}}" style="pointer-events: none;" type="button" disabled>&nbsp;&nbsp;&nbsp;</button>&nbsp;<b>{{$value->todo}}</b></h5>
            <p class="card-text"><?=str_limit($value->desc, 120, '..');?></p>
            <p class="card-text text-right"><small class="text-muted">{{$value->created_at}}</small></p>
          </div>
        </div>
        @endforeach
      <!-- </div> -->
  </div>
</div>
@endsection
