<fieldset>
    <div class="row" style="margin-top: 10px;">
        {{ Form::hidden('idfinca',$finca->id) }}
        <div class="col-md-4">
            <div class="form-group">
                <label for="germinador" class="form-control-label"><b>Germinador <span style="color: red;"> *</span></b></label>
                {{ Form::date('germinador',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="variedadcafe" class="form-control-label"><b>Variedad cafe<span style="color: red;"> *</span></b></label>
                {{ Form::text('variedadcafe',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="analisissuelo" class="form-control-label"><b>Analisis suelo<span style="color: red;"> *</span></b></label>
                {{ Form::text('analisissuelo',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="proveedorsemilla" class="form-control-label"><b>Proveedor semilla<span style="color: red;"> *</span></b></label>
                {{ Form::text('proveedorsemilla',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="sistemariego" class="form-control-label"><b>Sistema riego<span style="color: red;"> *</span></b></label>
                {{ Form::text('sistemariego',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="preparacionterreno" class="form-control-label"><b>Preparacion terreno<span style="color: red;"> *</span></b></label>
                {{ Form::text('preparacionterreno',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
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
            <h4 style="padding-bottom: 20px;"><b>ALMÁCIGO</b></h4>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="fechaalmacigo" class="form-control-label"><b>Fecha almacigo<span style="color: red;"> *</span></b></label>
                {{ Form::date('fechaalmacigo',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nutricion" class="form-control-label"><b>Nutrición<span style="color: red;"> *</span></b></label>
                {{ Form::text('nutricion',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fechaplagas" class="form-control-label"><b>Fecha manejo plagas<span style="color: red;"> *</span></b></label>
                {{ Form::date('fechaplagas',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombremanejoplagas" class="form-control-label"><b>Nombre manejo plagas<span style="color: red;"> *</span></b></label>
                {{ Form::text('nombremanejoplagas',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="controlutilizadoplagas" class="form-control-label"><b>Control utilizado plagas<span style="color: red;"> *</span></b></label>
                {{ Form::text('controlutilizadoplagas',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fechamanejoenfermedades" class="form-control-label"><b>Fecha manejo enfermedades<span style="color: red;"> *</span></b></label>
                {{ Form::date('fechamanejoenfermedades',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombremanejoenfermedades" class="form-control-label"><b>Nombre manejo enfermedades<span style="color: red;"> *</span></b></label>
                {{ Form::text('nombremanejoenfermedades',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="controlutilizadoenfermedades" class="form-control-label"><b>Control utilizado enfermedades<span style="color: red;"> *</span></b></label>
                {{ Form::text('controlutilizadoenfermedades',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
    </div>
</fieldset>

<p class="help-block">Los campos con asterisco (<span style="color: red;"><vb>*</vb></span>) son obligatorios.</p>

