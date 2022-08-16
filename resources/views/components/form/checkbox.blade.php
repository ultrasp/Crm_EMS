<div class="form-check">
	{{Form::hidden($name,0)}}
    {{Form::checkbox($name,1,$value == 1,array_merge(['class' => 'form-check-input'], $attributes))}}
    {{ Form::label($label, null, ['class' => 'form-check-label']) }}
</div>
