<!-- Tipo Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('tipo_id', 'Tipo Id:') !!}
    {!! Form::Select(
        'tipo_id',
    select(\App\Models\TipoEquipo::class, 'nombre','id', null)
    , null,['id'=>'tipo_id','class' => ' form-control selectpicker', 'required']) !!}
</div> --}}
{{-- <div class="form-group col-sm-6" id="root" >
    <label for="tipoequipo">Tipo Equipo </label>
    <multiselect v-model="tipo" :options="tipos" label="nombre" ></multiselect>
    <input type="hidden" name="tipo_id" id='tipo_id' :value="tipoId">
    </div> --}}

    <div class="form-group col-sm-6" id="root">
        <label for="tipoequipo">Tipo </label>
        <multiselect v-model="tipoequipo" :options="tipoequipos" label="nombre" placeholder="Selecciones uno"  >
        </multiselect>
        <input type="hidden" name="tipo_id" id="tipo_id" :value="tipoId">
        <input type="hidden" name="tipo_name" id="tipo_name" :value="tipoName">
    </div>

<!-- Numero Serie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_serie', 'Numero Serie:') !!}
    {!! Form::text('numero_serie', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Imei Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imei', 'Imei:') !!}
    {!! Form::text('imei', null, ['class' => 'form-control']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control']) !!}
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
this.tipoId;
this.tipoName;
},

data: {
//tipo: @json(\App\Models\TipoEquipo::whereId(old('tipo_id'))->first() ?? null),
//tipos: @json(\App\Models\TipoEquipo::all() ?? [])

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
                    return  null
                },
}

});
</script>
@endpush
