<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $tipoEquipo->nombre }}</p>
</div>

<!-- Activo Field -->
<div class="col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}


    @if ($tipoEquipo->activo == 'si')
    <span class="badge badge-pill badge-success">{{ $tipoEquipo->activo }}</span>
    @else
    <span class="badge badge-pill badge-danger">{{ $tipoEquipo->activo }}</span>
    @endif

</div>

