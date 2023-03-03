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

                    <div class="col-sm-4">
                        <label for="">Fecha (*)</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="">
                    </div>
                
                    <div class="col-sm-2">
                        <label for="">Hora (*)</label>
                        <input type="time" name="hora" id="hora" class="form-control" value="">
                    </div>

                    
                    <div class="form-group col-sm-6 {{ $errors->has('de_id') ? 'has-error' :'' }}">
                        {!! Form::label('de_id', 'De :') !!}
                        <input type="hidden" name="de_id" class="form-control" value="{{ $user->id }}">
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                    </div>


                    <div class="form-grou col-sm-6">
                        <label for="">Dirigido A: (*)</label>
                        <select class="form-control" name="dirigido_id" required>
                            @foreach ($users as $item)
                                @if ($item->id == $user->id)                                    
                                @else
                                    <option value="{{ $item->id }}">{{ $item->id.'.- '.$item->name }}</option>
                                @endif                                
                            @endforeach            
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">Via: (*)</label>
                        <select class="form-control" name="via_id" required>
                            @foreach ($users as $item)
                                @if ($item->id == $user->id)                                    
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name.' - '.$item->id }}</option>
                                @endif
                            @endforeach            
                        </select>
                    </div>


                    <div class="col-sm-6">
                        <label for="">Hoja de Ruta (*)</label>
                        <select class="form-control" name="hojaderuta_id" id="hojaderuta_id" required>
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
                        <label for="">Codigo: (*)</label>
                        <input type="text" class="form-control" id="code" name="code">
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
                        <p>todos los campos con (*) son obligatorios</p>
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('hojaderutas.index') !!}" class="btn btn-default">Cancelar</a>
                 
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script>

        var date = new Date();
    
        var dateOptions = { day: '2-digit', month: '2-digit', year: 'numeric' };
        var currentDate = date.toLocaleDateString('ja-JP', dateOptions).replace(/\//gi, '-');
        document.getElementById('fecha').value = currentDate;
    
        var timeOptions = { hour: '2-digit', minute: '2-digit' };
        var currentTime = date.toLocaleTimeString('it-IT', timeOptions);
        document.getElementById('hora').value = currentTime;
    
        // const miselect = document.getElementById('hojaderuta_id');
        // miselect.addEventListener('change', function handleChange(event) {
        //     console.log(event.target.value); // 👉️ get selected VALUE

        //     document.getElementById('code').value = miselect.options[miselect.selectedIndex].text;
        // });

        const select = document.getElementById('hojaderuta_id');
        select.addEventListener('change', async function handleChange(event) {
            var hdr = await axios("{{ config('settings.system_url') }}api/hojaderutas/get/"+select.options[select.selectedIndex].value)
            var newcode = hdr.data.text
            newcode = newcode.replace("##", hdr.data.start)
            document.getElementById('code').value = newcode
            Toastify({
                text: "Hoja de Ruta: "+hdr.data.name,
                duration: 3000
            }).showToast();
        });


    </script>
@endsection


