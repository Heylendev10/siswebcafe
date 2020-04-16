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
                <label for="departamento" class="form-control-label"><b>Departamento<span style="color: red;"> *</span></b></label>
                {{ Form::text('departamento',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="municipio" class="form-control-label"><b>Municipio<span style="color: red;"> *</span></b></label>
                {{ Form::text('municipio',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="direccion" class="form-control-label"><b>Dirección<span style="color: red;"> *</span></b></label>
                {{ Form::text('direccion',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="area" class="form-control-label"><b>Area<span style="color: red;"> *</span></b></label>
                {{ Form::text('area',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="vereda" class="form-control-label"><b>Vereda<span style="color: red;"> *</span></b></label>
                {{ Form::text('vereda',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="codigosica" class="form-control-label"><b>Código SICA<span style="color: red;"> *</span></b></label>
                {{ Form::text('codigosica',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
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

<p class="help-block">Los campos con asterisco (<span style="color: red;"><vb>*</vb></span>) son obligatorios.</p>

