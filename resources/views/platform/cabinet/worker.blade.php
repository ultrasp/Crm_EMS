@extends('platform.main')



@section('content')


            @include('platform.layouts.header')
            <div class="cab">
                @include('platform.layouts.header_mobile')
                <div class="cab_containers">
                    @include('platform.cabinet.menu')


                    <div class="container container-settings">
                        <div class="container_title">Працівники клініки</div>

                        <div class="row">
                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Власник клініки</label>
                                            <input type="text" class="form-control" disabled placeholder="Введіть Email" value="administrator@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 ">
                                        {{--<div class="d-flex align-items-center justify-content-start pt-33" >--}}
                                        {{--<button type="button" class="btn btn-primary mr-3"><i class="fas fa-undo-alt"></i></button>--}}
                                        {{--<button type="button" class="btn btn-danger"><i class="fas fa-user-times"></i></button>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="col-12 col-md-4 pt-33">
                                        <div class="">
                                            Доступ до <span>20.06.2021</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Адміністратор клініки</label>
                                            <input type="text" class="form-control" disabled placeholder="Введіть Email" value="administrator@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 ">
                                        <div class="d-flex align-items-center justify-content-start pt-33">
                                            <button type="button" class="btn btn-primary mr-3"><i class="fas fa-undo-alt"></i></button>
                                            <button type="button" class="btn btn-danger"><i class="fas fa-user-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 pt-33">
                                        <div class="text-danger">
                                            Доступ до <span>20.06.2021</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Лікар 1</label>
                                            <input type="text" class="form-control" disabled placeholder="Введіть Email" value="doctor1@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 ">
                                        <div class="d-flex align-items-center justify-content-start pt-33">
                                            <button type="button" class="btn btn-primary mr-3"><i class="fas fa-undo-alt"></i></button>
                                            <button type="button" class="btn btn-danger"><i class="fas fa-user-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 pt-33">
                                        <div class="text-danger">
                                            Доступ до <span>20.04.2021</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Лікар 2</label>
                                            <input type="text" class="form-control" disabled placeholder="Введіть Email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 ">
                                        <div class="d-flex align-items-center justify-content-start pt-33">
                                            <button type="button" class="btn btn-primary mr-3"><i class="fas fa-undo-alt"></i></button>
                                            <button type="button" class="btn btn-danger"><i class="fas fa-user-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 pt-33">
                                        <div class="text-danger">
                                            Доступ до <span>20.06.2021</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="buttons">
                                    <div class="btn-my ml-0 mr-auto">Додати працівника</div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="buttons">--}}
                        {{--<div class="btn-my">Зберегти</div>--}}
                        {{--</div>--}}

                    </div>
                </div>
            </div>

@endsection


@push('styles')


@endpush

@push('scripts')

@endpush