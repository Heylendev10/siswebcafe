@extends('layouts.supervisor')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('titulo')
    <h1>
        Fincas
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                @include('partials.message')
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tablausuarios" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th><b>Nombre</b></th>
                            <th><b>Municipio</b></th>
                            <th><b>Direccion</b></th>
                            <th><b>Opciones</b></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($fincas as $finca)
                                <tr>
                                    <td>{{ $finca->nombre }}</td>
                                    <td>{{ $finca->municipio }}</td>
                                    <td>{{ $finca->direccion }}</td>
                                    <td class="text-right">
                                        <div class="dropdown"><a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="{{ url('origengeografico/'.$finca->id) }}">Origen geografico</a></li>
                                                <li><a href="{{ url('siembrafinca/'.$finca->id) }}">Siembra</a></li>
                                                <li><a href="{{ url('cultivofinca/'.$finca->id) }}">Cultivo</a></li>
                                                <li><a href="{{ url('cosechafinca/'.$finca->id) }}">Cosecha</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@section('script')
    {{ Html::script('assets/vendor_components/datatables.net/js/jquery.dataTables.min.js') }}
    {{ Html::script('assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
    {{ Html::script('assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js') }}
    <script>
        $(function () {
            $(".sidebar-menu a:contains('Fincas')").parent().addClass('active');
        });

        $(document).ready(function () {
            dataTables();
        });

        function dataTables() {
            $('#tablausuarios').DataTable({
                "language": {
                    "url": "{{ asset('js/Spanish.json') }}"
                },
                "order": [[ 1, "desc" ]],
                "columnDefs": [
                    {
                        "targets": [3],
                        "orderable": false,
                        "searchable": false
                    }
                ]
            });
        }
    </script>
@stop