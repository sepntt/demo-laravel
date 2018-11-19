<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- editormd -->
  <link rel="stylesheet" href="{{ asset('packages/editor.md/css/editormd.min.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
  <script src="{{ asset('vendor/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('vendor/adminlte/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="/backend" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>{{ config('app.name', 'Laravel') }}</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ config('app.name', 'Laravel') }}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="messages-menu">
            <a href="javascript:void(0);" class="save">
              <i class="fa fa-save"></i>保存
            </a>
          </li>
          
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small>{{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body "> <!-- 暂时隐藏 -->
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="{{url('blog')}}">Blog</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="{{url('todolist')}}">Todolist</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ $__url('user') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ $__lang('logout') }}</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="">
    <div class="row">
      <div class="col-lg-12">
        <div id="test-editormd"></div>
      </div>
    </div>
  </div>
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('vendor/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('vendor/adminlte/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('vendor/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('vendor/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('vendor/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('vendor/adminlte/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('vendor/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('vendor/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('vendor/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('packages/editor.md/editormd.min.js') }}"></script>
<script type="text/javascript">
  var testEditor;
  
  $(function() {
      // $.get('{{url('backend/markdown/config')}}', function(md) {
      //   // md.path = '{{ asset('packages/editor.md/lib') }}/';
      //   md.onload = function() {
      //     alert(11);
      //   }
      //   testEditor = editormd("test-editormd", md)
      // })
      $.get('{{ urldecode($config['get']) }}', function(md){

          testEditor = editormd("test-editormd", {
              width: "100%",
              height: 740,
              path : '{{ asset('packages/editor.md/lib') }}/',
              // theme : "dark",
              // previewTheme : "dark",
              // editorTheme : "pastel-on-dark",
              markdown : "md.data",
              codeFold : true,
              //syncScrolling : false,
              saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
              searchReplace : true,
              //watch : false,                // 关闭实时预览
              htmlDecode : "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启    
              //toolbar  : false,             //关闭工具栏
              //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
              emoji : true,
              taskList : true,
              tocm            : true,         // Using [TOCM]
              tex : true,                   // 开启科学公式TeX语言支持，默认关闭
              flowChart : true,             // 开启流程图支持，默认关闭
              sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
              //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
              //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
              //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
              //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
              //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
              imageUpload : true,
              imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
              imageUploadURL : "./php/upload.php",
              onload : function() {
                  console.log('onload', this);
                  //this.fullscreen();
                  //this.unwatch();
                  //this.watch().fullscreen();

                  //this.setMarkdown("#PHP");
                  //this.width("100%");
                  //this.height(480);
                  //this.resize("100%", 640);
              }
          });
      });
      
      $("#goto-line-btn").bind("click", function(){
          testEditor.gotoLine(90);
      });
      
      $("#show-btn").bind('click', function(){
          testEditor.show();
      });
      
      $("#hide-btn").bind('click', function(){
          testEditor.hide();
      });
      
      $(".save").bind('click', function(){
          alert(testEditor.getMarkdown());
      });
      
      $("#get-html-btn").bind('click', function() {
          alert(testEditor.getHTML());
      });                
      
      $("#watch-btn").bind('click', function() {
          testEditor.watch();
      });                 
      
      $("#unwatch-btn").bind('click', function() {
          testEditor.unwatch();
      });              
      
      $("#preview-btn").bind('click', function() {
          testEditor.previewing();
      });
      
      $("#fullscreen-btn").bind('click', function() {
          testEditor.fullscreen();
      });
      
      $("#show-toolbar-btn").bind('click', function() {
          testEditor.showToolbar();
      });
      
      $("#close-toolbar-btn").bind('click', function() {
          testEditor.hideToolbar();
      });
      
      $("#toc-menu-btn").click(function(){
          testEditor.config({
              tocDropdown   : true,
              tocTitle      : "目录 Table of Contents",
          });
      });
      
      $("#toc-default-btn").click(function() {
          testEditor.config("tocDropdown", false);
      });
  });
</script>
</body>
</html>