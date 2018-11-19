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
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ $__url('blogs/'.$data['id']) }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="title">标题</label>
                  <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $data['title']) }}" id="title" placeholder="标题">
                </div>
                <div class="form-group">
                  <label for="body">内容</label>
                  <!-- <label for="body"><a href="{{ url('backend/markdown/create', ['config' => json_encode(['blogs','blogs/0'])]) }}">全屏编辑</a></label> -->
                  <div id="test-editormd">
                    <textarea id="test-editormd-markdown-doc" name="body" class="hide">{!!old('body', $data['body'])!!}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="push">状态</label>
                  <select class="form-control">
                    <option value="1">发布</option>
                    <option value="2" selected >草稿</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                @csrf
                  @method('PUT')
                <button type="submit" class="btn btn-info pull-left">提交</button>
              </div>
              <!-- /.box-footer -->
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