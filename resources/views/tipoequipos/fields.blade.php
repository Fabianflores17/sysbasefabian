<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Activo Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::text('activo', null, ['class' => 'form-control']) !!}
</div> --}}

<div class="form-group col-sm-6">
    <label for="activo">Activo;</label><br>
    <input type="hidden" name="activo" :value="activo ? 'si':'no'">
    <toggle-button v-model="activo"
    :sync="true"
    :color="{checked: '#85C98D', unchecked: '#FE5C49'}"
    :switch-color="{checked: '#25EF02', unchecked: '#B62504'}"
    :labels="{checked: 'Si', unchecked: 'No'}"
    :height="30"
    :width="60"
    :value="false"></toggle-button>

    </div>


@push('scripts')

<script>
// $(function () {
// $("input[name='q']").hide();
// });
const app = new Vue({
    name:'app',
    el: '#root',

created() {

this.activoID

        },

    data: {
    activo: @json(($tipoEquipo->activo ?? false)=='si' ? true : false),

    },
computed: {
    activoID() {
        if (this.activo == 'si') {
        return true;
            }
        return false;
          },

    }
            });
</script>
@endpush
