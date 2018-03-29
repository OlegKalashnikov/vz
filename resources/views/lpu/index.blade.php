@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}">
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-3">
                    <h3>ЛПУ</h3>
                </div>
                <div class="col-2 offset-5">
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadLPU">Загрузить список</button>
                </div>
                <div class="col-2">
                    <button class="btn btn-info btn-block" data-toggle="modal" data-target="#addLPU"><i class="fa fa-plus"></i> Добавить ЛПУ</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="lpu-table">
                <thead>
                <tr>
                    <th>Код МО</th>
                    <th>Полное наименование ЛПУ</th>
                    <th>Краткое наименование ЛПУ</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


    <!-- Modal upload service-->
    <div class="modal fade" id="uploadLPU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Экспорт ЛПУ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('lpu.import')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="import">Выберите файл</label>
                            <input type="file" id="import" name="import" class="form-control-file">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Загрузить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal add service-->
    <div class="modal fade" id="addLPU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление ЛПУ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('lpu.store')}}" method="POST">
                    <div class="modal-body">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="code">Код МО</label>
                            <input type="text" id="code" name="code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="full_lpu">Полное наименование ЛПУ</label>
                            <input type="text" id="full_lpu" name="full_lpu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="short_lpu">Краткое наименование ЛПУ</label>
                            <input type="text" id="short_lpu" name="short_lpu" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Добавить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script>
        $(function () {
            $('#lpu-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('lpu.data') !!}',
                columns: [
                    { data: 'code', name: 'code' },
                    { data: 'full_lpu', name: 'full_lpu' },
                    { data: 'short_lpu', name: 'short_lpu' },
                ]
            });
        });
    </script>
@endsection