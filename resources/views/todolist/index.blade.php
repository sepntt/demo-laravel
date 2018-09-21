@extends('layouts.default')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-12">
      <!-- <div class="card-columns"> -->
        @foreach ($list as $key => $value)
        <div class="card border-primary">
          <div>
            
          </div>
            <!-- <img src="https://bootstrap-themes.github.io/application/assets/img/unsplash_1.jpg" class="img-fluid" alt="Responsive image"> -->

          <div class="card-body">
            <h5 class="card-title"><button class="btn btn-primary" style="pointer-events: none;" type="button" disabled>&nbsp;</button><b>{{$value->todo}}</b></h5>
            <p class="card-text"><?=str_limit($value->desc, 120, '..');?></p>
            <p class="card-text text-right"><small class="text-muted">{{$value->created_at}}</small></p>
          </div>
        </div>
        @endforeach
      <!-- </div> -->
  </div>
</div>
@endsection
