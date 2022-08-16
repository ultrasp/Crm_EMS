<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>Electronic medical card</title>

    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link rel="icon" href="{{asset('platform/img/logo.svg')}}">--}}
    <meta name="description" content=""/>
    <link rel="shortcut icon" href="{{asset('platform\img\logo.svg')}}" type="image/png">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{asset('platform/bootstrap.min.css')}}">
    <link href="{{asset('platform/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    @stack('styles')

</head>


<body >

<div id="app">
    @yield('content')
</div>



{{--@include('platform.layouts.user_panel')--}}




@include('platform.components.scripts')
<script src="{{ mix('/js/app.js') }}"></script>

<script>

    $( ".openMenu" ).on( "click", function() {

        if ($('.cab_menu').hasClass( "closed" )) {
            $('.cab_menu').removeClass('closed').addClass('opened');

        }else {
            $('.cab_menu').addClass('closed').removeClass('opened');

        }


        console.log('ddd');
    });
</script>
</body>
</html>
