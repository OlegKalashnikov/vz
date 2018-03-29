@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}">
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-3">
                    <h3>Услуги</h3>
                </div>
                <div class="col-2 offset-5">
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadServices">Загрузить список</button>
                </div>
                <div class="col-2">
                    <button class="btn btn-info btn-block" data-toggle="modal" data-target="#addServices"><i class="fa fa-plus"></i> Добавить услугу</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Код услуги</th>
                    <th>Описание</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


    <!-- Modal upload service-->
    <div class="modal fade" id="uploadServices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Экспорт услуг</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('service.import')}}" method="POST" enctype="multipart/form-data">
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
    <div class="modal fade" id="addServices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление услуг</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('service.store')}}" method="POST">
                    <div class="modal-body">

                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="service">Код</label>
                                <input type="text" id="service" name="service" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" id="description" name="description" class="form-control">
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
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('services.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'service', name: 'service' },
                    { data: 'description', name: 'description' },
                ]
            });
        });
    </script>
@endsection