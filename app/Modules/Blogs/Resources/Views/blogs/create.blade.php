@extends($__layouts('layouts'))

@section('content')
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
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ $__url('blogs') }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">标题</label>

                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="title" placeholder="标题">
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">内容</label>

                  <div class="col-sm-10" id="editor1">
                    {{ old('body') }}
                  </div>
                  <textarea id="editor2" name="body" style="display: none">
                    {{ old('body') }}
                  </textarea>
                    
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">状态</label>
                  <div class="col-sm-2">
                    <select class="form-control">
                      <option value="1">发布</option>
                      <option value="2" selected >草稿</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-offset-2 col-sm-10">
                  @csrf
                  <button type="submit" class="btn btn-info pull-left">提交</button>
                </div>
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
<script type="text/javascript" src="//unpkg.com/wangeditor/release/wangEditor.min.js"></script>
<script type="text/javascript">
  $(function() {
    var E = window.wangEditor
    var editor = new E('#editor1')
    // 或者 var editor = new E( document.getElementById('editor') )
    editor.customConfig.uploadImgShowBase64 = true
    editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $('#editor2').val(html)
        }
    editor.create()
  })
</script>
@endsection