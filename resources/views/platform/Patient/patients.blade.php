@extends('platform.main')



@section('content')


    @include('platform.layouts.header')
    <div class="container">
        <div class="alert alert-danger" role="alert">
            Здесь сделать дататейбл с поиском и сортировка как в двтвтейбл, я потом поправлю по стилях. <br>
            Дататейбл лутше использовать из коробки для vue.js <br>
            Основные поля как в таблице ниже
            <br>
            Кнопка распечатать все карточки из таблицы
            <br>
            + фильтр по таблице (номер карты, дата рождения от и до, дата создания пациента от и до)
        </div>
    </div>


    <div class="cab">
        @include('platform.layouts.header_mobile')

        <div class="cab_containers">
            <div class="container">


                <div class="container_title">База пацієнтів</div>
                <div class="container_filter">
                    <div class="search"><input placeholder="Пошук по ПІБ..." type="text"></div>
                    <select>
                        <option value="default">Звичайне</option>
                        <option value="invert">Останнє додане</option>
                    </select></div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" style=" text-align: center">№</th>
                        <th scope="col">ПІБ</th>
                        <th scope="col">Дата народження</th>
                        <th scope="col">Телефон</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" style="width: 100px; text-align: center">1</th>
                        <td><a href="{{route('patient_card')}}">Іванов Іван Іванович</a></td>
                        <td>17.12.20</td>
                        <td>05088888888</td>
                        <td style="" >
                            <div class="d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-secondary mx-1"><i class="fas fa-print"></i></button>
                                {{--                                        <a href="{{route('patient_card')}}" type="button" class="btn btn-primary mx-1"><i class="fas fa-edit"></i></a>--}}

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 100px; text-align: center">1</th>
                        <td>Іванов Іван Іванович</td>
                        <td>17.12.20</td>
                        <td>05088888888</td>
                        <td style="">
                            <div class="d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-secondary mx-1"><i class="fas fa-print"></i></button>
                                {{--                                        <a href="{{route('patient_card')}}" type="button" class="btn btn-primary mx-1"><i class="fas fa-edit"></i></a>--}}

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 100px; text-align: center">1</th>
                        <td>Іванов Іван Іванович</td>
                        <td>17.12.20</td>
                        <td>05088888888</td>
                        <td style="">
                            <div class="d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-secondary mx-1"><i class="fas fa-print"></i></button>
                                {{--                                        <a href="{{route('patient_card')}}" type="button" class="btn btn-primary mx-1"><i class="fas fa-edit"></i></a>--}}

                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection


@push('styles')


@endpush

@push('scripts')

@endpush