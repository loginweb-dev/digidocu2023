@extends('layouts.app')
@section('title','Nueva HR ')
@section('content')
    <section class="content-header">
        <h1>
            Nueva Nota Interna
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'comunicaciones.store']) !!}

                    <!-- Name Field -->
                    <div class="form-group col-sm-4 {{ $errors->has('fecha') ? 'has-error' :'' }}">
                        {!! Form::label('fecha', 'Fecha de salida:') !!}
                        {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('fecha','<span class="help-block">:message</span>') !!}
                    </div>

                 
                    <!-- Name Field -->
                    <div class="form-group col-sm-2 {{ $errors->has('hora') ? 'has-error' :'' }}">
                        {!! Form::label('hora', 'Hora:') !!}
                        {!! Form::time('hora', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('hora','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group col-sm-6 {{ $errors->has('de_id') ? 'has-error' :'' }}">
                        {!! Form::label('de_id', 'De :') !!}
                        <input type="hidden" name="de_id" class="form-control" value="{{ $user->id }}">
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                    </div>


                   
                    <div class="form-grou col-sm-6">
                        <label for="">Dirigido A: </label>
                        <select class="form-control" name="dirigido_id" required>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name.' - '.$item->id }}</option>
                            @endforeach            
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">Via: </label>
                        <select class="form-control" name="via_id" required>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name.' - '.$item->id }}</option>
                            @endforeach            
                        </select>
                    </div>


                    <div class="col-sm-6">
                        <label for="">Hoja de Ruta </label>
                        <select class="form-control" name="hojaderuta_id" id="hojaderuta_id" required>
                            <option value="0">Elije una opcion</option>
                            @foreach ($hr as $item)
                                @if (isset($mihr))
                                    <option value="{{ $item->id }}" @if($item->id == $mihr->id) selected @endif>{{ $item->name.' - '.$item->text }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->name.' - '.$item->text }}</option>
                                @endif
                            @endforeach            
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">Codigo: </label>
                        <input type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-sm-6">
                        <label for="">Referencia: </label>
                        <textarea name="referencia" id="" class="form-control"></textarea>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">Nota: </label>
                        <textarea name="nota" id="" class="form-control"></textarea>
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('hojaderutas.index') !!}" class="btn btn-default">Cancelar</a>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


<script>

</script>