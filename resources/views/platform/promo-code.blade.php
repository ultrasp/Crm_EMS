@extends('platform.main')



@section('content')



    @include('platform.layouts.header_no_login')
    <div class="cab">

        @include('platform.layouts.header_mobile')

        <div class="cab_containers">
            <div class="container container-activation   container-settings container-payments">
                <div class="title">Введіть промокод</div>
                <div class="input">
                    <div class="warn">Неправильний промокод</div>
                    <input placeholder="Промокод" type="text" value="">
                </div>

                <a href="#" class="btn-my">Відправити</a>

                <a href="#">Немає промокоду</a>
            </div>
        </div>
    </div>

@endsection


@push('styles')

@endpush

@push('scripts')

@endpush