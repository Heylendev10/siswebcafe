@extends('layouts.supervisor')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('titulo')
    <h1>
        Editar Cosecha
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
                    @if ($cosecha)
                    {{ Form::open(['url' => ['actualizarcosecha'], 'method' => 'POST', 'files' => true]) }}
                        {{ Form::hidden('idcosecha',$cosecha->id) }}
                        <fieldset>
                            <div class="row" style="margin-top: 10px;">
    
        <div class="col-md-6">
            <div class="form-group">
                <label for="fecha" class="form-control-label"><b>Fecha <span style="color: red;"> *</span></b></label>
                {{ Form::date('fecha',$cosecha->fecha,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="aspecto" class="form-control-label"><b>Aspecto<span style="color: red;"> *</span></b></label>
                {{ Form::text('aspecto',$cosecha->aspecto,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="color" class="form-control-label"><b>Color<span style="color: red;"> *</span></b></label>
                {{ Form::text('color',$cosecha->color,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="porcefrutomaduro" class="form-control-label"><b>% fruto maduro<span style="color: red;"> *</span></b></label>
                {{ Form::text('porcefrutomaduro',$cosecha->porcefrutomaduro,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="porcefrutodañadobroca" class="form-control-label"><b>% fruto dañado<span style="color: red;"> *</span></b></label>
                {{ Form::text('porcefrutodañadobroca',$cosecha->porcefrutodañadobroca,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tiposrecoleccion" class="form-control-label"><b>Tipo recolección<span style="color: red;"> *</span></b></label>
                {{ Form::text('tiposrecoleccion',$cosecha->tiposrecoleccion,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="condicionesclimaticas" class="form-control-label"><b>Condiciones climaticas<span style="color: red;"> *</span></b></label>
                {{ Form::text('condicionesclimaticas',$cosecha->condicionesclimaticas,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreresponsable" class="form-control-label"><b>Responsable<span style="color: red;"> *</span></b></label>
                {{ Form::text('nombreresponsable',$cosecha->nombreresponsable,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="imagen" class="form-control-label"><b>Seleccione imagen</b></label><br>
                <input type="file" name="imagen" accept="image/*" >
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