  <form role="form" class="modal-form" action="{{route('subscribe.size.store')}}">
      	{{ Form::hidden('id',$sub->id) }}
		<div class="row">
			<div class="col-md-12">
	      		{{ Form::bsText(__('Quota size'),'quota',$sub->quota) }}
			</div>
		</div>
	    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
    <!-- /.card-body -->
  </form>
