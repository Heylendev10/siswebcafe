@extends('layouts.admin')

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
                        <a class="btn btn-success btn-sm" href="{{ url('exportcosechafinca/'.$finca->id) }}"><i class="fa fa-download"> Descargar Cosechas</i></a>
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
                                                <li><a href="{{ url('exportcosecha/'.$cosecha->id) }}">Exportar</a></li>
                                                <li><a href="#" class="estadistica" data-cosecha="{{ $cosecha->id }}">Estadistica</a></li>
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

    <!-- modal estadistica -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalestadistica" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"></h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 style="text-align: center;margin-bottom: 20px;"><b>% Fruto Maduro</b></h5>
                            <div id="infoestadistica" style="width: 250px; height: 250px;"></div>
                        </div>
                        <div class="col-md-6">
                            <h5 style="text-align: center;margin-bottom: 20px;"><b>% Fruta Dañado Broca</b></h5>
                            <div id="infoestadistica2" style="width: 250px; height: 250px;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    {{ Html::script('assets/vendor_components/datatables.net/js/jquery.dataTables.min.js') }}
    {{ Html::script('assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
    {{ Html::script('assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js') }}
    <!-- FLOT CHARTS -->
    <script src="{{ asset('bower_components/Flot/jquery.flot.js') }}"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="{{ asset('bower_components/Flot/jquery.flot.resize.js') }}"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="{{ asset('bower_components/Flot/jquery.flot.pie.js') }}"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="{{ asset('bower_components/Flot/jquery.flot.categories.js') }}"></script>

    <script>
        var rutaestadistica = '{{ route('estadisticacosecha') }}';
        var token = '{{ csrf_token() }}';

        $(function () {
            $(".sidebar-menu a:contains('Fincas')").parent().addClass('active');
        });

        $(document).ready(function () {
            dataTables();
            
            $('.estadistica').on('click',function (e) {
                e.preventDefault();

                var idcosecha = $(this).attr('data-cosecha');


                var parametros = {
                    '_token': token,
                    'id': idcosecha,
                };
                var ruta = rutaestadistica;
                $.ajax({
                    url: ruta,
                    type: 'post',
                    dataType: 'json',
                    data: parametros,
                    success: function (data) {

                        var complementfm = 100 - data.fmaduro;
                        var complementfd = 100 - data.fdbroca;
                        var donutData = [
                            { label: '% Fruto Maduro', data: data.fmaduro, color: '#3c8dbc' },
                            { label: '', data: complementfm, color: '#0073b7' },
                        ];
                        var donutData2 = [
                            { label: '% Fruta Dañado Broca', data: data.fdbroca, color: '#3c8dbc' },
                            { label: '', data: complementfd, color: '#0073b7' },
                        ];
                        $.plot('#infoestadistica', donutData, {
                            series: {
                                pie: {
                                    show       : true,
                                    radius     : 1,
                                    innerRadius: 0.5,
                                    label      : {
                                        show     : true,
                                        radius   : 2 / 3,
                                        formatter: labelFormatter,
                                        threshold: 0.1
                                    }
                                }
                            },
                            legend: {
                                show: false
                            }
                        });

                        $.plot('#infoestadistica2', donutData2, {
                            series: {
                                pie: {
                                    show       : true,
                                    radius     : 1,
                                    innerRadius: 0.5,
                                    label      : {
                                        show     : true,
                                        radius   : 2 / 3,
                                        formatter: labelFormatter,
                                        threshold: 0.1
                                    }
                                }
                            },
                            legend: {
                                show: false
                            }
                        });

                        $('#modalestadistica').modal('show');
                    }
                });


            });
        });

        function dataTables() {
            $('#tablausuarios').DataTable({
                "language": {
                    "url": "{{ asset('js/Spanish.json') }}"
                },
                "order": [[ 0, "desc" ]],
            });
        }

        function labelFormatter(label, series) {
            return '<div style="font-size:13px; text-align:center; padding:2px; color: #000000; font-weight: 600;">'
                + label
                + '<br>'
                + Math.round(series.percent) + '%</div>'
        }

    </script>
@stop