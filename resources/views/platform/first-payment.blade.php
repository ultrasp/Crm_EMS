@extends('platform.main')



@section('content')


            @include('platform.layouts.header_no_login')


            

            <div class="cab">
                <div class="cab_containers">
                    <div class="container container-settings container-payments">
                        <div class="payments">
                            <div class="container_title">Оформлення підписки</div>
                            <p>Профиль буде активований після оплати</p>

                            <div class="input  full mx-auto" style="max-width: 200px; ">
                                <div class="input  ">
                                    <select name="" id="">
                                        <option value="">Виберіть кількіть лікарів</option>

                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                    </select>

                                </div>
                            </div>

                            <div class="paymentsList">
                                <div class="payment">
                                    <div class="price">1₴<span>/7днів</span>
                                    </div>
                                    <div class="main mt-3 d-flex align-items-center justify-content-center">
                                        <a href="{{route('patients')}}"><img src="https://static.liqpay.ua/buttons/p1ru.radius.png" alt=""></a>
                                    </div>
                                    <p class="small mt-3 mb-0">Вартість за 4 лікарів на рік</p>
                                </div>
                                <div class="payment">
                                    <div class="price">200₴<span>/місяць</span></div>
                                    <div class="main mt-3 d-flex align-items-center justify-content-center">
                                        <a href="{{route('patients')}}"><img src="https://static.liqpay.ua/buttons/p1ru.radius.png" alt=""></a>
                                    </div>
                                    <p class="small mt-3 mb-0">Вартість за 4 лікарів на місяць</p>
                                </div>
                                <div class="payment">
                                    <div class="price">1000₴<span>/рік</span>
                                        <div class="sale">-20%!</div>
                                    </div>
                                    <div class="main mt-3 d-flex align-items-center justify-content-center">
                                            <a href="{{route('patients')}}"><img src="https://static.liqpay.ua/buttons/p1ru.radius.png" alt=""></a>
                                    </div>
                                    <p class="small mt-3 mb-0">Вартість за 4 лікарів на рік</p>
                                </div>
                                <div class="small text-secondary mt-3 mb-0">
                                    *Після закінчення тестової підписки, автоматично Ваш аккаунт буде переведено на щомісячну підписку.
                                    <br>
                                    *Щомісячна підписка автоматично подовжується кожен місяць, річна підписка автоматично подовжується кожен рік, до того часу,
                                    поки не буде зроблена відміна мінімув за 24 години до закінчення поточного підписаного періоду
                                    <br>
                                    Проплата списується автоматичного з Вашого облікового аккаунту протягом 24годин до закінчення поточного періоду підписки.
                                    <br>
                                    Ви в будь-який час можете відключити автоматичне відновлення підписки в налаштування свого аккаунту.
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="cab">
                <div class="cab_containers">
                    <div class="container container-settings container-payments">
                        <div class="payments">
                            <div class="container_title">Оформлення підписки по промокоду</div>
                            <p>Профиль буде активований після оплати</p>

                            <div class="input  full mx-auto" style="max-width: 200px; ">
                                <div class="input  ">
                                    <select name="" id="">
                                        <option value="">Виберіть кількіть лікарів</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                    </select>

                                </div>
                            </div>

                            <div class="paymentsList">
                                <div class="payment mx-auto">
                                    <div class="price">1₴<span>/14днів</span>
                                    </div>
                                    <div class="main mt-3 d-flex align-items-center justify-content-center">
                                        <a href="{{route('patients')}}"><img src="https://static.liqpay.ua/buttons/p1ru.radius.png" alt=""></a>
                                    </div>
                                    <p class="small mt-3 mb-0">Вартість за 4 лікарів на рік</p>
                                </div>
                                <div class="small text-secondary mt-3 mb-0">
                                    *Після закінчення тестової підписки, автоматично Ваш аккаунт буде переведено на щомісячну підписку.
                                    <br>
                                    *Щомісячна підписка автоматично подовжується кожен місяць, річна підписка автоматично подовжується кожен рік, до того часу,
                                    поки не буде зроблена відміна мінімув за 24 години до закінчення поточного підписаного періоду
                                    <br>
                                    Проплата списується автоматичного з Вашого облікового аккаунту протягом 24годин до закінчення поточного періоду підписки.
                                    <br>
                                    Ви в будь-який час можете відключити автоматичне відновлення підписки в налаштування свого аккаунту.
                                </div>
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