@extends('blog.default')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      @foreach ($list as $key => $value)
      <div class="card">
          <!-- <img src="https://bootstrap-themes.github.io/application/assets/img/unsplash_1.jpg" class="img-fluid" alt="Responsive image"> -->

        <div class="card-body">
          <h5 class="card-title">{{$value->title}}</h5>
          <p class="card-text"><?=$value->body;?></p>
          <p class="card-text text-right"><a href="#" class="card-link"><small class="text-muted">{{$value->created_at}}</small></a></p>
        </div>
      </div>
      @endforeach
  </div>
  <div class="col-md-4">
      <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <ul class="list-group">
        <li class="list-group-item disabled">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
      <div class="card">
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
