<!-- Usuario Id Field -->
<div class="form-group col-sm-6">
    <label for="tipousuario">Usuario </label>
    <multiselect v-model="tipousuario" :options="tipousuarios" label="name" placeholder="Selecciones uno">
    </multiselect>
    <input type="hidden" name="usuario_id" id="usuario_id" :value="usuarioId">
</div>


<!-- Cliente Id Field -->

<div class="form-group col-sm-6">
    <label for="tipocliente">TODO </label>
    <multiselect v-model="tipocliente" :options="tipoclientes" label="nombres" placeholder="Selecciones uno">
    </multiselect>
    <input type="hidden" name="cliente_id" id="cliente_id" :value="clienteID">

</div>


<div class="form-group col-sm-6">
    <label for="tipocliente">Cliente </label>
    <multiselect v-model="tipocliente" :options="tipoclientes" label="nombres" placeholder="Selecciones uno">
    </multiselect>
    <input type="hidden" name="cliente_id" id="cliente_id" :value="clienteID">

</div>

<!-- Equipo Id Field -->


<div class="form-group col-sm-6">
    <label for="equipo">numero Serie </label>
    <multiselect v-model="equipo" :options="equipos" label="numero_serie" placeholder="Selecciones uno">
    </multiselect>
    <input type="hidden" name="equipo_id" id="equipo_id" :value="equipoID">

</div>

<!-- Problema Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('problemaS', 'ProblemaS:') !!}
    {!! Form::textarea('problemaS', null, ['class' => 'form-control','rows' => 2, 'required']) !!}
</div>

<!-- Problema Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('problemaS', 'ProblemaS2:') !!}
    {!! Form::textarea('problemaS2', null, ['class' => 'form-control','rows' => 2, 'required']) !!}
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


@push('scripts')

    <script>

        $(function () {
            $("input[name='q']").hide();
        });
        const app = new Vue({
            name: 'app',
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
