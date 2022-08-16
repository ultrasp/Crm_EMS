@extends('platform.main')



@section('content')

            @include('platform.layouts.header')
            <div class="cab" >
                @include('platform.layouts.header_mobile')
                <div class="cab_containers">
                    @include('platform.cabinet.menu')
                    <div class="container container-settings">
                        <div class="container_title">Оплати</div>

                        <div class="main">
                            <div class="form">
                           
                            </div>


                            <div class="buttons">
                                {{--<div class="btn-my btn-light">Відмінити</div>--}}
                                <div class="btn-my">Зберегти</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection


@push('styles')


@endpush

@push('scripts')

@endpush