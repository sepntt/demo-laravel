@extends($__layouts('layouts'))
@section('content')
  <link rel="stylesheet" href="{{ asset('packages/editor.md/css/editormd.min.css') }}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Simple Tables
        <small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include($__layouts('tip'))

      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="message">简短通知</label>
                  <input type="text" name="message" class="form-control" id="message" value="{{ old('message') }}" id="message" placeholder="简短通知">
                </div>
                <div class="form-group">
                  <label for="content">消息详细</label>
                  <div id="test-editormd">
                    <textarea id="test-editormd-markdown-doc" name="content" class="hide">{{old('content')}}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="push">置顶</label>
                  <input name="topped_at" type="checkbox">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                @csrf
                <button type="submit" class="btn btn-info pull-left">提交</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<script src="{{ asset('packages/editor.md/editormd.min.js') }}"></script>
<script type="text/javascript">
  var testEditor;
  
  $(function() {
      $.get('{{ url('backend/markdown/config') }}', function(md){
          testEditor = editormd("test-editormd", md);
      });
  });

</script>
@endsection