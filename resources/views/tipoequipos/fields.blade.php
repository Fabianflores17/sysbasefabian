<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Activo Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::text('activo', null, ['class' => 'form-control']) !!}
</div> --}}
<div class="form-group col-sm-6">
    <label for="activo">Activo:&nbsp;</label><br>
    <input type="hidden" name="activo" :value="activo ? 1 : 0">
    <toggle-button v-model="activo"
    :sync="true"
    :labels="{checked: 'SI', unchecked: 'NO'}"
    :height="30"
    :width="60"
    :value="false"></toggle-button>

    </div>
    tipoEquipo

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
    activo: @json($TipoEquipo->activo ?? false),

    },
computed: {
tipoId() {
    if (this.TipoEquipo) {
        return this.TipoEquipo.id;
            }
        return null;
        },
tipoName(){
    if (this.TipoEquipo){
      return this.TipoEquipo.nombre;
        }
        return null
        },
    }
            });
</script>
@endpush
