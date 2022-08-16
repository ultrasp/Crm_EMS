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
	                </div>
				</div>
				<div class="card-body pad table-responsive">
					{!! $html->table() !!}
					
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


<div class="modal fade show" id="modalForm" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title" id="form-modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
<!--             <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{__('Cancel')}}</button>
                <button type="button" id="btn-confirm" class="btn btn-outline-light">{{__('Save')}}</button>
            </div> -->
        </div>
    </div>
 </div>
@endsection


@push('js')
    <script type="text/javascript">
	    $( document ).ready(function() {
	    	var  lang  = 'uk'
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click','.formBtn',function(){
                var title = $(this).data('title');
                $('#form-modal-title ').html(title);
                $.post( $(this).data('href'),{id:$(this).data('id')}, function( data ) {
                  $( "#modalForm .modal-body" ).html( data.html );
                    new SaveTrait({selector: '#modalForm .modal-form', enableButtonOnSuccess: true}).setAdditionalSuccessCallback(afterSave);
                });
                $('#modalForm').modal('show');
            })

            function afterSave(){
                $( "#modalForm").modal('hide');
                $('#dataTableBuilder').DataTable().ajax.reload();
            }
            // new SaveTrait({selector: '.modal-form', enableButtonOnSuccess: true});

            makeTable();

            var table
            function makeTable(){
                table = $('#dataTableBuilder').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/admin/subscribe',
                    columns: {!! json_encode($columns) !!},
                    "language":  {
                        "url" : "{{asset('/backasset/js/Russian.json')}}"
                    },
                    "order": [[0, "desc"]],
                });
            }

            function format ( d ) {
                // `d` is the original data object for the row
                return '<table id="childTable'+d.id+'" class="table table-striped- table-bordered table-hover table-checkable table table-responsive-md"></table>';
            }
            var childTable;

             $('#dataTableBuilder tbody').on('click', 'td a.detail_btn', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
                var icon = $(this).find('i');
                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    childTable.destroy();
                    row.child.hide();
                    icon.addClass('la-chevron-circle-down').removeClass('la-chevron-circle-up');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    childTable = $('#childTable'+row.data().id).DataTable({
                        processing: true,
                        serverSide: true,
                        pageLength: 14,
                        bPaginate: false,
                        ajax: '/admin/sub/payments/'+row.data().id,
                        columns: [
                            {data: 'id', 'title': '#'},
                            {data: 'amount', 'title': 'Сума'},
                            {data: 'updated_at', 'title': 'Оплачено'},
                        ],
                        language: lang,
                        "order": [[0, "desc"]],
                    });
                    icon.addClass('la-chevron-circle-up').removeClass('la-chevron-circle-down');
                    tr.addClass('shown');
                }
            })

	    	var remid;
	    	$('body').on('click','.deleteRow',function(){
	    		remid = $(this).data('id');
	    		$("#delete-modal").modal('show');

		    })
		    $("#btn-confirm").on('click',function(){
	    		$("#delete-modal").modal('hide');
	            $.ajax({
	                url: "{{url('admin/subscribe/delete')}}",
	                type: 'POST',
	                data: {_token: "{{ csrf_token() }}", id:remid},
	                success: function(data) {
			    		$('#dataTableBuilder').DataTable().ajax.reload();
	                }
	            });

		    })
		});
    </script>

@endpush

