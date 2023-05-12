<!-- Usuario Id Field -->
<div class="col-sm-12">
    {!! Form::label('usuario_id', 'Usuario :') !!}
    <p>{{ $servicio->usuario->name }}</p>
</div>

<!-- Cliente Id Field -->
<div class="col-sm-12">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    <p>{{ $servicio->cliente->nombres.' '.$servicio->cliente->apellidos }}</p>
</div>

<!-- Equipo Id Field -->
<div class="col-sm-12">
    {!! Form::label('equipo_id', 'numero serie Equipo:') !!}
    <p>{{ $servicio->equipo->numero_serie }}</p>
</div>

<!-- Problema Field -->
<div class="col-sm-12">
    {!! Form::label('problema', 'Problema:') !!}
    <p>{{ $servicio->problema }}</p>
</div>

<!-- Solucion Field -->
<div class="col-sm-12">
    {!! Form::label('solucion', 'Solucion:') !!}
    <p>{{ $servicio->solucion }}</p>
</div>

<!-- Recomendaciones Field -->
<div class="col-sm-12">
    {!! Form::label('recomendaciones', 'Recomendaciones:') !!}
    <p>{{ $servicio->recomendaciones }}</p>
</div>

<!-- Fecha Recibido Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_recibido', 'Fecha Recibido:') !!}
    <p>{{ fechaLtn($servicio->fecha_recibido) }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
    <p>{{ fechaLtn($servicio->fecha_inicio )}}</p>
</div>

<!-- Fecha Fin Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
    <p>{{ fechaLtn($servicio->fecha_fin )}}</p>
</div>

<!-- Fecha Entrega Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
    <p>{{ fechaLtn($servicio->fecha_entrega) }}</p>
</div>

