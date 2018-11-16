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
          <div class="box">
            <div class="box-header with-border">

              <a href="{{ $__url('blogs/create') }}">
                <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
              </a>
              <div class="input-group input-group-sm col-xs-2 pull-right">
                <input type="text" class="form-control" placeholder="标题">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                </span>
              </div>
              
              <!-- <h3 class="box-title">Bordered Table</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>标题</th>
                  <th>Created at</th>
                  <th>Op</th>
                </tr>
                @foreach($data as $key => $value)
                <tr>
                  <td>{{ $value['id'] }}</td>
                  <td>{{ $value['title'] }}</td>
                  <td>{{ $value['created_at'] }}</td>
                  <th>
                    <a href="{{ url('blog/show/'.$value['id']) }}">
                      <i class="fa  fa-eye"></i>
                    </a>
                    <a href="{{ $__url('blogs/'.$value['id'].'/edit') }}">
                      <i class="fa fa-edit"></i>
                    </a>
                    @if($value['id'] != 1)
                    <a herf="javascript:void(0);" class="js-destroy" data-url="{{ $__url('blogs/'.$value['id']) }}">
                      <i class="fa fa-trash"></i>
                    </a>
                    @endif
                  </th>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              {{ $data->links() }}
              <!-- <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul> -->
            </div>
          </div>
          <!-- /.box -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">提示</h4>
        </div>
        <div class="modal-body">
          <p>确认本次操作?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary js-confirm" data-url="">确认</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<form id="js-destroy" action="" method="POST">
  @csrf
  @method('DELETE')
</form>
<script type="text/javascript">
  $(function() {
    $('.js-destroy').on('click', function(){
      var obj = this;
      $('#modal-default').modal()
      $('#modal-default .js-confirm').data('url', $(obj).data('url'))
      $('#modal-default .js-confirm').off('click').on('click', function() {
        var obj = this
        var url = $(obj).data('url')
        var form = $('#js-destroy')
        form.attr('action', url)
        form.submit()
      })
    })
  })
</script>
@endsection
