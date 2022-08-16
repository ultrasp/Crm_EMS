<div class="form-group">
    {{ Form::label($label, null, ['class' => 'control-label']) }}
    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control form-control-sm '. ($editor ? 'summernote' : '')], $attributes)) }}
</div>
