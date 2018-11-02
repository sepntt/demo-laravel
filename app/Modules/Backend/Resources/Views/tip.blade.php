@if (count($errors) > 0)
<div class="callout callout-info">
  <h4>Tip!</h4>
  <p>{{$errors->first()}}</p>
</div>
<script type="text/javascript">
	// $(".callout-info").fadeOut(10000);
</script>
@endif
