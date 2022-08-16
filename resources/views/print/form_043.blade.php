@extends('print.layout')

{{--шаблон печати когда скачивать все карточки --}}


@section('content')

    <div class="makets" name="print_1">

        <div class="maket maket-1 " >
        {{--<div class="maket maket-1 " style="background-image: url('{{public_path('platform\img\svg\new\mem-maket-1.jpg')}}')">--}}
            <img class=" back_image" src="{{public_path("platform\img\svg\jpg\mem-maket-1.svg")}}" style=" position: absolute; left: 10px; ">

            {{--<div class="maket maket-1 "  >--}}
            <div class="field   number">{{$patient['card_number']}}</div>
            <div class="field   name">
                <div>{{$patient['name']}} </div>
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
                <div>
                    {{$patient['address']}}
                </div>
            </div>
            <div class="field   phone">
                <div>
                    {{$patient['phone']}}
                </div>
            </div>
            <div class="field   field_0">
                <div>
                    {{$patient['clinic_name']}}
                </div>
            </div>
            <div class="field   field_1">
                <div>
                    {{$patient['clinic_address']}}
                </div>
            </div>
            <div class="field   field_2">{{$patient['clinic_kod_edropu']}}</div>
            <div class="field   field_3"><input disabled="" value=""></div>
            <div class="field   field_4"><input disabled="" value=""></div>
            <div class="field   field_5">
                <div>
                    {!! nl2br($patient['field5']) !!}
                </div>
            </div>
            <div class="field   field_7">
                <div>
                    {!! nl2br($patient['field6']) !!}
                </div>
            </div>
            <div class="field   field_8">
                <div>
                    {{$patient['field7']}}
                </div>
            </div>
            <div class="field   field_9">
                <div>
                    {{$patient['field8']}}
                </div>
            </div>
            <div class="field   sex">
                <div>
                    {{$patient['gender']}}
                </div>
            </div>
            {{--<div class="field tr  tr_1 leftAlign">--}}
            {{--так--}}
            {{--</div>--}}
            {{--<div class="field tr  tr_1 rightAlign">--}}
            {{--ні--}}
            {{--</div>--}}
            <div class="field tr  tr_1 {{$patient['field71'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field71'] == 'Y' ? 'так' : 'ні'}}
            </div>
            <div class="field tr  tr_2 {{$patient['field72'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field72'] == 'Y' ? 'так' : 'ні'}}
            </div>
            <div class="field tr tr_3 {{$patient['field73'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field73'] == 'Y' ? 'так' : 'ні' }}
            </div>
            <div class="field tr tr_4 {{$patient['field74'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field74'] == 'Y' ? 'так' : 'ні' }}
            </div>
            <div class="field tr tr_5 {{$patient['field75'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field75'] == 'Y' ? 'так' : 'ні'}}
            </div>
            <div class="field tr tr_6 {{$patient['field75'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field76'] == 'Y' ? 'так' : 'ні'}}
            </div>
            <div class="field tr  tr_7 {{$patient['field77'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field77'] == 'Y' ? 'так' : 'ні'}}
            </div>
            <div class="field tr  tr_8 {{$patient['field78'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field78'] == 'Y' ? 'так' : 'ні'}}
            </div>
            <div class="field tr  tr_9 {{$patient['field79'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field79'] == 'Y' ? 'так' : 'ні' }}
            </div>
            <div class="field tr  tr_10 {{$patient['field80'] == 'Y' ?  'leftAlign' : 'rightAlign'}}">
                {{$patient['field80'] == 'Y' ? 'так' : 'ні' }}
            </div>
            <div class="field tr   tr_11">
                {{$patient['field81'] ? date('d.m.Y',strtotime($patient['field81'])) : '' }}
            </div>
            <div class="field tr   tr_12">
                {{$patient['field82'] ? date('d.m.Y',strtotime($patient['field82'])) : '' }}
            </div>
        </div>


        {{--<div class="maket maket-2 " style="background-image: url('{{public_path('platform/img/maket/maket-2.jpg')}}')">--}}
        <div class="maket maket-2 "  >
            <img class=" back_image" src="{{public_path("platform\img\svg\jpg\mem-maket-2.svg")}}" style=" position: absolute; left: 6px;top: -12px;">

{{--            <img class=" back_image" src="{{public_path("platform\img\svg\mew19-59.svg")}}" style=" position: absolute; left: 10px">--}}


            {{--<div class="maket maket-3 " style="background-image: url('{{public_path('platform/img/maket/maket-3.jpg')}}')"></div>--}}
            {{--<div class="maket maket-4 " style="background-image: url('{{public_path('platform/img/maket/maket-4.jpg')}}')"></div>--}}
            {{--<div class="maket maket-5 " style="background-image: url('{{public_path('platform/img/maket/maket-5.jpg')}}')"></div>--}}
            {{--<div class="maket maket-6 " style="background-image: url('{{public_path('platform/img/maket/maket-6.jpg')}}')"></div>--}}

            {{--    <div class="maket maket-2 " style="background-image: url('{{public_path('platform/img/maket/maket-1.jpg')}}'">--}}
            {{--        <img class="back_image" src="{{public_path("/platform/img/maket/maket-2.jpg")}}" style="position: absolute;padding-top: 15px ">--}}
            <div class="field field-p2-main">
                {!! nl2br($patient['field9']) !!}
            </div>
            <div class="fields_container">
                @for($i = 1; $i<=8; $i++)
                    <div class="ctable {{ 'ctable-'.$i }} ">
                        <div class="ctable_title">
                            <div class="field {{ 'p2_line'.$i}}" style="position: absolute; top: {{ 10 - 10 + ($i - 1) * 26 + ( $i > 4 ? 40 : 0)  }}px;">
                                {{$patient['field9time'][$i] ?? ''}}
                            </div>
                        </div>
                        <div class="ctable_fields">
                            @for($f = 1; $f<=16; $f++)
                                <div class="field {{'field-'.$f}}"
                                     style="position: absolute; top: {{ 10 - 10  - 1 + ($i - 1) * 26 + ( $i > 4 ? 40 : 0)  }}px; left: {{65 + $f * 38}}px"
                                >
                                    <div>  {{$patient['field9table']->{$i.'_'.$f} ?? ''}} </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endfor
            </div>
        </div>


        {{--<div class="maket maket-3 " style="background-image: url('{{public_path('platform/img/maket/maket-3.jpg')}}')">--}}
        <div class="maket maket-3 " >
            <img class=" back_image" src="{{public_path("platform\img\svg\jpg\mem-maket-3.svg")}}" style=" position: absolute; left: 5px;top: -14px;">

            <div class="field field_1">
                {!! $patient['field10'] !!}
            </div>
            <div class="field field_2">
                {!! nl2br($patient['field11']) !!}
            </div>
            <div class="field field_3">
                {!! nl2br($patient['field12']) !!}
            </div>
            <div class="field field_4">
                {{$patient['field13']}}
            </div>
            <div class="field field_5_date">
                {{$patient['field14']}}
            </div>
            <div class="field field_6_date">
                {{$patient['field15']}}
            </div>
            <div class="field field_7">
                {!! nl2br($patient['field15text']) !!}
            </div>
        </div>
        @foreach($patient['pages'] as $page)
            <div class="maket maket-4 "  >
                <img class=" back_image" src="{{public_path("platform\img\svg\jpg\mem-maket-4.svg")}}" style=" position: absolute; left: 5px;top: -5px;">

                {{--<div class="maket maket-4 " style="background-image: url('{{public_path('platform\img\svg\maket-4.svg')}}'">--}}
                {{--<img class="back_image" src="{{public_path("platform\img\svg\maket-4.svg")}}">--}}
                <div class="themeList ">
                </div>
                <div class="lines">
                    <div class="line line-1">
                        <div class="field field-date" style="">
                            @for($i =1;$i<2; $i++)
                                {{date('d.m.Y',strtotime($patient['field16dates']->{$page.'_'.$i} ?? ''))}}
                                {{--{{$patient['field16dates']->{$page.'_'.$i} ?? ''}}--}}
                            @endfor
                        </div>
                        <div class="field field-value">
                            {!! is_object($patient['field16']) && property_exists($patient['field16'],$page) ? nl2br($patient['field16']->$page) : '' !!}
                        </div>
                    </div>
                    <div class="line line-23">
                        <div class="field field-date"><input disabled="" value=""></div>
                        @if($patient['doctors']->$page)
                            <div class="field field-value">
                                {{$patient['doctors']->$page ? $patient['doctors']->$page['fullname'] : ''}}
                            </div>

                            @if(($patient['doctors']->$page)['avatar'] != '')
                                <div class="signature" style="background: url('{{ ( $patient['doctors']->$page ? '/uploads/'.($patient['doctors']->$page)['avatar'] : '')}}')"></div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach


        <div class="maket  maket-5 "  >
            <img class=" back_image" src="{{public_path("platform\img\svg\jpg\mem-maket-5.svg")}}" style=" position: absolute; left: 5px;top: -16px;">

            {{--<div class="maket maket-4 maket-5 " style="background-image: url('{{public_path('platform\img\svg\maket-5.svg')}}'">--}}
            {{--<img class="back_image" src="{{public_path("/platform/img/maket/maket-5.jpg")}}">--}}
            <div class="themeList themeList-5">
            </div>
            <div class="lines">
                @for($i = 1; $i < 23; $i++)
                    <div class="line {{'line-'.$i}}">
                        <div class="field field-date" style="position: absolute; width: 126px; text-align: center!important; left: 0px; top: {{ ($i - 1 ) * 15.7 - 0  }}px;  ">
                            {{ is_object($patient['field17dates']) && isset($patient['field17dates']->$i) ? $patient['field17dates']->$i : '' }}
                        </div>
                        <div class="field field-value" style="position: absolute; width: 588px; left: 127px;top: {{ ($i  ) * 1 - 0}}px;">
                            {!! nl2br( is_object($patient['field17']) ? $patient['field17']->$i : '') !!}
                        </div>
                    </div>
                @endfor

            </div>
        </div>
        <div class="maket maket-6 "  >
            <img class=" back_image" src="{{public_path("platform\img\svg\jpg\mem-maket-6.svg")}}" style=" position: absolute; left: 5px;top: -26px;">

            <div class="lines">
                <div class="line line-1">
                    <div class="field field-date">
                        {!! nl2br($patient['field18']) !!}
                    </div>
                    <div class="field field-value">
                        {!! nl2br($patient['field19']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
