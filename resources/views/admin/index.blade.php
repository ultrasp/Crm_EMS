@extends('admin.layout.main')



@section('content')
	<div class="row">
		<div class="col-md-12">
		  	<form role="form" method="get">
		  		<div class="row">
		  			<div class="col-md-4">  
		          		{{ Form::bsDate('Дата начала','start',$startTime) }}
		  			</div>
		  			<div class="col-md-4">
		          		{{ Form::bsDate('Дата окончание','end',$endTime) }}
		  			</div>
		  			<div class="col-md-4">  
		  			    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 30px">{{__('Filter')}}</button>
					</div>
		  		</div>
	        </form>
		</div>
		<div class="col-md-6">
		     <div class="card card-success">
		      <div class="card-header">
		        <h3 class="card-title">Підписки по місяцям</h3>

		        <div class="card-tools">
		          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
		          </button>
		          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
		        </div>
		      </div>
		      <div class="card-body">
		        <div class="chart">
		          <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
		        </div>
		      </div>
		      <!-- /.card-body -->
		    </div>
		</div>
		<div class="col-md-6">
		     <div class="card card-primary">
		      <div class="card-header">
		        <h3 class="card-title">Кількість пацієнтів</h3>

		        <div class="card-tools">
		          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
		          </button>
		          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
		        </div>
		      </div>
		      <div class="card-body">
		        <div class="chart">
		          <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
		        </div>
		      </div>
		      <!-- /.card-body -->
		    </div>
		</div>
		<div class="col-md-6">
		     <div class="card card-danger">
		      <div class="card-header">
		        <h3 class="card-title">Кількість прибутку по транзакціям</h3>

		        <div class="card-tools">
		          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
		          </button>
		          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
		        </div>
		      </div>
		      <div class="card-body">
		        <div class="chart">
		          <canvas id="barChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
		        </div>
		      </div>
		      <!-- /.card-body -->
		    </div>
		</div>
		<div class="col-md-6">
		     <div class="card card-warning">
		      <div class="card-header">
		        <h3 class="card-title">Кількість користувачів з неоплаченими підписками</h3>

		        <div class="card-tools">
		          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
		          </button>
		          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
		        </div>
		      </div>
		      <div class="card-body">
		        <div class="chart">
		          <canvas id="barChart4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
		        </div>
		      </div>
		      <!-- /.card-body -->
		    </div>
		</div>
	</div>

@endsection


@push('styles')

@endpush

@push('js')
<!-- ChartJS -->
<script src="{{asset('backasset/')}}/plugins/chart.js/Chart.min.js"></script>
<script type="text/javascript">
    var areaChartData = {
      labels  : JSON.parse("{{json_encode($keyLabels,JSON_UNESCAPED_UNICODE)}}".replace(/&quot;/g,'"')),
      datasets: [
        {
          label               : 'Підписки',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {{json_encode(array_values($subdata))}}
        }
      ]
    }


    var areaChartData2 = {
      labels  : JSON.parse("{{json_encode($keyLabels,JSON_UNESCAPED_UNICODE)}}".replace(/&quot;/g,'"')),
      datasets: [
        {
          label               : 'Пацієнти',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {{json_encode(array_values($patientData))}}
        }
      ]
    }

    var areaChartData3 = {
      labels  : JSON.parse("{{json_encode($keyLabels,JSON_UNESCAPED_UNICODE)}}".replace(/&quot;/g,'"')),
      datasets: [
        {
          label               : 'Прибуток',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : JSON.parse("{{json_encode(array_values($paymentData))}}".replace(/&quot;/g,'"'))
        }
      ]
    }

    var areaChartData4 = {
      labels  : JSON.parse("{{json_encode($keyLabels,JSON_UNESCAPED_UNICODE)}}".replace(/&quot;/g,'"')),
      datasets: [
        {
          label               : 'Кількість неоплачених користувачів',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : JSON.parse("{{json_encode(array_values($unPayedUserData))}}".replace(/&quot;/g,'"'))
        }
      ]
    }
	    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp0
    // barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
      scales: {
      	yAxes: [{
      		ticks: {
			    min: 0,
      			stepSize: 1
      		}	
      	}]
      }
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    var barChartCanvas = $('#barChart2').get(0).getContext('2d')
    var barChartData2 = jQuery.extend(true, {}, areaChartData2)
    temp0 = areaChartData2.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    barChartData2.datasets[0] = temp0

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData2,
      options: barChartOptions
    })

    var barChartCanvas3 = $('#barChart3').get(0).getContext('2d')
    var barChartData3 = jQuery.extend(true, {}, areaChartData3)
    temp0 = areaChartData3.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    barChartData3.datasets[0] = temp0

    var barChart = new Chart(barChartCanvas3, {
      type: 'bar', 
      data: barChartData3,
      options: barChartOptions
    })

    var barChartCanvas4 = $('#barChart4').get(0).getContext('2d')
    var barChartData4 = jQuery.extend(true, {}, areaChartData4)
    temp0 = areaChartData4.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    barChartData4.datasets[0] = temp0

    var barChart = new Chart(barChartCanvas4, {
      type: 'bar', 
      data: barChartData4,
      options: barChartOptions
    })

</script>
@endpush