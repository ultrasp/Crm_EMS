<div class="form-group">
    {{ Form::label($label, null, ['class' => 'control-label']) }}
    {{ Form::text($name, $value, array_merge(['class' => 'form-control form-control-sm'], $attributes)) }}
</div>
