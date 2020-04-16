<fieldset>
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombre" class="form-control-label"><b>Nombre <span style="color: red;"> *</span></b></label>
                {{ Form::text('nombre',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="apellido" class="form-control-label"><b>Apellidos <span style="color: red;"> *</span></b></label>
                {{ Form::text('apellido',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="documento" class="form-control-label"><b>Documento <span style="color: red;"> *</span></b></label>
                {{ Form::text('documento',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="fechanacimiento" class="form-control-label"><b>Fecha nacimiento <span style="color: red;"> *</span></b></label>
                {{ Form::date('fechanacimiento',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="rol" class="form-control-label"><b>Rol <span style="color: red;"> *</span></b></label>
                {{ Form::select('rol',config('opciones.roles'),'',['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="genero" class="form-control-label"><b>Genero <span style="color: red;"> *</span></b></label>
                {{ Form::select('genero',config('opciones.genero'),'',['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="email" class="form-control-label"><b>Email <span style="color: red;"> *</span></b></label>
                {{ Form::email('email',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
                <label for="password" class="form-control-label"><b>Password <span style="color: red;"> *</span></b></label>
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '', 'required'=>'required', 'minlength' => '6')) }}
            </div>
        </div>
    </div>
</fieldset>

<p class="help-block">Los campos con asterisco (<span style="color: red;"><vb>*</vb></span>) son obligatorios.</p>

