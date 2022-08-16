@extends('platform.main')



@section('content')


            @include('platform.layouts.header')
            {{--<div class="container">--}}
            {{--<div class="alert alert-danger" role="alert">--}}
            {{--</div>--}}
            {{--</div>--}}

            <div class="cab">
                @include('platform.layouts.header_mobile')


                <div class="cab_containers">
                    @include('platform.Patient.menu')

                    <div class="container container-settings">

                        <div class="container_title">Карта пацієнта</div>

                        <div class="row">

                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Прізвище</label>
                                    <input type="text" class="form-control" placeholder="Введіть прізвище">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Ім'я</label>
                                    <input type="text" class="form-control" placeholder="Введіть ім'я">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">По батькові</label>
                                    <input type="text" class="form-control" placeholder="Введіть по батькові">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Дата нарождення</label>
                                    <input type="text" class="form-control" placeholder="Вкажіть дату нарождення">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Номер телефону</label>
                                    <input type="text" class="form-control" placeholder="Вкажіть номер телефону">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Адреса</label>
                                    <input type="text" class="form-control" placeholder="Вкажіть адресу">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control" placeholder="Вкажіть email">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Стать</label>

                                   <div class="d-flex align-items-start justify-content-start">
                                       <div class="form-check mr-3">
                                           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                           <label class="form-check-label" for="exampleRadios1">
                                               Чоловік
                                           </label>
                                       </div>
                                       <div class="form-check">
                                           <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                           <label class="form-check-label" for="exampleRadios2">
                                               Жінка
                                           </label>
                                       </div>
                                   </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Номер карти пацієнта</label>
                                    <input type="text" class="form-control" placeholder="Вкажіть номер карти">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Коментар</label>
                                    <textarea class="form-control" name="" rows="5" placeholder="Введіть коментар"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="btn-my">Зберегти</div>
                        </div>
                    </div>
                </div>
            </div>
@endsection


@push('styles')


@endpush

@push('scripts')

@endpush