@extends('platform.main')



@section('content')

            @include('platform.layouts.header')
            <div class="cab">
                @include('platform.layouts.header_mobile')

                <div class="cab_containers">
                    @include('platform.Patient.menu')

                    <div class="workbench">
                        {{--<div class="btn-my btn-blue btn-save">Зберегти</div>--}}
                        <div class="btn-my btn-blue btn-print"><img src="{{asset('platform/img/svg/print.svg')}}" alt=""></div>
                        <div class="container container-newPatient">
                            <div class="btn-my btn-new btn-blue">Додати пацієнта</div>
                            <div class="makets" name="print_1">
                                <div class="maket maket-1 active" style="background-image: url({{asset('platform/img/svg/maket-1.svg')}});">
                                    <div class="openTheme openTheme-field_5">i</div>
                                    <div class="field   number"><input value="1"></div>
                                    <div class="field   name">
                                        <div contenteditable="true">Іванов Іван Іванович</div>
                                    </div>
                                    <div class="field   year">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field   docYear"><input value=""></div>
                                    <div class="field   month">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field   day"><input value="171220"></div>
                                    <div class="field   address">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field   phone">
                                        <div contenteditable="true">05088888888</div>
                                    </div>
                                    <div class="field   field_0">
                                        <div contenteditable="true">Дента</div>
                                    </div>
                                    <div class="field   field_1">
                                        <div contenteditable="true">Україна</div>
                                    </div>
                                    <div class="field   field_2"><input value="1234567"></div>
                                    <div class="field   field_3"><input disabled="" value=""></div>
                                    <div class="field   field_4"><input disabled="" value=""></div>
                                    <div class="field   field_5">
                                        <div contenteditable="true">Вторинна адентія верхньої щелепи 3 клас за Кеннеді
                                            ф
                                            ф
                                        </div>
                                    </div>
                                    <div class="field   field_7">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field   field_8">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field   field_9">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field   sex">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_1">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_2">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_3">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_4">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_5">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_6">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_7">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_8">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_9">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_10">
                                        <div class="tr_action_left"></div>
                                        <div contenteditable="true"></div>
                                        <div class="tr_action_right"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_11">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field tr rightAlign tr_12">
                                        <div contenteditable="true"></div>
                                    </div>
                                </div>
                                <div class="maket maket-2 " style="background-image: url({{asset('platform/img/svg/maket-2.svg')}});">
                                    <div class="field field-p2-main">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="fields_container">
                                        <div class="ctable ctable-1">
                                            <div class="ctable_title">
                                                <div class="field p2_line1"><input disabled="" value=""></div>
                                            </div>
                                            <div class="ctable_fields">
                                                <div class="field field-0"><input disabled="" value=""></div>
                                                <div class="field field-1"><input disabled="" value=""></div>
                                                <div class="field field-2"><input disabled="" value=""></div>
                                                <div class="field field-3"><input disabled="" value=""></div>
                                                <div class="field field-4"><input disabled="" value=""></div>
                                                <div class="field field-5"><input disabled="" value=""></div>
                                                <div class="field field-6"><input disabled="" value=""></div>
                                                <div class="field field-7"><input disabled="" value=""></div>
                                                <div class="field field-8"><input disabled="" value=""></div>
                                                <div class="field field-9"><input disabled="" value=""></div>
                                                <div class="field field-10"><input disabled="" value=""></div>
                                                <div class="field field-11"><input disabled="" value=""></div>
                                                <div class="field field-12"><input disabled="" value=""></div>
                                                <div class="field field-13"><input disabled="" value=""></div>
                                                <div class="field field-14"><input disabled="" value=""></div>
                                                <div class="field field-15"><input disabled="" value=""></div>
                                            </div>
                                        </div>
                                        <div class="ctable ctable-2">
                                            <div class="ctable_title">
                                                <div class="field p2_line2"><input disabled="" value=""></div>
                                            </div>
                                            <div class="ctable_fields">
                                                <div class="field field-0"><input disabled="" value=""></div>
                                                <div class="field field-1"><input disabled="" value=""></div>
                                                <div class="field field-2"><input disabled="" value=""></div>
                                                <div class="field field-3"><input disabled="" value=""></div>
                                                <div class="field field-4"><input disabled="" value=""></div>
                                                <div class="field field-5"><input disabled="" value=""></div>
                                                <div class="field field-6"><input disabled="" value=""></div>
                                                <div class="field field-7"><input disabled="" value=""></div>
                                                <div class="field field-8"><input disabled="" value=""></div>
                                                <div class="field field-9"><input disabled="" value=""></div>
                                                <div class="field field-10"><input disabled="" value=""></div>
                                                <div class="field field-11"><input disabled="" value=""></div>
                                                <div class="field field-12"><input disabled="" value=""></div>
                                                <div class="field field-13"><input disabled="" value=""></div>
                                                <div class="field field-14"><input disabled="" value=""></div>
                                                <div class="field field-15"><input disabled="" value=""></div>
                                            </div>
                                        </div>
                                        <div class="ctable ctable-3">
                                            <div class="ctable_title">
                                                <div class="field p2_line3"><input disabled="" value=""></div>
                                            </div>
                                            <div class="ctable_fields">
                                                <div class="field field-0"><input disabled="" value=""></div>
                                                <div class="field field-1"><input disabled="" value=""></div>
                                                <div class="field field-2"><input disabled="" value=""></div>
                                                <div class="field field-3"><input disabled="" value=""></div>
                                                <div class="field field-4"><input disabled="" value=""></div>
                                                <div class="field field-5"><input disabled="" value=""></div>
                                                <div class="field field-6"><input disabled="" value=""></div>
                                                <div class="field field-7"><input disabled="" value=""></div>
                                                <div class="field field-8"><input disabled="" value=""></div>
                                                <div class="field field-9"><input disabled="" value=""></div>
                                                <div class="field field-10"><input disabled="" value=""></div>
                                                <div class="field field-11"><input disabled="" value=""></div>
                                                <div class="field field-12"><input disabled="" value=""></div>
                                                <div class="field field-13"><input disabled="" value=""></div>
                                                <div class="field field-14"><input disabled="" value=""></div>
                                                <div class="field field-15"><input disabled="" value=""></div>
                                            </div>
                                        </div>
                                        <div class="ctable ctable-4">
                                            <div class="ctable_title">
                                                <div class="field p2_line4"><input disabled="" value=""></div>
                                            </div>
                                            <div class="ctable_fields">
                                                <div class="field field-0"><input disabled="" value=""></div>
                                                <div class="field field-1"><input disabled="" value=""></div>
                                                <div class="field field-2"><input disabled="" value=""></div>
                                                <div class="field field-3"><input disabled="" value=""></div>
                                                <div class="field field-4"><input disabled="" value=""></div>
                                                <div class="field field-5"><input disabled="" value=""></div>
                                                <div class="field field-6"><input disabled="" value=""></div>
                                                <div class="field field-7"><input disabled="" value=""></div>
                                                <div class="field field-8"><input disabled="" value=""></div>
                                                <div class="field field-9"><input disabled="" value=""></div>
                                                <div class="field field-10"><input disabled="" value=""></div>
                                                <div class="field field-11"><input disabled="" value=""></div>
                                                <div class="field field-12"><input disabled="" value=""></div>
                                                <div class="field field-13"><input disabled="" value=""></div>
                                                <div class="field field-14"><input disabled="" value=""></div>
                                                <div class="field field-15"><input disabled="" value=""></div>
                                            </div>
                                        </div>
                                        <div class="ctable ctable-5">
                                            <div class="ctable_title">
                                                <div class="field p2_line5"><input disabled="" value=""></div>
                                            </div>
                                            <div class="ctable_fields">
                                                <div class="field field-0"><input disabled="" value=""></div>
                                                <div class="field field-1"><input disabled="" value=""></div>
                                                <div class="field field-2"><input disabled="" value=""></div>
                                                <div class="field field-3"><input disabled="" value=""></div>
                                                <div class="field field-4"><input disabled="" value=""></div>
                                                <div class="field field-5"><input disabled="" value=""></div>
                                                <div class="field field-6"><input disabled="" value=""></div>
                                                <div class="field field-7"><input disabled="" value=""></div>
                                                <div class="field field-8"><input disabled="" value=""></div>
                                                <div class="field field-9"><input disabled="" value=""></div>
                                                <div class="field field-10"><input disabled="" value=""></div>
                                                <div class="field field-11"><input disabled="" value=""></div>
                                                <div class="field field-12"><input disabled="" value=""></div>
                                                <div class="field field-13"><input disabled="" value=""></div>
                                                <div class="field field-14"><input disabled="" value=""></div>
                                                <div class="field field-15"><input disabled="" value=""></div>
                                            </div>
                                        </div>
                                        <div class="ctable ctable-6">
                                            <div class="ctable_title">
                                                <div class="field p2_line6"><input disabled="" value=""></div>
                                            </div>
                                            <div class="ctable_fields">
                                                <div class="field field-0"><input disabled="" value=""></div>
                                                <div class="field field-1"><input disabled="" value=""></div>
                                                <div class="field field-2"><input disabled="" value=""></div>
                                                <div class="field field-3"><input disabled="" value=""></div>
                                                <div class="field field-4"><input disabled="" value=""></div>
                                                <div class="field field-5"><input disabled="" value=""></div>
                                                <div class="field field-6"><input disabled="" value=""></div>
                                                <div class="field field-7"><input disabled="" value=""></div>
                                                <div class="field field-8"><input disabled="" value=""></div>
                                                <div class="field field-9"><input disabled="" value=""></div>
                                                <div class="field field-10"><input disabled="" value=""></div>
                                                <div class="field field-11"><input disabled="" value=""></div>
                                                <div class="field field-12"><input disabled="" value=""></div>
                                                <div class="field field-13"><input disabled="" value=""></div>
                                                <div class="field field-14"><input disabled="" value=""></div>
                                                <div class="field field-15"><input disabled="" value=""></div>
                                            </div>
                                        </div>
                                        <div class="ctable ctable-7">
                                            <div class="ctable_title">
                                                <div class="field p2_line7"><input disabled="" value=""></div>
                                            </div>
                                            <div class="ctable_fields">
                                                <div class="field field-0"><input disabled="" value=""></div>
                                                <div class="field field-1"><input disabled="" value=""></div>
                                                <div class="field field-2"><input disabled="" value=""></div>
                                                <div class="field field-3"><input disabled="" value=""></div>
                                                <div class="field field-4"><input disabled="" value=""></div>
                                                <div class="field field-5"><input disabled="" value=""></div>
                                                <div class="field field-6"><input disabled="" value=""></div>
                                                <div class="field field-7"><input disabled="" value=""></div>
                                                <div class="field field-8"><input disabled="" value=""></div>
                                                <div class="field field-9"><input disabled="" value=""></div>
                                                <div class="field field-10"><input disabled="" value=""></div>
                                                <div class="field field-11"><input disabled="" value=""></div>
                                                <div class="field field-12"><input disabled="" value=""></div>
                                                <div class="field field-13"><input disabled="" value=""></div>
                                                <div class="field field-14"><input disabled="" value=""></div>
                                                <div class="field field-15"><input disabled="" value=""></div>
                                            </div>
                                        </div>
                                        <div class="ctable ctable-8">
                                            <div class="ctable_title">
                                                <div class="field p2_line8"><input disabled="" value=""></div>
                                            </div>
                                            <div class="ctable_fields">
                                                <div class="field field-0"><input disabled="" value=""></div>
                                                <div class="field field-1"><input disabled="" value=""></div>
                                                <div class="field field-2"><input disabled="" value=""></div>
                                                <div class="field field-3"><input disabled="" value=""></div>
                                                <div class="field field-4"><input disabled="" value=""></div>
                                                <div class="field field-5"><input disabled="" value=""></div>
                                                <div class="field field-6"><input disabled="" value=""></div>
                                                <div class="field field-7"><input disabled="" value=""></div>
                                                <div class="field field-8"><input disabled="" value=""></div>
                                                <div class="field field-9"><input disabled="" value=""></div>
                                                <div class="field field-10"><input disabled="" value=""></div>
                                                <div class="field field-11"><input disabled="" value=""></div>
                                                <div class="field field-12"><input disabled="" value=""></div>
                                                <div class="field field-13"><input disabled="" value=""></div>
                                                <div class="field field-14"><input disabled="" value=""></div>
                                                <div class="field field-15"><input disabled="" value=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="maket maket-3 " style="background-image: url({{asset('platform/img/svg/maket-3.svg')}});">
                                    <div class="field field_1"><input disabled="" value=""></div>
                                    <div class="field field_2">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field field_3">
                                        <div contenteditable="true"></div>
                                    </div>
                                    <div class="field field_4"><input disabled="" value=""></div>
                                    <div class="field field_5_date"><input disabled="" value=""></div>
                                    <div class="field field_6_date"><input disabled="" value=""></div>
                                    <div class="field field_7">
                                        <div contenteditable="true"></div>
                                    </div>
                                </div>
                                <div class="maket maket-4 " style="background-image: url({{asset('platform/img/svg/maket-4.svg')}});">
                                    <div class="themeList">
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                    </div>
                                    <div class="lines">
                                        <div class="line line-1">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-2">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-3">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-4">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-5">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-6">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-7">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-8">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-9">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-10">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-11">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-12">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-13">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-14">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-15">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-16">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-17">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-18">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-19">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-20">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-21">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-22">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-23">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true">Іванов І.І.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="addPage">+</div>
                                </div>
                                <div class="maket maket-4 maket-5 " style="background-image: url({{asset('platform/img/svg/maket-5.svg')}});">
                                    <div class="themeList themeList-5">
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                    </div>
                                    <div class="lines">
                                        <div class="line line-1">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-2">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-3">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-4">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-5">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-6">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-7">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-8">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-9">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-10">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-11">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-12">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-13">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-14">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-15">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-16">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-17">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-18">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-19">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-20">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-21">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-22">
                                            <div class="field field-date"><input disabled="" value=""></div>
                                            <div class="field field-value">
                                                <div contenteditable="true">Іванов І.І.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="maket maket-4 maket-6 " style="background-image: url({{asset('platform/img/svg/maket-6.svg')}});">
                                    <div class="themeList themeList-6 themeList-left">
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                    </div>
                                    <div class="themeList themeList-6 themeList-right">
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                        <div class="openTheme openTheme-undefined">i</div>
                                    </div>
                                    <div class="lines">
                                        <div class="line line-1">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-2">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-3">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-4">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-5">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-6">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-7">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-8">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-9">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-10">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-11">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-12">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-13">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-14">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-15">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-16">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-17">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-18">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-19">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-20">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-21">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-22">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-23">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                        <div class="line line-24">
                                            <div class="field field-date">
                                                <div contenteditable="true"></div>
                                            </div>
                                            <div class="field field-value">
                                                <div contenteditable="true"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list">
                            <div class="item active" style="background-image: url({{asset('platform/img/svg/maket-1.svg')}});"></div>
                            <div class="item " style="background-image: url({{asset('platform/img/svg/maket-2.svg')}});"></div>
                            <div class="item " style="background-image: url({{asset('platform/img/svg/maket-3.svg')}});"></div>
                            <div class="item " style="background-image: url({{asset('platform/img/svg/maket-4.svg')}});"></div>
                            <div class="item " style="background-image: url({{asset('platform/img/svg/maket-5.svg')}});"></div>
                            <div class="item " style="background-image: url({{asset('platform/img/svg/maket-6.svg')}});"></div>
                        </div>
                        <div class="pagination">
                            <div class="page active">1</div>
                            <div class="page ">2</div>
                            <div class="page ">3</div>
                            <div class="page ">4</div>
                            <div class="page ">5</div>
                            <div class="page ">6</div>
                        </div>
                    </div>
                </div>
            </div>


@endsection


@push('styles')


@endpush

@push('scripts')

@endpush
