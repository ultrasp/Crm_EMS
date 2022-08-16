@extends('platform.main')



@section('content')

    @include('platform.layouts.header')
    <div class="container">
        <div class="alert alert-danger" role="alert">
            После сохранения отображать в правом верхнем углу уведомление об сохранении или ошибке <br>
            https://codeseven.github.io/toastr/demo.html <br>
            Такие уведомление сделать на всех страницах системы, но можно также использовать из коробки для vue.js другую подобную библиотеку для уведомлений

        </div>
    </div>
    <div class="cab">
        @include('platform.layouts.header_mobile')
        <div class="cab_containers">

            @include('platform.cabinet.menu')

            <div class="container container-settings">

                <div class="container_title">Профіль</div>

                <div class="row">
                    <div class="col-12 col-md-9">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Прізвище <span>*</span></label>
                                    <input type="text" class="form-control is-invalid" placeholder="Прізвище">
                                    <div class="invalid-feedback d-flex">
                                        Заповніть поле
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Ім’я</label>
                                    <input type="text" class="form-control" placeholder="Ім’я">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">По-батькові</label>
                                    <input type="text" class="form-control" placeholder="По-батькові">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Телефон</label>
                                    <input type="text" class="form-control" placeholder="Телефон">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">E-mail</label>
                                    <input type="text" class="form-control" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Пароль</label>
                                    <input type="text" class="form-control" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Підпис лікаря</label>

                                            <div class="image image-small" style="background-image: url(&quot;&quot;);">
                                                <div class="svg">
                                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                         x="0px" y="0px" viewBox="0 0 390 390" xml:space="preserve"><g id="XMLID_17_">
                                                            <path id="XMLID_18_" d="M365,95h-70.855l-15.1-40.267C276.85,48.878,271.253,45,265,45H125c-6.253,0-11.85,3.878-14.045,9.733L95.855,95H25c-13.807,0-25,11.193-25,25v200c0,13.807,11.193,25,25,25h340c13.807,0,25-11.193,25-25V120C390,106.193,378.807,95,365,95z M195,125c52.383,0,95,42.617,95,95s-42.617,95-95,95s-95-42.617-95-95S142.617,125,195,125z"></path>
                                                            <path id="XMLID_21_" d="M130,220c0,35.841,29.159,65,65,65s65-29.159,65-65s-29.159-65-65-65S130,184.159,130,220z"></path>
                                                        </g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g>
                                                        <g></g></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="signInfo"><p>Для того щоб правильно відображався підпис на формі, потрібно його сфотографувати на білому фоні, та через серівс <a href="https://www.remove.bg/ru/upload">https://www.remove.bg/ru/upload</a> видалити фон. Після цього завантажити підпис без фону в систему</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold">Аватар</label>
                            <div class="image image-sign w-100" style="background-image: url(&quot;&quot;);">
                                <div class="svg">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                         x="0px" y="0px" viewBox="0 0 390 390" xml:space="preserve"><g id="XMLID_17_">
                                            <path id="XMLID_18_" d="M365,95h-70.855l-15.1-40.267C276.85,48.878,271.253,45,265,45H125c-6.253,0-11.85,3.878-14.045,9.733L95.855,95H25c-13.807,0-25,11.193-25,25v200c0,13.807,11.193,25,25,25h340c13.807,0,25-11.193,25-25V120C390,106.193,378.807,95,365,95z M195,125c52.383,0,95,42.617,95,95s-42.617,95-95,95s-95-42.617-95-95S142.617,125,195,125z"></path>
                                            <path id="XMLID_21_" d="M130,220c0,35.841,29.159,65,65,65s65-29.159,65-65s-29.159-65-65-65S130,184.159,130,220z"></path>
                                        </g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g></svg>
                                </div>
                            </div>
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