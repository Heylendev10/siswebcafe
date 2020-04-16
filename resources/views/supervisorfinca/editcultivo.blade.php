@extends('layouts.supervisor')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('titulo')
    <h1>
        Editar Cultivo
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
                    @if ($cultivo)
                    {{ Form::open(['url' => ['actualizarcultivo'], 'method' => 'POST', 'files' => true]) }}
                        {{ Form::hidden('idcultivo',$cultivo->id) }}
                        <fieldset>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fechaestablecimiento" class="form-control-label"><b>Fecha de establecimiento <span style="color: red;"> *</span></b></label>
                                        {{ Form::date('fechaestablecimiento',$cultivo->fechaestablecimiento,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="analisissuelo" class="form-control-label"><b>Analisis suelo<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('analisissuelo',$cultivo->analisissuelo,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proveedorsemilla" class="form-control-label"><b>Proveedor semilla<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('proveedorsemilla',$cultivo->proveedorsemilla,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sistemacultivo" class="form-control-label"><b>Sistema cultivo<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('sistemacultivo',$cultivo->sistemacultivo,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipotrazado" class="form-control-label"><b>Tipo trazado<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('tipotrazado',$cultivo->tipotrazado,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="edadtrazado" class="form-control-label"><b>Edad trazado<span style="color: red;"> *</span></b></label>
                                        {{ Form::date('edadtrazado',$cultivo->edadtrazado,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label for="imagen" class="form-control-label"><b>Seleccione imagen</b></label><br>
                                        <input type="file" name="imagen" accept="image/*" >
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12">
                                    <h4 style="padding-bottom: 20px;"><b>LABORES CULTURALES DEL CULTIVO</b></h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fechaarvanses" class="form-control-label"><b>Fecha control arvenses<span style="color: red;"> *</span></b></label>
                                        {{ Form::date('fechaarvanses',$cultivo->fechaarvanses,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombrecontrolarvanses" class="form-control-label"><b>Nombre control arvenses<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('nombrecontrolarvanses',$cultivo->nombrecontrolarvanses,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="controlutilizadoarvanses" class="form-control-label"><b>Control utilizado arvenses<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('controlutilizadoarvanses',$cultivo->controlutilizadoarvanses,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fechaplagas" class="form-control-label"><b>Fecha manejo plagas<span style="color: red;"> *</span></b></label>
                                        {{ Form::date('fechaplagas',$cultivo->fechaplagas,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombremanejoplagas" class="form-control-label"><b>Nombre manejo plagas<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('nombremanejoplagas',$cultivo->nombremanejoplagas,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="controlutilizadoplagas" class="form-control-label"><b>Control utilizado plagas<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('controlutilizadoplagas',$cultivo->controlutilizadoplagas,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fechamanejoenfermedades" class="form-control-label"><b>Fecha manejo enfermedades<span style="color: red;"> *</span></b></label>
                                        {{ Form::date('fechamanejoenfermedades',$cultivo->fechamanejoenfermedades,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombremanejoenfermedades" class="form-control-label"><b>Nombre manejo enfermedades<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('nombremanejoenfermedades',$cultivo->nombremanejoenfermedades,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="controlutilizadoenfermedades" class="form-control-label"><b>Control utilizado enfermedades<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('controlutilizadoenfermedades',$cultivo->controlutilizadoenfermedades,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
                                    </div>
                                </div>
                            </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-location-arrow"></i> Guardar</button>
                            </div>
                    {{ Form::close() }}
<p class="help-block">Los campos con asterisco (<span style="color: red;"><vb>*</vb></span>) son obligatorios.</p>
                    @endif
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
            $(".sidebar-menu a:contains('Usuarios')").parent().addClass('active');
        });
    </script>
@stop