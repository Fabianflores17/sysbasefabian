@can('Ver Tipo Equipos')
    <a href="{{ route('tipoEquipos.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-sm btn-outline-secondary'>
        <i class="fa fa-eye"></i>
    </a>
    @endcan

@can('Editar Tipo Equipos')
    <a href="{{ route('tipoEquipos.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-sm btn-outline-info'>
        <i class="fa fa-edit"></i>
    </a>
@endcan

@can('Eliminar Tipo Equipos')
    <a href="#" onclick="deleteItemDt(this)" data-id="{{ $id }}" data-toggle="tooltip" title="Eliminar" class='btn btn-sm btn-outline-danger'>
        <i class="fa fa-trash-alt"></i>
    </a>


    <form action="{{ route('tipoEquipos.destroy', $id) }}" method="POST" id="delete-form{{ $id }}">
        @method('DELETE')
        @csrf
    </form>
@endcan

