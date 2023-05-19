@if($tipoEquipo->activo == 'si')
    <span class="badge badge-pill badge-success">{{$tipoEquipo->activo}}</span>


@endforelse
@if($tipoEquipo->activo == 'no')
    <span class="badge badge-pill badge-danger">{{$tipoEquipo->activo}}</span>


@endforelse
