@extends('layouts.supervisor')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('titulo')
    <h1>
        Cosechas finca - {{ $finca->nombre }}
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                @include('partials.message')
                <div class="box-header with-border">
                    <div class="pull-right">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalagregar"><i class="fa fa-plus"> Agregar</i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tablausuarios" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th><b>Fecha</b></th>
                            <th><b>Aspecto</b></th>
                            <th><b>Color</b></th>
                            <th><b>Tipo recolección</b></th>
                            <th><b>Opciones</b></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($cosechas as $cosecha)
                                <tr>
                                    <td>{{ $cosecha->fecha }}</td>
                                    <td>{{ $cosecha->aspecto }}</td>
                                    <td>{{ $cosecha->color }}</td>
                                    <td>{{ $cosecha->tiposrecoleccion }}</td>
                                    <td class="text-right">
                                        <div class="dropdown"><a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="{{ url('infocosecha/'.$cosecha->id) }}">Ver</a></li>
                                                <li><a href="{{ url('editcosecha/'.$cosecha->id) }}">Editar</a></li>
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

    <!-- modal agregar -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalagregar" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Agregar Cosecha</h4>
                </div>
                {{ Form::open(['url' => ['registrarcosecha'], 'method' => 'POST', 'files' => true]) }}
                <div class="modal-body">
                    @include('supervisorfinca.partials.formregistrocosecha')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-location-arrow"></i> Enviar</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
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
                "order": [[ 0, "desc" ]],
            });
        }

    </script>
@stop