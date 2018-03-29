@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}">
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Отчет</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="excerpt-table">
                <thead>
                <tr>
                    <th>Полис</th>
                    <th>ФИО пациента</th>
                    <th>Дата рождения</th>
                    <th>Дата оказания услуги</th>
                    <th>Код услуги</th>
                    <th>Наименование услуги</th>
                    <th>Направившее ЛПУ</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{$row->policy}}</td>
                            <td>{{$row->patient}}</td>
                            <td>{{$row->birthday}}</td>
                            <td>{{$row->data_direction}}</td>
                            <td>{{$row->code_service}}</td>
                            <td>{{$row->description}}</td>
                            <td>{{$row->full_lpu}}</td>
                            <td>{{$row->price}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script>
        $(function () {
            $('#excerpt-table').DataTable({
                processing: true,
                "language": {
                    "processing": "Подождите...",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "infoPostFix": "",
                    "loadingRecords": "Загрузка записей...",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                        "first": "Первая",
                        "previous": "Предыдущая",
                        "next": "Следующая",
                        "last": "Последняя"
                    },
                    "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                    },
                    "decimal": ",",
                    "thousands": "."
                },
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 row', '25', '50', 'все']
                ],
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'pdf',
                    'colvis',
                    'pageLength'
                ]
            });
        });
    </script>
@endsection