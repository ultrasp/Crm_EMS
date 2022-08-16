<div class="form-group row">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
	<div class="col-md-9">
	    {{ Form::file($name) }}
	    @if(!empty($url))
	        <img src="{{$url}}" class="img-fluid">
	    @endif
	</div>
</div>