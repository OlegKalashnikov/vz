@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-3">
                    <h3>СМО</h3>
                </div>
                <div class="col-2 offset-7">
                    <button class="btn btn-info btn-block" data-toggle="modal" data-target="#addSMO"><i class="fa fa-plus"></i> Добавить СМО</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="smo-table">
                <thead>
                <tr>
                    <th>Наименование СМО</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


    <!-- Modal add smo-->
    <div class="modal fade" id="addSMO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление СМО</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('smo.store')}}" method="POST">
                    <div class="modal-body">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="description">Наименование СМО</label>
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
            $('#smo-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('smo.data') !!}',
                columns: [
                    { data: 'description', name: 'description' },
                ]
            });
        });
    </script>
@endsection