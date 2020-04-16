@extends('layouts.supervisor')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('titulo')
    <h1>
        Editar Perfil
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
                    {{ Form::open(['url' => ['guardarperfil'], 'method' => 'POST', 'files' => true]) }}
                    <div class="row">

                    <div class='col-md-4'>
                        <div class="form-group">
                            <label for="password_actual" class="form-control-label"><b>Password Actual</b></label>
                            {{ Form::password('password_actual', array('class' => 'form-control', 'placeholder' => '', 'minlength' => '6')) }}
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label for="password" class="form-control-label"><b>Nueva Password</b></label>
                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '', 'minlength' => '6')) }}
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class="form-group">
                            <label for="password" class="form-control-label"><b>Repetir Password</b></label>
                            {{ Form::password('repetirpassword', array('class' => 'form-control', 'placeholder' => '', 'minlength' => '6')) }}
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class="form-group">
                            <label for="imagen" class="form-control-label"><b>Foto Perfil</b></label><br>
                            <input type="file" name="imagen" accept="image/*" >
                        </div>
                    </div>
<div class="modal-footer">
                    
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-location-arrow"></i> Guardar</button>
                </div>
                {{ Form::close() }}
                    </div>
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
        
    </script>
@stop