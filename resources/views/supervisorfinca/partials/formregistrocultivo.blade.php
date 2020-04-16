<fieldset>
    <div class="row" style="margin-top: 10px;">
        {{ Form::hidden('idfinca',$finca->id) }}
        <div class="col-md-4">
            <div class="form-group">
                <label for="fechaestablecimiento" class="form-control-label"><b>Fecha de establecimiento <span style="color: red;"> *</span></b></label>
                {{ Form::date('fechaestablecimiento',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
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
                <label for="sistemacultivo" class="form-control-label"><b>Sistema cultivo<span style="color: red;"> *</span></b></label>
                {{ Form::text('sistemacultivo',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="tipotrazado" class="form-control-label"><b>Tipo trazado<span style="color: red;"> *</span></b></label>
                {{ Form::text('tipotrazado',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="edadtrazado" class="form-control-label"><b>Edad trazado<span style="color: red;"> *</span></b></label>
                {{ Form::date('edadtrazado',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
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
                {{ Form::date('fechaarvanses',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="nombrecontrolarvanses" class="form-control-label"><b>Nombre control arvenses<span style="color: red;"> *</span></b></label>
                {{ Form::text('nombrecontrolarvanses',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="controlutilizadoarvanses" class="form-control-label"><b>Control utilizado arvenses<span style="color: red;"> *</span></b></label>
                {{ Form::text('controlutilizadoarvanses',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
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

<p class="help-block">Los campos con asterisco (<span style="color: red;"><b>*</b></span>) son obligatorios.</p>

