<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::text('activo', null, ['class' => 'form-control']) !!}
</div>