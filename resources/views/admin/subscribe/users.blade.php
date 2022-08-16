  <form role="form" class="modal-form" action="{{route('subscribe.users.store')}}">
      	{{ Form::hidden('id',$sub->id) }}
  		@foreach($email_list as $key => $list)
	      	<h3>{{  __( $key == 'admins' ? 'Owner' : ($key == 'managers' ? 'Managers' : 'Doctors')) }}</h3>
	  		@foreach($list as $user)
	  			<div class="row">
	  				<div class="col-md-6">
				      {{ Form::bsText(__('Email'),'invites['.$user->id.'][email]',$user->email,['disabled'=>'disabled']) }}
	  				</div>
	  				<div class="col-md-6">
				      {{ Form::bsDate(__('Date end'),'invites['.$user->id.'][date_end]',$user->end_date, $user->isManager() ? ['disabled'] : []) }}
	  				</div>
	  			</div>
	  		@endforeach
  		@endforeach
	    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
    <!-- /.card-body -->
  </form>
