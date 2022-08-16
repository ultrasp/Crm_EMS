{{--шаблон печати когда скачивать все карточки --}}

@extends('print.layout')



@section('content')

    <div class="makets maket-oftalm-block" name="print_1">
        <div class="maket maket-1 maket-oftalm-1">
            <img class="back_image" src="{{public_path("/platform/img/svg_oftalm/maket-1.svg")}}" style="position: absolute">


            <div class="field   number">
                {{$patient['card_number']}}
            </div>
            <div class="field   name">
                {{$patient['name']}}
            </div>
            <div class="field   year">
                <div contenteditable="true"></div>
            </div>
            <div class="field   docYear">
                {{date('d.m.Y',strtotime($patient['doc_year']))}}
            </div>
            <div class="field   month">
                <div contenteditable="true"></div>
            </div>
            <div class="field   day">
                {{$patient['birthdate'] ? date('dmy',strtotime($patient['birthdate'])) : ''}}
            </div>
            <div class="field   address">
                {{$patient['address']}}
            </div>
            <div class="field   phone">
                {{$patient['phone']}}
            </div>
            <div class="field   field_0">
                {{$patient['clinic_name']}}
            </div>
            <div class="field   field_1">
                {{$patient['clinic_address']}}
            </div>
            <div class="field   field_2 edropu">
                {{$patient['clinic_kod_edropu']}}
            </div>
            <div class="field   field_5">
                {{$patient['field5']}}
            </div>
            <div class="field   sex">
                {{$patient['gender']}}
            </div>

            <!--Новые поля старт-->

            <div class="field   dispanser">
                {{$patient['field6']}}
            </div>
            <div class="field   kontingent">
                {{$patient['field8']}}
            </div>
            <div class="field   kontingent_text">
                {{$patient['field8text']}}
            </div>
            <div class="field   privilege_num">
                {{$patient['field9']}}
            </div>
            <div class="field   privilege_date_1">
                {{$patient['field10'] ? date('dmy',strtotime($patient['field10'])) : ''}}
            </div>
            <div class="field   privilege_text_1">
                {{$patient['field10text']}}
            </div>
            <div class="field   privilege_date_2">
                {{$patient['field11'] ? date('dmy',strtotime($patient['field11'])) : ''}}
            </div>
            <div class="field   privilege_text_2">
                {{$patient['field11text']}}
            </div>
        </div>


        <div class="maket maket-2 maket-oftalm-2">
            <img class="back_image" src="{{public_path("/platform/img/svg_oftalm/maket-2-new.svg")}}" style="position: absolute">

            <div class="field   field_blood">
                {{$patient['blood']}}
            </div>
            <div class="field   field_resus">
                {{$patient['rezus']}}
            </div>
            <div class="field   field_blood_transfusion">
                {{$patient['blood_transfusion']}}
            </div>
            <div class="field   field_diabet">
                {{$patient['diabet']}}
            </div>
            <div class="field   field_infection">
                {{$patient['infection']}}
            </div>
            <div class="field   field_hirurgion">
                {!! nl2br($patient['hirurgion']) !!}
            </div>
            <div class="field   field_alergion">
                {{$patient['allergy']}}
            </div>
            <div class="field   field_preparate">
                {{$patient['preparate']}}
            </div>

            <div class="field   field_factorrisk">
                {{$patient['factor_risk']}}
            </div>
            <div class="field   field_doctor_signal">
                {{ !empty($patient['maket2_doctor']) ? $patient['maket2_doctor']['fullname'] : ''}}

            </div>

            <div class="field   field_doctor_signal_img">
                {{--                <img src="{{public_path('/uploads/1638780620.png')}}" class=" img-fluid" alt="">--}}

                @if( !empty($patient['maket2_doctor']) &&  $patient['maket2_doctor']['avatar'] != '')
                    <img src="{{public_path('/uploads/'.$patient['maket2_doctor']['avatar'])}}" class="img-fluid" alt="">
                @endif
            </div>
        </div>
        @foreach($patient['pages'] as $page)
            <div class="maket maket-4 maket-oftalm-4">
                <img class="back_image" src="{{public_path("/platform/img/svg_oftalm/maket-3-new-1.svg")}}" style="position: absolute;">
                <div class="lines">
                    <div class="line line-1">
                        <div class="field field-date">
                            @for($i = 1; $i < 23; $i++)
                                {{  property_exists($patient['field16dates'], $page . '_' . $i)  ? date('d.m.y',strtotime($patient['field16dates']->{$page . '_' . $i})) : '' }}
                            @endfor
                        </div>
                        <div class="field field-value">
                            {!! is_object($patient['field16']) && property_exists($patient['field16'],$page) ? nl2br($patient['field16']->$page) : '' !!}
                        </div>
                    </div>
                    <div class="line line-23">
                        @if($patient['doctors'] != '')
                            <div class="field field-value">
                                {{($patient['doctors']->$page)['fullname']}}
                            </div>
                            @if( ($patient['doctors']->$page)['avatar'] != '')
                                <div class="signature" style="background: url('{{ ( $patient['doctors']->$page ? '/uploads/'.($patient['doctors']->$page)['avatar'] : '')}}')"></div>
                                {{--<div class="signature" style="background: url({{public_path('/uploads/1638780620.png')}}); "></div>--}}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
