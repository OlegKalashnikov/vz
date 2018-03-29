@extends('layouts.app')

@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}">
@endsection

@section('content')
    <div class="content">
        <form action="{{route('reports.excerpt.read')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="">Отчетный период</label>
                <input type="text" class="form-control" name="date_start" value="{{$date_start}}">
                <input type="text" class="form-control" name="date_end" >
            </div>
            <div class="form-group">
                <label for="code_lpu_vz">ЛПУ - исполнитель</label>
                <select name="code_lpu_vz" id="code_lpu_vz" class="custom-select">
                    <option value="">Выберите значение</option>
                    @foreach($code_lpu_vz as $row)
                        <option value="{{$row->id}}">{{$row->code}} - {{$row->full_lpu}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="smo_id">СМО</label>
                <select name="smo_id" id="smo_id" class="custom-select">
                    <option value="">Выберите значение</option>
                    @foreach($smo as $row)
                        <option value="{{$row->id}}">{{$row->description}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Тип реестра:</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="registry_1" name="registry_id" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="registry_1">Первичный</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="registry_2" name="registry_id"  value="2" class="custom-control-input">
                    <label class="custom-control-label" for="registry_2">Повторный</label>
                </div>
            </div>
            <button type="submit">Сформировать</button>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $('input[name="date_start"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                });
            $('input[name="date_end"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#code_lpu_vz').select2();
        })
    </script>
@endsection