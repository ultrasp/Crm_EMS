@extends('platform.main')



@section('content')


            @include('platform.layouts.header_no_login')
            <div class="cab">
                    <div class="cab_containers">
                        <div class="container container-activation">
                            <div class="title">Введіть код активації</div>
                            <p>Відправленний на email після реєстрації</p>
                            <div class="input"><input placeholder="Код з email" type="text" value=""></div>
                            <div class="btn">Відправити</div>
                        </div>
                    </div>
            </div>

@endsection


@push('styles')

    {{--<meta charset="utf-8"/>--}}
    {{--<link rel="icon" href="/logo.svg"/>--}}
    {{--<meta name="viewport" content="width=device-width,initial-scale=1"/>--}}
    {{--<meta name="theme-color" content="#000000"/>--}}
    {{--<meta name="description" content="Electronic medical card"/>--}}
    {{--<link rel="apple-touch-icon" href="/logo192.png"/>--}}
    {{--<link rel="manifest" href="/manifest.json"/>--}}
    {{--<title>Electronic medical card</title>--}}
    {{--<link href="/static/css/2.93b3b32d.chunk.css" rel="stylesheet">--}}
    {{--<link href="/static/css/main.4ffbbcc6.chunk.css" rel="stylesheet">--}}

@endpush

@push('scripts')

@endpush