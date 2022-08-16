<div class="row">
    <div class="col-md-12">
        <!--        <input type="hidden" name="{{$name}}">-->
        {{$label}}
        <div class="file_list"></div>
        <div class="dropzone dropzone-multiple {{ $is_single ? 'single' : ''}}" data-name="{{$name}}" data-saved='{!!$value!!}'>
            @if(!$is_single)
            <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                <li class="list-group-item px-0">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar">
                                <img class="avatar-img rounded" data-dz-thumbnail>
                            </div>
                        </div>
                        <div class="col-4 ">
                            <h4 class="mb-1" data-dz-name></h4>
                            <p class="small text-muted mb-0" data-dz-size>...</p>
                        </div>
                        <div class="col-5 ">
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm description" placeholder="Описание к файлу" />
                                </div>
                                <button type="button" class="btn btn-sm btn-success change_file_name">
                                    {{__('Change')}}
                                </button>
                            </div>
                        </div>
                        <div class="col-2 ">
                            <a href="#" class="btn btn-sm btn-danger" data-dz-remove>
                                Remove
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            @else
            <div class="dz-preview dz-preview-single">
                <div class="dz-preview-cover">
                    <img class="dz-preview-img"  data-dz-thumbnail>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@push('css')
<style>
    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
    }

</style>
@endpush
