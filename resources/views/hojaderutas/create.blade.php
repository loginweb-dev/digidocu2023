@extends('layouts.app')
@section('title','Nueva HR ')
@section('content')
    <section class="content-header">
        <h1>
            Hojas de Rutas
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'hojaderutas.store']) !!}

                    <!-- Name Field -->
                    <div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' :'' }}">
                        {!! Form::label('name', 'Titulo:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                    </div>
                   

                    <!-- start Field -->
                    <div class="form-group col-sm-6 {{ $errors->has('start') ? 'has-error' :'' }}">
                        {!! Form::label('start', 'Start:') !!}
                        {!! Form::number('start', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('start','<span class="help-block">:message</span>') !!}
                    </div>

                    <!-- text Field -->
                    <div class="form-group col-sm-6 {{ $errors->has('text') ? 'has-error' :'' }}">
                        {!! Form::label('text', 'Texto:') !!}
                        {!! Form::text('text', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('text','<span class="help-block">:message</span>') !!}
                        <small>el texto de la hoja de ruta es la abrebiatura con el codigo secuencial del mismo (##  = codigo secuencial)</small>
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('hojaderutas.index') !!}" class="btn btn-default">Cancelar</a>
                        <p>Todos los campos son obligatorios</p>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
