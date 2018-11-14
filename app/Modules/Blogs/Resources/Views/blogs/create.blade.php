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

      <div class="row">

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">标题</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="标题">
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">内容</label>

                  <div class="col-sm-10">
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
                  </div>
                    
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="js-push" name="push"> <span id="push" style="display: none;">发布</span><span id="draft">草稿</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
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
    $('.js-push').on('click', function(obj){
      if($('.js-push').prop('checked')) {
        $('#push').show();
        $('#draft').hide();
      } else {
        $('#draft').show();
        $('#push').hide();
      }
    })
  })
</script>
@endsection