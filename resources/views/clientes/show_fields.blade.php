<!-- Nombres Field -->
<div class="col-sm-12">
    {!! Form::label('nombres', 'Nombres:') !!}
    <p>{{ $cliente->nombres }}</p>
</div>

<!-- Apellidos Field -->
<div class="col-sm-12">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    <p>{{ $cliente->apellidos }}</p>
</div>

<!-- Dpi Field -->
<div class="col-sm-12">
    {!! Form::label('dpi', 'Dpi:') !!}
    <p>{{ $cliente->dpi }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{{ $cliente->telefono }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $cliente->direccion }}</p>
</div>

<!-- Correo Field -->
<div class="col-sm-12">
    {!! Form::label('correo', 'Correo:') !!}
    <p>{{ $cliente->correo }}</p>
</div>

