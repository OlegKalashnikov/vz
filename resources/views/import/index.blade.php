@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}">
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('import.index')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="smo" class="col-sm-3 col-form-label text-right">СМО</label>
                <div class="col-sm-9">
                    <select name="smo" id="smo" class="custom-select">
                        <option value="">Выберите значение</option>
                        @foreach($smo as $value)
                            <option value="{{$value->id}}">{{$value->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="registry" class="col-sm-3 col-form-label text-right">Реестр</label>
                <div class="col-sm-9">
                    <select name="registry" id="registry" class="custom-select">
                        <option value="">Выберите значение</option>
                        <option value="1">Первичные</option>
                        <option value="2">Вторичные</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="importdata" class="col-sm-3 col-form-label text-right">Выписка от страховой компании</label>
                <div class="col-sm-9">
                    <input type="file" name="importdata" id="importdata" class="form-control-file">
                </div>
            </div>
            <div class="form-group row">
                <label for="code_lpu_vz" class="col-sm-3 col-form-label text-right">ЛПУ - исполнитель</label>
                <div class="col-sm-9">
                    <select name="code_lpu_vz" id="code_lpu_vz" class="custom-select select2">
                        <option value="">Выберите значение</option>
                        @foreach($lpu as $value)
                            <option value="{{$value->id}}">{{$value->code}} - {{$value->short_lpu}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary btn-block offset-10"><i class="fa fa-upload"></i> Загрузить</button>
            </div>

        </form>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#code_lpu_vz').select2();
        })
    </script>
@endsection