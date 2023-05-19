@extends('layouts.app')

@section('titulo_pagina', 'Clientes')

@section('content')

@section('content')

    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="pull-left" style="margin-top: .4rem;margin-bottom: .5rem">
                    Familiares Empleado
                </h2>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box box-primary">

                    <div class="box-body">
                     @include('clientes.form_filters')
                    </div>

                </div>



                @if($showResult)
                    <div class="box box-primary">
                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped table-hover tableData" style="width:100%;">
                                <thead>
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>DPI</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Correo electronico</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                    <tr>
                                         {{-- <td>{{$cliente->id}}</td> --}}
                                        <td>{{$cliente->nombres}}</td>
                                        <td>{{$cliente->apellidos}}</td>
                                        <td>{{$cliente->dpi}}</td>
                                        <td>{{$cliente->telefono}}</td>
                                        <td>{{$cliente->direccion}}</td>
                                        <td>{{$cliente->correo}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    @endif
            </div>
        </div>
    </section>



@endsection
