<!-- Usuario Id Field -->
  <div class="form-group col-sm-6" >
    <label for="tipousuario">Usuario </label>
        <multiselect v-model="tipousuario" :options="tipousuarios" label="name" placeholder="Selecciones uno" >
        </multiselect>
        <input  type="hidden"  name="usuario_id" id="usuario_id" :value="usuarioId">
           </div>


<!-- Cliente Id Field -->

<div class="form-group col-sm-6" >
    <label for="tipocliente">Cliente </label>
    <multiselect v-model="tipocliente" :options="tipoclientes" label="nombres" placeholder="Selecciones uno" >
    </multiselect>
    <input  type="hidden" name="cliente_id" id="cliente_id" :value="clienteID">

  </div>

<!-- Equipo Id Field -->


<div class="form-group col-sm-6" >
    <label for="equipo">numero Serie </label>
    <multiselect v-model="equipo" :options="equipos" label="numero_serie" placeholder="Selecciones uno" >
    </multiselect>
    <input type="hidden" name="equipo_id" id="equipo_id" :value="equipoID">

  </div>

<!-- Problema Field -->
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
</div>

<!-- Fecha Recibido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_recibido', 'Fecha Recibido:') !!}
    {!! Form::Date('fecha_recibido', $servicio->fecha_recibido ?? null, ['class' => 'form-control','id'=>'fecha_recibido']) !!}
</div>



<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
    {!! Form::Date('fecha_inicio', $servicio->fecha_inicio ?? null, ['class' => 'form-control','id'=>'fecha_inicio']) !!}
</div>


<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_fin', 'Fecha Fin:') !!}
    {!! Form::Date('fecha_fin',$servicio->fecha_fin ?? null ,['class' => 'form-control','id'=>'fecha_fin']) !!}
</div>




<!-- Fecha Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
    {!! Form::Date('fecha_entrega',$servicio->fecha_entrega ?? null, ['class' => 'form-control','id'=>'fecha_entrega']) !!}
</div>

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
        tipousuarios: @json(\App\Models\User::all() ?? []),
        tipousuario: @json(\App\Models\User::whereId(old('usuario_id'))->first() ?? $servicio->usuario ?? null),

        tipoclientes: @json(\App\Models\Cliente::all() ?? []),
        tipocliente: @json(\App\Models\Cliente::whereId(old('cliente_id'))->first() ?? $servicio->cliente ?? null),

        equipos: @json(\App\Models\Equipo::all() ?? []),
        equipo: @json(\App\Models\Equipo::whereId(old('equipo_id'))->first() ?? $servicio->equipo ?? null),
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
</script>
@endpush
