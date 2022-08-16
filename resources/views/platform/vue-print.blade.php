<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <link href="{{asset('platform/main.css')}}" rel="stylesheet">
    <style type="text/css">@page  { size: landscape; margin:0mm; } .maket{display: block;} @media  print { body { -webkit-print-color-adjust: exact; }   }</style>
</head>


<body >
	<div id="app">
    	<router-view></router-view>
    </div>
<script>
    window.user = @json(auth()->user())
</script>
<script src="{{asset('backasset')}}/plugins/jquery/jquery.min.js"></script>
    <!-- DataTables -->
<script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
