@php //var_dump($errors);var_dump($errors->first()); @endphp
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Danger!</h4>
	{{$errors->first()}}
</div>
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-check"></i> Success!</h4>
	{{ session('success') }}
</div>
@endif

@if (session('danger'))
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Danger!</h4>
{{ session('danger') }}
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-warning"></i> Warning!</h4>
{{ session('warning') }}
</div>
@endif

@if (session('info'))
<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-info"></i> Info!</h4>
	{{ session('info') }}
</div>
@endif

<script type="text/javascript">
	$(".alert").fadeOut(10000);
</script>