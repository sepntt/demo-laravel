@extends('layouts.default')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
            @foreach ($list as $key => $value)
            <div class="card rounded shadow">
                <!-- <img src="https://bootstrap-themes.github.io/application/assets/img/unsplash_1.jpg" class="img-fluid" alt="Responsive image"> -->

              <div class="card-body" style="max-height: 200px;overflow:hidden;">
                <h5 class="card-title">
                  <a href="/blog/show/{{$value->id}}" class="text-dark card-link" ><b>{{$value->title}}</b></a>
                </h5>
                <p class="card-text"><?=$value->body?></p>
                <!--<?=explode("\n", $value->body)[0];?>-->
              </div>
              <div class="card-body float-sm-right">
                  <p class="card-text text-right"><a href="/blog/show/{{$value->id}}" class="card-link"><small class="text-muted">{{$value->created_at}}</small></a></p>
                  
                </div>
            </div>
            <br/>
            @endforeach
        </div>
      </div>
  </div>
  <div class="col-md-4">
      @if (!empty($notice))
      <div class="alert alert-{{$notice->color}} shadow" role="alert">
        <?=$notice->messages->message;?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <ul class="list-group shadow">
        <li class="list-group-item disabled">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
      <br/>
      <div class="card shadow">
        <div class="card-header">Hot</div>

        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
