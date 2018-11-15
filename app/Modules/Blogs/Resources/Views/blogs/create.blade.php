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

                  <div class="col-sm-10">
                    <textarea id="editor1" name="body" rows="10" cols="80">
                                            {{ old('body') }}
                    </textarea>
                  </div>
                    
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
<!-- CK Editor -->
<script src="{{ asset('packages/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
  $(function(){
    CKEDITOR.replace( 'editor1' , {
        removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor'
        ,codeSnippet_languages : {
            javascript: 'JavaScript',
            php: 'PHP',
            bash: 'Bash',
            python: 'Python',
            c: 'C',
            json: 'Json'
        },
        // width : 820,
        height : 600,
        filebrowserUploadUrl  : '/admin/blog/upload?_token={$csrf}'
        // ,extraAllowedContent : '*{*}'
        , extraPlugins : 'codesnippetgeshi'
        , codeSnippetGeshi_url : '/packages/lib/geshi/colorize.php'//单独的geshi php类库
    });
  })
</script>
@endsection