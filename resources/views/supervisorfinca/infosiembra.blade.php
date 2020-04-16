@extends('layouts.supervisor')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('titulo')
    <h1>
        Información siembra
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
                    @if ($siembra)
                        <fieldset>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="germinador" class="form-control-label"><b>Germinador <span style="color: red;"> *</span></b></label>
                                        {{ Form::text('germinador',$siembra->germinador,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="variedadcafe" class="form-control-label"><b>Variedad cafe<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('variedadcafe',$siembra->variedadcafe,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="analisissuelo" class="form-control-label"><b>Analisis suelo<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('analisissuelo',$siembra->analisissuelo,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="proveedorsemilla" class="form-control-label"><b>Proveedor semilla<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('proveedorsemilla',$siembra->proveedorsemilla,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sistemariego" class="form-control-label"><b>Sistema riego<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('sistemariego',$siembra->sistemariego,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="preparacionterreno" class="form-control-label"><b>Preparacion terreno<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('preparacionterreno',$siembra->preparacionterreno,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="codigosica" class="form-control-label"><b>Imagen</b></label>
                                        @if($siembra->imagen)
                                            <img src="{{ asset($siembra->imagen) }}" class="img-responsive" alt="" style="width: 250px;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12">
                                    <h4 style="padding-bottom: 20px;"><b>ALMÁCIGO</b></h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fechaalmacigo" class="form-control-label"><b>Fecha almacigo <span style="color: red;"> *</span></b></label>
                                        {{ Form::text('fechaalmacigo',$siembra->fechaalmacigo,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nutricion" class="form-control-label"><b>Nutrición<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('nutricion',$siembra->nutricion,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fechaplagas" class="form-control-label"><b>Fecha manejo plagas<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('fechaplagas',$siembra->fechaplagas,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombremanejoplagas" class="form-control-label"><b>Nombre manejo plagas<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('nombremanejoplagas',$siembra->nombremanejoplagas,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="controlutilizadoplagas" class="form-control-label"><b>Control utilizado plagas<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('controlutilizadoplagas',$siembra->controlutilizadoplagas,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fechamanejoenfermedades" class="form-control-label"><b>Fecha manejo enfermedades<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('fechamanejoenfermedades',$siembra->fechamanejoenfermedades,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombremanejoenfermedades" class="form-control-label"><b>Nombre manejo enfermedades<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('nombremanejoenfermedades',$siembra->nombremanejoenfermedades,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="controlutilizadoenfermedades" class="form-control-label"><b>Control utilizado enfermedades<span style="color: red;"> *</span></b></label>
                                        {{ Form::text('controlutilizadoenfermedades',$siembra->controlutilizadoenfermedades,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'disabled']) }}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
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