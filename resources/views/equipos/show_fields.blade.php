<!-- Tipo Id Field -->
<div class="col-sm-12">
    {!! Form::label('tipo_id', 'Tipo Id:') !!}
    <p>{{ $equipo->tipo_id }}</p>
</div>

<!-- Numero Serie Field -->
<div class="col-sm-12">
    {!! Form::label('numero_serie', 'Numero Serie:') !!}
    <p>{{ $equipo->numero_serie }}</p>
</div>

<!-- Imei Field -->
<div class="col-sm-12">
    {!! Form::label('imei', 'Imei:') !!}
    <p>{{ $equipo->imei }}</p>
</div>

<!-- Observaciones Field -->
<div class="col-sm-12">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    <p>{{ $equipo->observaciones }}</p>
</div>

