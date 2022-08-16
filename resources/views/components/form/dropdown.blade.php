<div class="form-group">
    {{ Form::label($label, null, ['class' => 'control-label']) }}
    {{ Form::select($name, $options,$value, array_merge(['class' => 'form-control form-control-sm'], $attributes)) }}
</div>
