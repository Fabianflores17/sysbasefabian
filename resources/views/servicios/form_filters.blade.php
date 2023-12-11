

<form id="formFiltersDatatables">
    <div class="content"  id="root">

        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <div class="form-row">

                        <div class="row">
             <!-- Usuario Id Field -->
            <div class="form-group col-sm-4" >
                 <label for="tipousuario">Usuario </label>
                  <multiselect v-model="tipousuario" :options="tipousuarios" track-by="id"  label="name" :multiple="true" placeholder="Selecciones uno" >
                 </multiselect>
                <input type="hidden" name="usuario_id[]" id="usuario_id" :value="item.id" v-for="item in tipousuario">
             </div>


             <!-- Cliente Id Field -->
             <div class="form-group col-sm-3" >
                <label for="tipocliente">Cliente </label>
                <multiselect v-model="tipocliente" :options="tipoclientes"  track-by="id" label="nombres" :multiple="true" placeholder="Selecciones uno" >
                </multiselect>
                <input type="hidden" name="cliente_id[]" id="cliente_id" :value="item.id" v-for="item in tipocliente">
                {{-- <input  type="hidden" name="cliente_id" id="cliente_id" :value="clienteID"> --}}
            </div>

                <!-- Equipo Id Field -->


                <div class="form-group col-sm-4" >
                    <label for="equipo">numero Serie </label>
                    <multiselect v-model="equipo" :options="equipos"  track-by="id" label="numero_serie" :multiple="true" placeholder="Selecciones uno" >
                    </multiselect>
                    <input type="hidden" name="equipo_id[]" id="equipo_id" :value="item.id" v-for="item in equipo">
                    {{-- <input type="hidden" name="equipo_id" id="equipo_id" :value="equipoID"> --}}

                </div>

                {{-- <!-- Problema Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('problema', 'Problema:') !!}
                    {!! Form::textarea('problema', null, ['class' => 'form-control','rows' => 2, 'required']) !!}
                </div>

                <!-- Solucion Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('solucion', 'Solucion:') !!}
                    {!! Form::textarea('solucion', null, ['class' => 'form-control','rows' => 2]) !!}
                </div>

                <!-- Recomendaciones Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('recomendaciones', 'Recomendaciones:') !!}
                    {!! Form::textarea('recomendaciones', null, ['class' => 'form-control','rows' => 2]) !!}
                </div> --}}

                <!-- Fecha Recibido Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_recibido', 'Fecha Recibido:') !!}
                    {!! Form::Date('fecha_recibido', null, ['class' => 'form-control','id'=>'fecha_recibido']) !!}
                </div>



                <!-- Fecha Inicio Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
                    {!! Form::Date('fecha_inicio', null, ['class' => 'form-control','id'=>'fecha_inicio']) !!}
                </div>


                <!-- Fecha Fin Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
                    {!! Form::Date('fecha_fin', null ,['class' => 'form-control','id'=>'fecha_fin']) !!}
                </div>




                <!-- Fecha Entrega Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
                    {!! Form::Date('fecha_entrega', null, ['class' => 'form-control','id'=>'fecha_entrega']) !!}
                </div>
                            <div class="form-group col-sm-4">
                                {!! Form::label('boton','&nbsp;') !!}
                                <div>
                                    <button type="submit" id="boton" class="btn btn-info ">
                                        <i class="fa fa-search"></i> Filtrar
                                    </button>

                                    &nbsp;
                                    <a href="{{ route('servicios.index') }}" class="btn  btn-default">
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
        this.usuarioId;
        this.clienteId;
        this.equipoID;

        },

        data: {
        tipousuarios: @json(\App\Models\User::whereHas('Serviciosuser')->get() ?? null),
        tipousuario: null,


        tipoclientes: @json(\App\Models\Cliente::whereHas('servicio')->get() ?? null),
        tipocliente: null,

        equipos: @json(\App\Models\Equipo::whereHas('soporteServicios')->get() ?? null),
        equipo: null,
        },

        computed: {
        usuarioId() {
        if (this.tipousuario) {
        return this.tipousuario.id;
            }
        return null;
          },
          clienteID() {
        if (this.tipocliente) {
        return this.tipocliente.id;
            }
        return null;
          },
          equipoID() {
        if (this.equipo) {
        return this.equipo.id;
            }
        return null;
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
