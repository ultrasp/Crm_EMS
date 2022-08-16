<div class="form-group">
	{{ Form::label($label, null, ['class' => 'control-label']) }}
    <div class="input-group">
      	<div class="custom-file">
      		{{Form::file($name,array_merge(['class' => 'custom-file-input'], $attributes))}}
        	<label class="custom-file-label" for="exampleInputFile">{{__('Choose file')}}</label>
      	</div>
    </div>
    <a href="{{asset('uploads/'.$value)}}">{{__('File')}}</a>
</div>
@push('css')
<style type="text/css">
.custom-file-input:.custom-file-label::after {
    content: "{{__('Brows')}}";
}

</style>
@endpush