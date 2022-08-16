@extends('admin.layout.main')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-sm-12">
			{{ Form::open(['route' => 'setting.store']) }} 
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
	              	@foreach($items as $key => $item)
                  	<li class="nav-item">
                    	<a 
                    		class="nav-link {{ $key == 0 ? 'active' : ''}}" 
                    		id="{{$item['key']}}" data-toggle="pill" href="{{'#'.$item['key'].'_tab'}}" 
                    		role="tab" 
                    		aria-controls="{{$item['key'].'_tab'}}" 
                    		aria-selected="true">
                    		{{$item['label']}}
                    	</a>
                  	</li>
                  	@endforeach
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
	              	@foreach($items as $key => $item)
                  	<div 
                  		class="tab-pane fade  {{ $key == 0 ? 'show active' : ''}}" 
                  		id="{{$item['key'].'_tab'}}" 
                  		role="tabpanel" 
                  		aria-labelledby="{{$item['key'].'_tab'}}">
                  		@foreach($item['children'] as $child)
					        @if($child['type'] == 'text')
					        	{{ Form::bsText($child['label'],$item['key'].'['.$child['name'].']',$v->get($child['name'])) }}
					        @elseif($child['type'] == 'checkbox')
					        	{{ Form::bsCheckbox($child['label'],$item['key'].'['.$child['name'].']',$v->get($child['name'])) }}
					        @endif
                  		@endforeach
                  		@if(isset($item['sub_groups']))
	                  		@foreach($item['sub_groups'] as $sub)
	                  		<div class="card card-success">
				              	<div class="card-header">
				                	<h3 class="card-title">{{$sub['label']}}</h3>
				             	</div>
				              	<div class="card-body">
			                  		@foreach($sub['children'] as $child)
								        @if($child['type'] == 'text')
								        	{{ Form::bsText($child['label'],$item['key'].'['.$child['name'].']',$v->get($child['name'])) }}
								        @elseif($child['type'] == 'checkbox')
								        	{{ Form::bsCheckbox($child['label'],$item['key'].'['.$child['name'].']',$v->get($child['name'])) }}
								        @endif
			                  		@endforeach
				              	</div>
				              <!-- /.card-body -->
				            </div>
				            @endforeach
			            @endif
                  	</div>
                  	@endforeach
                </div>
              </div>
              <!-- /.card -->
		    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
	</div>
</div>

@endsection


@push('js')
@endpush

