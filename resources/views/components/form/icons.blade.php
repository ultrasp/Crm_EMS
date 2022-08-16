<div class="form-group icon-input" style="margin-top: 30px">
    {{ Form::label($label, null, ['class' => 'control-label']) }}
	<i class="td-icon {{$value}}"></i>
	<input type="hidden" name="{{$name}}" value="{{$value}}">
	<button type="button"  class="btn btn-primary my-1 btn-sm" data-toggle="modal" data-target="#iconModal">{{__('Select icon')}}</button>
</div>

<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="iconModalLabel">{{__("Select icon from list")}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
	      	<?php 
	      	$css = file_get_contents(public_path('css/flaticon.css'));
	      	preg_match_all('/.(flaticon-\w+-\w+):before/', $css, $output);
	      	for ($i=0; $i < count($output[1]) ; $i++) { 
	      		$icon = str_replace(':before', '', $output[1][$i]);
	      		echo '<div class="col-sm-2 icon-item '.($value == $icon ?  'selected' : '').'"><i class="td-icon '.$icon.'"></i></div>';
	      	}
	      	?>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
        <button type="button" class="btn btn-primary ok-btn">{{__('Ok')}}</button>
      </div>
    </div>
  </div>
</div>

@push('js')
<script type="text/javascript">
	$('.icon-item').on('click',function(){
		var icon = $(this);
		$('.icon-item').removeClass('selected');
		$(this).addClass('selected');
	})
	$('#iconModal .ok-btn').on('click',function(){
		var iClass= $('#iconModal').find('.icon-item.selected i').attr('class');
		$('#iconModal').modal('hide');
		$('.icon-input').find('i').attr('class',iClass);
		$('.icon-input').find('input').val(iClass);
	})
</script>
<style type="text/css">
	.icon-item{
		font-size:44px;
	}
	.icon-item.selected{
		background-color: #f9f33e;
	}
</style>
@endpush