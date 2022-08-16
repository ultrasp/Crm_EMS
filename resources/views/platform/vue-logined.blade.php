<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>Electronic medical card</title>

    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content=""/>
    <link rel="shortcut icon" href="{{asset('platform\img\logo.svg')}}" type="image/png">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{asset('platform/bootstrap.min.css')}}">
    <link href="{{asset('platform/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backasset')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('backasset')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!--     <style type="text/css">
            @page { size: auto;  margin: 0mm; } @media print { body { -webkit-print-color-adjust: exact; } }
        </style> -->
    @stack('styles')

</head>


<body>

<div id="app">
    <header-block v-bind:user="user"></header-block>
    <notification></notification>
    <div class="cab">
        <header-mobile-block ></header-mobile-block>
    <!--         @include('platform.layouts.header_mobile') -->
        <div class="cab_containers" v-bind:class="{ 'fix-menu': isPatientsPage}">
            <patient-menu v-if="isPatientsPage"></patient-menu>
            <cabinet-menu v-if="isCabinetsPage"></cabinet-menu>
            <router-view v-on:update-header="updateHeader"></router-view>
        </div>
    </div>
</div>
<script>
  window.user = @json(auth()->user())
</script>
<script src="{{asset('backasset')}}/plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="{{asset('backasset')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('backasset')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('backasset')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('backasset')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ mix('/js/app.js') }}"></script>

<script>

    $( ".openMenu" ).on( "click", function() {

    if ($('.cab_menu').hasClass("closed")) {
      $('.cab_menu').removeClass('closed').addClass('opened');

    } else {
      $('.cab_menu').addClass('closed').removeClass('opened');

    }
  });
</script>
</body>
</html>
