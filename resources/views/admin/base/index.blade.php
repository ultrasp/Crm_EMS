@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            {{__($title)}}
                        </h3>
                        <div class="card-tools">
                            @foreach($topButtons as $button)
                                @if(isset($button['isAdd'] ) && $button['isAdd'])
                                    <a class="btn btn-block btn-primary btn-xs" href="/admin/{{$urlPrefix}}/item">
                                        {{$button['title']}}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body pad table-responsive">
                        <div class="mb-3">
                            @foreach($topButtons as $button)
                                @if(!isset($button['isAdd'] ))
                                    <a class="btn  btn-warning btn-sm" href="{{$button['url']}}">
                                        {{$button['title']}}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        {!! $html->table() !!}
                    </div>
                    <div class="card-footer">
                        {!! $footer_text !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade show" id="delete-modal" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Deletetitle')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('Do you want delete item?')}}</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="button" id="btn-confirm" class="btn btn-outline-light">{{__('Confirm')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    {!! $html->scripts() !!}
    <script type="text/javascript">
        $(document).ready(function () {
            var remid;
            $('body').on('click', '.deleteRow', function () {
                remid = $(this).data('id');
                $("#delete-modal").modal('show');

            })
            $("#btn-confirm").on('click', function () {
                $("#delete-modal").modal('hide');
                $.ajax({
                    url: "{{url('admin/'.$urlPrefix.'/delete')}}",
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", id: remid},
                    success: function (data) {
                        $('#dataTableBuilder').DataTable().ajax.reload();
                    }
                });

            })
        });
    </script>

@endpush

