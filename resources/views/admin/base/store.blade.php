@extends('admin.layout.main')

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">
      {{ (empty($item->id) ? __('Form add') : __('Form edit')) .'  '.__($item->single_item)}}
    </h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" action="{{route($item->url_prefix.'.store')}}">
    <div class="card-body">
      {{ Form::hidden('id',$item->id) }}
      @foreach($item->formInputs() as $inp)
        @if($inp['type'] == 'text')
          {{ Form::bsText($inp['title'],$inp['name'],$item->{$inp['name']}) }}
        @elseif($inp['type'] == 'checkbox')
          {{ Form::bsCheckbox($inp['title'],$inp['name'],$item->{$inp['name']}) }}
        @elseif($inp['type'] == 'file')
          {{ Form::bsFile($inp['title'],$inp['name'],$item->{$inp['name']}) }}
        @elseif($inp['type'] == 'select')
          {{ Form::bsSelect($inp['title'],$inp['name'],$item->{$inp['name']},$item->{$inp['options']}()) }}
        @elseif($inp['type'] == 'date')
          {{ Form::bsDate($inp['title'],$inp['name'],$item->{$inp['name']}) }}
        @elseif($inp['type'] == 'textarea')
          {{ Form::bsTextarea($inp['title'],$inp['name'],$item->{$inp['name']}) }}
        @elseif($inp['type'] == 'editor')
          {{ Form::bsTextarea($inp['title'],$inp['name'],$item->{$inp['name']},true) }}
        @endif
      @endforeach
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
    </div>
  </form>
</div>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            new SaveTrait({selector: 'form', enableButtonOnSuccess: true});
        });
    </script>

@endpush