<form role="form" action="{{ route('buscador') }}" method="GET" id="form-data">

    <div class="content">
    <div class="container-fluid">

    <div class="card">
    <div class="card-body">
    <div class="form-row">

<!-- Nombres Field -->
<div class="form-group col-sm-4">
    {!! Form::label('nombres', 'Nombres:') !!}
    <input type="text" name="nombres" id="nombres" class="form-control" value="{{old('nombres')}}" >
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-4">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control',  'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Dpi Field -->
<div class="form-group col-sm-4">
    {!! Form::label('dpi', 'Dpi:') !!}
    {!! Form::text('dpi', null, ['class' => 'form-control',  'maxlength' => 13, 'maxlength' => 13, 'maxlength' => 13]) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-4">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control',  'maxlength' => 20, 'maxlength' => 20, 'maxlength' => 20]) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-4">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-4">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::text('correo', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>



    <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

    <div class="form-row">

    <div class="col-sm-6">
    <button type="submit" id="boton" class="btn btn-info">
    <i class="fa fa-sync"></i> Filtrar
    </button>
    <input type="hidden" name="buscar" id="buscar" value="0" >
    </div>
    <div class="col-sm-6">
    <a href="{{ route('buscador') }}" class="btn btn-default">
    <i class="fa fa-refresh"></i> Limipar
    </a>
    </div>

    </div>

</div>
</div>
</div>
</div>
    </form>




    @push('scripts')

    <script >



    $(function () {
    $('#form-filter').submit(function(e){

    $("#buscar").val(1);

    e.preventDefault();
    table = window.LaravelDataTables["dataTableBuilder"];

    table.draw();
    });
    })

    </script>
    @endpush
