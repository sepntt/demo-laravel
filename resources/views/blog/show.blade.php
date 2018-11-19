@extends('layouts.default')
@section('content')
<link rel="stylesheet" href="{{ asset('packages/editor.md/css/editormd.min.css') }}">
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <!-- <div class="card">
        <div class="card-header"><h1><strong>Dashboard</strong></h1></div>
        <img src="https://bootstrap-themes.github.io/application/assets/img/unsplash_1.jpg" class="img-fluid" alt="Responsive image">
        <div class="card-body">
          <blockquote class="blockquote text-left">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
          </blockquote>
        </div>
      </div> -->
      <div class="card">
        <div class="card">
            <!-- <img src="https://bootstrap-themes.github.io/application/assets/img/unsplash_1.jpg" class="img-fluid" alt="Responsive image"> -->

          <div class="card-body">
            <h5 class="card-title"><a href="/blog/show/{{$show->id}}" class="text-dark card-link" ><b>{{$show->title}}</b></a></h5>
            <p class="card-text">
                <div id="test-editormd">
                  <textarea class="hide" id="test-editormd-markdown-doc" name="test-editormd-markdown-doc">{{$show->body}}</textarea>               
                </div>
              </p>
            <p class="card-text text-right"><a href="/blog/show/{{$show->id}}" class="card-link"><small class="text-muted">{{$show->created_at}}</small></a></p>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card">
        <div class="card-header">Keywords</div>

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
</div>
<script src="{{ asset('packages/editor.md/lib/marked.min.js') }}"></script>
<script src="{{ asset('packages/editor.md/lib/prettify.min.js') }}"></script>
<script src="{{ asset('packages/editor.md/lib/raphael.min.js') }}"></script>
<script src="{{ asset('packages/editor.md/lib/underscore.min.js') }}"></script>
<script src="{{ asset('packages/editor.md/lib/sequence-diagram.min.js') }}"></script>
<script src="{{ asset('packages/editor.md/lib/flowchart.min.js') }}"></script>
<script src="{{ asset('packages/editor.md/lib/jquery.flowchart.min.js') }}"></script>
<script src="{{ asset('packages/editor.md/editormd.min.js') }}"></script>
<script type="text/javascript">
  var testEditor;
  
  $(function() {
      testEditormdView2 = editormd.markdownToHTML("test-editormd", {
          htmlDecode      : "style,script,iframe",  // you can filter tags decode
          emoji           : true,
          taskList        : true,
          tex             : true,  // 默认不解析
          flowChart       : true,  // 默认不解析
          sequenceDiagram : true,  // 默认不解析
      });

  });

</script>
@endsection
