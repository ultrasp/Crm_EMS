  <form role="form" class="modal-form" action="{{route('subscribe.doctor.count.store')}}">
      {{ Form::hidden('id',$id) }}
      {{ Form::bsText(__('Docotors count'),'doc_count','') }}
      {{ Form::bsText(__('Access days'),'days_count','1') }}
    <!-- /.card-body -->
    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
  </form>
