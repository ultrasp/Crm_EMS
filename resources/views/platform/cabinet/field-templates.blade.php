@extends('platform.main')



@section('content')


            @include('platform.layouts.header')
            <div class="cab">
                @include('platform.layouts.header_mobile')
                <div class="cab_containers">

                    @include('platform.cabinet.menu')


                    <div class="container container-settings">
                        <div class="container_title">Збережені поля</div>

                        <div class="row">
                            <div class="col-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-1" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Діагнози</a>
                                    <a class="nav-link" id="v-pills-home-2" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Скарги</a>
                                    <a class="nav-link" id="v-pills-home-3" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Перенесені та супутні захворювання</a>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-home-1">
                                        <div class="form form-fields">
                                            <div class="sfield">
                                                <div class="sfield_title">Діагнози</div>
                                                <div class="items">
                                                    {{--<div class="add">+</div>--}}
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="ml-auto add-btn">+</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade  " id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-home-2">
                                        <div class="form form-fields">
                                            <div class="sfield">
                                                <div class="sfield_title">Діагнози</div>
                                                <div class="items">
                                                    {{--<div class="add">+</div>--}}
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="ml-auto add-btn">+</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade  " id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-home-3">
                                        <div class="form form-fields">
                                            <div class="sfield">
                                                <div class="sfield_title">Діагнози</div>
                                                <div class="items">
                                                    {{--<div class="add">+</div>--}}
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="item"><input placeholder="Назва шаблону" value="Диагноз 1">
                                                        <div class="remove">×</div>
                                                        <textarea placeholder="Текст">Описание Диагноз 1</textarea>
                                                    </div>
                                                    <div class="ml-auto add-btn">+</div>

                                                </div>
                                            </div>
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