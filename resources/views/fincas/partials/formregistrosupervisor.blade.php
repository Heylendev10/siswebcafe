<fieldset>
    <div class="row" style="margin-top: 10px;">
        {{ Form::hidden('idfinca',$finca->id) }}
        <div class="col-md-6">
            <div class="form-group">
                <label for="supervisor" class="form-control-label"><b>Supervisor <span style="color: red;"> *</span></b></label>
                <select class="form-control" required="required" name="supervisor">
                    <option selected="selected" value=""></option>
                    @foreach($allsuper as $super)
                        <option value="{{ $super->id }}">{{ $super->nombre }} {{ $super->apellido }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="fechainicio" class="form-control-label"><b>Fecha inicio<span style="color: red;"> *</span></b></label>
                {{ Form::date('fechainicio',null,['class' => 'form-control', 'placeholder'=>'', 'required'=>'required']) }}
            </div>
        </div>
    </div>
</fieldset>

<p class="help-block">Los campos con asterisco (<span style="color: red;"><vb>*</vb></span>) son obligatorios.</p>

