<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    {{--<link href="{{asset('platform/main.css')}}" rel="stylesheet">--}}
    <link href="{{asset('platform/pdf.css')}}" rel="stylesheet">

    <style>
    @font-face {
      font-family: "DejaVu Sans";
      font-style: normal;
      font-weight: 400;
      src: url("/fonts/dejavu-sans/DejaVuSans.ttf");
      /* IE9 Compat Modes */
      src:
        local("DejaVu Sans"),
        local("DejaVu Sans"),
        url("/fonts/dejavu-sans/DejaVuSans.ttf") format("truetype");
    }
    body {
      font-family: "DejaVu Sans";
      font-size: 10px;
    }
    </style>
    <style type="text/css">

        @page {
            size:   210mm 148mm;
            /*size: 210mm  297mm;*/
            margin: 0;
        }
        .maket{display: block;}
        @media  print { body { -webkit-print-color-adjust: exact; }

        }
        .maket .field > div, .maket .field > input {
            border: none;
            font-size: 12px;
            background-color: rgba(136, 170, 244, 0)!important;
        }
        /*.maket-2 .field-p2-main *{*/
            /*line-height: 12px;*/

        /*}*/
        .maket .field > div, .maket .field > input {

            /*line-height: 12px!important;*/
        }


        .field {
            /*background: rgba(179, 0, 0, 0.44);*/
            /*font-size: 10px;*/

        }
    </style>

    <style></style>
</head>


<body >
	<div>
		@yield('content')
    </div>
</body>
</html>
