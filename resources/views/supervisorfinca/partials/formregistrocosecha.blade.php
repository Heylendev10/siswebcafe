<fieldset>
    <div class="row" style="margin-top: 10px;">
        {{ Form::hidden('idfinca',$finca->id) }}
        <div class="col-md-6">
            <div class="form-group">
                <label for="fecha" class="form-control-label"><b>Fecha <span style="color: red;"> *</span></b></label>
                {{ Form::date('fecha',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="aspecto" class="form-control-label"><b>Aspecto<span style="color: red;"> *</span></b></label>
                {{ Form::text('aspecto',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="color" class="form-control-label"><b>Color<span style="color: red;"> *</span></b></label>
                {{ Form::text('color',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="porcefrutomaduro" class="form-control-label"><b>% fruto maduro<span style="color: red;"> *</span></b></label>
                {{ Form::text('porcefrutomaduro',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="porcefrutodañadobroca" class="form-control-label"><b>% fruto dañado<span style="color: red;"> *</span></b></label>
                {{ Form::text('porcefrutodañadobroca',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tiposrecoleccion" class="form-control-label"><b>Tipo recolección<span style="color: red;"> *</span></b></label>
                {{ Form::text('tiposrecoleccion',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="condicionesclimaticas" class="form-control-label"><b>Condiciones climaticas<span style="color: red;"> *</span></b></label>
                {{ Form::text('condicionesclimaticas',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nombreresponsable" class="form-control-label"><b>Responsable<span style="color: red;"> *</span></b></label>
                {{ Form::text('nombreresponsable',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
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

<p class="help-block">Los campos con asterisco (<span style="color: red;"><vb>*</vb></span>) son obligatorios.</p>

