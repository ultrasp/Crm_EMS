@extends('platform.main')



@section('content')


            @include('platform.layouts.header_no_login')
            <div class="sauth">
                <div class="wr">
                    <div class="auth">
                        <div class="auth_head">
                            <div class="title">Відновлення паролю</div>
                        </div>
                        <div class="inputs">
                            <div class="input "><input name="email" type="email" placeholder="Введіть Email" value=""></div>
                            <div class="button">
                                <button class="btn-my btn-blue">Відправити</button>
                            </div>
                        </div>
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