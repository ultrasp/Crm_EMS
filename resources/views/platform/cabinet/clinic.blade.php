@extends('platform.main')



@section('content')


            @include('platform.layouts.header')
            <div class="cab" >
                @include('platform.layouts.header_mobile')
                <div class="cab_containers">
                    @include('platform.cabinet.menu')
                    <div class="container container-settings">
                        <div class="container_title">Клініка</div>
                        <div class="row">
                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Адреса клініки</label>
                                            <input type="text" class="form-control" placeholder="Адреса клініки">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Назва клініки</label>
                                            <input type="text" class="form-control" placeholder="Назва клініки">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Код ЄДРПОУ</label>
                                            <input type="text" class="form-control" placeholder="Код ЄДРПОУ">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Номер карти <span class="small">(З якого починати створення)</span></label>
                                            <input type="text" class="form-control" placeholder="Номер карти">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">Логотип</label>
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