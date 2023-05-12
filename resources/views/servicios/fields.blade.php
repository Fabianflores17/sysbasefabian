<!-- Usuario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario_id', 'Usuario Id:') !!}
    {!! Form::select('usuario_id',
    select(\App\Models\User::Class, 'name','id',null)
    , null, ['id'=>'usuario_id','class' => 'form-control', 'required']) !!}
</div>

<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    {!! Form::select('cliente_id',
    select(\App\Models\Cliente::class,'nombres' ,'id', null),
    null, ['id'=>'cliente_id','class' => 'form-control', 'required']) !!}
</div>

<!-- Equipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipo_id', 'Equipo Id:') !!}
    {!! Form::select('equipo_id',
    select(\App\Models\Equipo::class, 'numero_serie', 'id', null),
    null, ['id'=>'equipo_id','class' => 'form-control', 'required']) !!}
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

