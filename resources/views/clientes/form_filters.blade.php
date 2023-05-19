

<form id="formFiltersDatatables">
    <div class="content">

        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <div class="form-row">

                        <div class="row">
                            <div class="form-group col-sm-4">
                                {!! Form::label('dpi', 'dpi:') !!}
                                {!! Form::text('dpi', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-sm-4">
                                {!! Form::label('nombres', 'Nombres:') !!}
                                {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-sm-4">
                                {!! Form::label('apellidos', 'Apellidos:') !!}
                                {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-sm-4">
                                {!! Form::label('telefono', 'Telefono:') !!}
                                {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-sm-4">
                                {!! Form::label('direccion', 'Direccion:') !!}
                                {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-sm-4">
                                {!! Form::label('correo', 'Correo:') !!}
                                {!! Form::text('correo', null, ['class' => 'form-control']) !!}
                            </div>


                            <div class="form-group col-sm-4">
                                {!! Form::label('boton','&nbsp;') !!}
                                <div>
                                    <button type="submit" id="boton" class="btn btn-info ">
                                        <i class="fa fa-search"></i> Filtrar
                                    </button>

                                    &nbsp;
                                    <a href="{{ route('clientes.index') }}" class="btn  btn-default">
                                        <i class="fa fa-refresh"></i> Limpiar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')

    <script>
        $(function () {


            $('#formFiltersDatatables').submit(function(e){

                e.preventDefault();
                logI('envio filtros ajax');

                table = window.LaravelDataTables["dataTableBuilder"];

                table.draw();
            });
        })

    </script>
@endpush
