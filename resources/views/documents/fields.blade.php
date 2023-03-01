<!-- Name Field -->

    <div class="col-sm-6">
        <label for="">Remitente Externo | <a href="{{ config('settings.system_url') }}admin/users/create">Nuevo Usuario</a></label>
        <select class="form-control" name="remitente_id" id="remitente_id" required>
            @foreach ($remitentes as $item)
                <option value="{{ $item->id }}">{{ $item->name.' - '.$item->phone }}</option>
            @endforeach            
        </select>
        <input type="hidden" name="type" value="Externo">
    </div>

    <div class="col-sm-4">
        <label for="">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="">
        @if($document) {{ $document->fecha }} @endif
    </div>

    <div class="col-sm-2">
        <label for="">Hora</label>
        <input type="time" name="hora" id="hora" class="form-control" value="">
        @if($document) {{ $document->hora }} @endif
    </div>

    <div class="col-sm-12">
        <br>
     </div>


    <div class="col-sm-6">
        <label for="">Hoja de Ruta </label>
        <select class="form-control" name="hojaderuta" id="hojaderuta" required>
            <option value="0">Elije una opcion</option>
            @foreach ($hr as $item)
                @if (isset($mihr))
                    <option value="{{ $item->id }}" @if($item->id == $mihr->id) selected @endif>{{ $item->name.' - '.$item->text }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->text }}</option>
                @endif
            @endforeach            
        </select>
    </div>

    <div class="col-sm-6">
        <label for="">Codigo</label>
        <input type="text" name="code" id="code" class="form-control" value="@if($document) {{ $document->code }} @endif">
    </div>

    <div class="col-sm-12">
       <br>
    </div>


@if ($document)
    @if (auth()->user()->can('update document '.$document->id) && !auth()->user()->is_super_admin)
        @foreach($document->tags->pluck('id')->toArray() as $tagId)
            <input type="hidden" name="tags[]" value="{{$tagId}}">
        @endforeach
    @else
        <div class="form-group col-sm-6 ">
            <label for="tags[]">{{ucfirst(config('settings.tags_label_plural'))}}</label>
            <select class="form-control select2" id="tags"
                    name="tags[]"
                    multiple>
                @foreach($tags as $tag)
                    @canany (['update documents','update documents in tag '.$tag->id])
                        <option
                            value="{{$tag->id}}" {{(in_array($tag->id,old('tags', optional(optional(optional($document)->tags)->pluck('id'))->toArray() ?? [] )))?"selected":"" }}>{{$tag->name}}</option>
                    @endcanany
                @endforeach
            </select>
        </div>
    @endif
@else
    <div class="form-group col-sm-6 {{ $errors->has("tags") ? 'has-error' :'' }}">
        <label for="tags[]">{{ucfirst(config('settings.tags_label_plural'))}}</label>
        <select class="form-control select2" id="tags" name="tags[]" multiple>
            @foreach($tags as $tag)
                @canany (['create documents','create documents in tag '.$tag->id])
                    <option
                        value="{{$tag->id}}" {{(in_array($tag->id,old('tags', optional(optional(optional($document)->tags)->pluck('id'))->toArray() ?? [] )))?"selected":"" }}>{{$tag->name}}</option>
                @endcanany
            @endforeach
        </select>
        {!! $errors->first("tags",'<span class="help-block">:message</span>') !!}
    </div>
@endif

{!! Form::bsText('name') !!}

{!! Form::bsTextarea('descripcion',null,['class'=>'form-control b-wysihtml5-editor']) !!}


{{--additional Attributes--}}
@foreach ($customFields as $customField)
    <div class="form-group col-sm-6 {{ $errors->has("custom_fields.$customField->name") ? 'has-error' :'' }}">
        {!! Form::label("custom_fields[$customField->name]", Str::title(str_replace('_',' ',$customField->name)).":") !!}
        {!! Form::text("custom_fields[$customField->name]", null, ['class' => 'form-control typeahead','data-source'=>json_encode($customField->suggestions),'autocomplete'=>is_array($customField->suggestions)?'off':'on']) !!}
        {!! $errors->first("custom_fields.$customField->name",'<span class="help-block">:message</span>') !!}
    </div>
@endforeach
{{--end additional attributes--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::submit('Guardar & Subir', ['class' => 'btn btn-primary','name'=>'savnup']) !!}
    <a href="{!! route('documents.index') !!}" class="btn btn-default">Cancelar</a>
</div>


<script>
    var date = new Date();
    var dateOptions = { day: '2-digit', month: '2-digit', year: 'numeric' };
    var currentDate = date.toLocaleDateString('ja-JP', dateOptions).replace(/\//gi, '-');
    document.getElementById('fecha').value = currentDate;
    
    var timeOptions = { hour: '2-digit', minute: '2-digit' };
    var currentTime = date.toLocaleTimeString('it-IT', timeOptions);
    document.getElementById('hora').value = currentTime;


    const select = document.getElementById('hojaderuta');
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