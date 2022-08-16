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

                        <div class="container_title">Документи</div>

                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col" style=" text-align: center">#</th>
                                        <th scope="col">Назва документу</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row" style="    width: 100px; text-align: center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </th>
                                        <td>Документ 1</td>
                                        <td style="    width: 100px; text-align: center">
                                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="    width: 100px; text-align: center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </th>
                                        <td>Документ 1</td>
                                        <td style="    width: 100px; text-align: center">
                                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="    width: 100px; text-align: center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </th>
                                        <td>Документ 1</td>
                                        <td style="    width: 100px; text-align: center">
                                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="buttons">
                            <div class="btn-my">Друк всіх документів</div>
                            <div class="btn-my">Друк вибраних документів</div>
                        </div>
                    </div>
                </div>
            </div>
@endsection


@push('styles')


@endpush

@push('scripts')

@endpush