@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('titulo')
    <h1>
        Supervisores
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                @include('partials.message')
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#modalagregar"><i class="fa fa-plus"> Agregar</i></button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tablausuarios" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th><b>Nombre</b></th>
                            <th><b>Apellido</b></th>
                            <th><b>Documento</b></th>
                            <th><b>Fecha Inicio</b></th>
                            <th><b>Fecha Fin</b></th>
                            <th><b>Opciones</b></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($supervisores as $supervisor)
                                <tr>
                                    <td>{{ $supervisor->nombre }}</td>
                                    <td>{{ $supervisor->apellido }}</td>
                                    <td>{{ $supervisor->documento }}</td>
                                    <td>{{ $supervisor->fechainicio }}</td>
                                    <td>{{ $supervisor->fechafin }}</td>
                                    <td class="text-right">
                                        <div class="dropdown"><a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="#" onclick="fechafin('{{ $supervisor->id }}')">Fecha fin</a></li>
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
                    <h4 class="modal-title">Agregar supervisor a finca</h4>
                </div>
                {{ Form::open(['url' => ['registrarsuperfinca'], 'method' => 'POST']) }}
                <div class="modal-body">
                    @include('fincas.partials.formregistrosupervisor')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-location-arrow"></i> Enviar</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- modal fechafin -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalfechafin" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Fecha fin supervisor</h4>
                </div>
                {{ Form::open(['url' => ['registrarfechafinsuperfinca'], 'method' => 'POST']) }}
                <div class="modal-body">
                    {{ Form::hidden('idsuperfinca',$finca->id, ['id'=>'idsuperfinca']) }}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fechafin" class="form-control-label"><b>Fecha fin<span style="color: red;"> *</span></b></label>
                            {{ Form::date('fechafin',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'id'=>'fechafin']) }}
                        </div>
                    </div>
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
                "order": [[ 3, "desc" ]],
                "columnDefs": [
                    {
                        "targets": [5],
                        "orderable": false,
                        "searchable": false
                    }
                ]
            });
        }

        function fechafin(idsufinca, fechafin) {
            $('#idsuperfinca').val(idsufinca);
            $('#fechafin').val(fechafin);

            $('#modalfechafin').modal('show');
        }
    </script>
@stop