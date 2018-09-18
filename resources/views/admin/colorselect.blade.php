<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

<label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <input type="hidden" name="{{$name}}"/>

        <select class="form-control {{$class}}" style="width: 100%;" name="{{$name}}" {!! $attributes !!} >
            @if($groups)
                @foreach($groups as $group)
                    <optgroup label="{{ $group['label'] }}">
                        @foreach($group['options'] as $select => $option)
                            <option value="{{$select}}" {{ $select == old($column, $value) ?'selected':'' }}>{{$option}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
             @else
                <option value=""></option>
                @foreach($options as $select => $option)
                    <option value="{{$select}}" {{ $select == old($column, $value) ?'selected':'' }}>{{$option}}</option>
                @endforeach
            @endif
        </select>
<style type="text/css">
.alert-b4-primary {
    color: #004085;
    background-color: #cce5ff;
    border-color: #b8daff;
}
.alert-b4-secondary {
    color: #383d41;
    background-color: #e2e3e5;
    border-color: #d6d8db;
}
.alert-b4-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}
.alert-b4-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
.alert-b4-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeeba;
}
.alert-b4-info {
    color: #0c5460;
    background-color: #d1ecf1;
    border-color: #bee5eb;
}
.alert-b4-light {
    color: #818182;
    background-color: #fefefe;
    border-color: #fdfdfe;
}
.alert-b4-dark {
    color: #1b1e21;
    background-color: #d6d8d9;
    border-color: #c6c8ca;
}
</style>
        <p>
        	@foreach($options as $select => $option)
	        <div class="alert alert-b4-{{$option}} col-md-2" role="alert">
			  {{$option}}
			</div>
	        @endforeach
        </p>
        

        @include('admin::form.help-block')

    </div>
</div>
