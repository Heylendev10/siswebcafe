@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('titulo')
    <h1>
        Editar Finca
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
                    @if ($finca)
                    {{ Form::open(['url' => ['actualizarfinca'], 'method' => 'POST', 'files' => true]) }}
                        {{ Form::hidden('idfinca',$finca->id) }}
                        <fieldset>
                                <div class="row" style="margin-top: 10px;">
                                    
                                    <div class="col-md-6">
            <div class="form-group">
                <label for="nombre" class="form-control-label"><b>Nombre <span style="color: red;"> *</span></b></label>
                {{ Form::text('nombre',$finca->nombre,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="departamento" class="form-control-label"><b>Departamento<span style="color: red;"> *</span></b></label>
                {{ Form::text('departamento',$finca->departamento,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="municipio" class="form-control-label"><b>Municipio<span style="color: red;"> *</span></b></label>
                {{ Form::text('municipio',$finca->municipio,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="direccion" class="form-control-label"><b>Dirección<span style="color: red;"> *</span></b></label>
                {{ Form::text('direccion',$finca->direccion,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="area" class="form-control-label"><b>Area<span style="color: red;"> *</span></b></label>
                {{ Form::text('area',$finca->area,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="vereda" class="form-control-label"><b>Vereda<span style="color: red;"> *</span></b></label>
                {{ Form::text('vereda',$finca->vereda,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="codigosica" class="form-control-label"><b>Código SICA<span style="color: red;"> *</span></b></label>
                {{ Form::text('codigosica',$finca->codigosica,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label for="imagen" class="form-control-label"><b>Seleccione imagen</b></label><br>
                                            <input type="file" name="imagen" accept="image/*" required >
                                        </div>
                                    </div>
                                    
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-location-arrow"></i> Guardar</button>
                            </div>
                    {{ Form::close() }}
<p class="help-block">Los campos con asterisco (<span style="color: red;"><b>*</b></span>) son obligatorios.</p>
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
            $(".sidebar-menu a:contains('Fincas')").parent().addClass('active');
        });
    </script>
@stop