@extends('layouts.app')
@section('title','Eidtar HR ')
@section('content')
    <section class="content-header">
        <h1>
            Editar Hojas de Rutas #{{ $hr->id }}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($hr, ['route' => ['hojaderutas.update', $hr->id], 'method' => 'patch']) !!}

                    <!-- Name Field -->
                    <div class="form-group col-sm-6 {{ $errors->has('name') ? 'has-error' :'' }}">
                        {!! Form::label('name', 'Titulo:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                    </div>

                   
                    <!-- text Field -->
                    <div class="form-group col-sm-6 {{ $errors->has('text') ? 'has-error' :'' }}">
                        {!! Form::label('text', 'Texto:') !!}
                        {!! Form::text('text', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('text','<span class="help-block">:message</span>') !!}
                    </div>

                    <!-- start Field -->
                    <div class="form-group col-sm-6 {{ $errors->has('start') ? 'has-error' :'' }}">
                        {!! Form::label('start', 'Start:') !!}
                        {!! Form::number('start', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('start','<span class="help-block">:message</span>') !!}
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('hojaderutas.index') !!}" class="btn btn-default">Cancelar</a>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
