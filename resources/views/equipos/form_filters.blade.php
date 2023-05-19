

<form id="formFiltersDatatables">
    <div class="content">

        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <div class="form-row">

                        <div class="row">
                           <!-- Tipo Equipo Id Field -->
                            <div class="form-group col-sm-6" id="root">
                                <label for="tipoequipo">Tipo </label>
                                <multiselect v-model="tipoequipo" :options="tipoequipos" label="nombre" placeholder="Selecciones uno" >
                                </multiselect>
                                <input type="hidden" name="tipo_id" id="tipo_id" :value="tipoId">
                                <input type="hidden" name="tipo_name" id="tipo_name" :value="tipoName">
                            </div>

                            <!-- Numero Serie Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('numero_serie', 'Numero Serie:') !!}
                                {!! Form::text('numero_serie', null, ['class' => 'form-control','maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
                            </div>

                            <!-- Imei Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('imei', 'Imei:') !!}
                                {!! Form::text('imei', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
                            </div>

                            <!-- Observaciones Field -->
                            <div class="form-group col-sm-12 col-lg-12">
                                {!! Form::label('observaciones', 'Observaciones:') !!}
                                {!! Form::textarea('observaciones', null, ['class' => 'form-control', 'rows' => 2,'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
                            </div>


                            <div class="form-group col-sm-4">
                                {!! Form::label('boton','&nbsp;') !!}
                                <div>
                                    <button type="submit" id="boton" class="btn btn-info ">
                                        <i class="fa fa-search"></i> Filtrar
                                    </button>

                                    &nbsp;
                                    <a href="{{ route('equipos.index') }}" class="btn  btn-default">
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

$("input[name='q']").hide();

});

const app = new Vue({
name:'app',
el: '#root',
created() {

this.tipoId;
this.tipoName;

},


data: {

tipoequipos: @json(\App\Models\TipoEquipo::all() ?? []),
tipoequipo: @json(\App\Models\TipoEquipo::whereId(old('tipo_id'))->first() ?? $equipo->tipo ?? null),


},

computed: {

tipoId() {
if (this.tipoequipo) {
return this.tipoequipo.id;
    }
return null;

  },

tipoName(){

if (this.tipoequipo){
return this.tipoequipo.nombre;

  }
  return null

},

}




});
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
