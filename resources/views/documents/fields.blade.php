<!-- Name Field -->

    <div class="col-sm-6">
        <label for="">Tipo Documento</label>
        <select class="form-control" name="type" required>
            <option value="Interno">Interno</option>
            <option value="Externo">Externo</option>
        </select>
    </div>

    <div class="col-sm-4">
        <label for="">Fecha</label>
        <input type="date" name="fecha" id="" class="form-control" value="@if($document) {{ $document->fecha }} @endif">
    </div>

    <div class="col-sm-2">
        <label for="">Hora</label>
        <input type="time" name="hora" id="" class="form-control" value="@if($document) {{ $document->hora }} @endif">
    </div>

    <div class="col-sm-12">
        <br>
     </div>


    <div class="col-sm-6">
        <label for="">Hoja de Ruta</label>
        <select class="form-control" name="hojaderuta" required>
            @foreach ($hr as $item)
                <option value="{{ $item->id }}">{{ $item->name.' - start: '.$item->start }}</option>
            @endforeach            
        </select>
    </div>

    <div class="col-sm-6">
        <label for="">Codigo</label>
        <input type="text" name="code" id="" class="form-control" value="@if($document) {{ $document->code }} @endif">
    </div>

    <div class="col-sm-12">
       <br>
    </div>

{!! Form::bsText('name') !!}
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
{!! Form::bsTextarea('description',null,['class'=>'form-control b-wysihtml5-editor']) !!}


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


{{-- 
<div class="col-sm-12">
    {{ $document }}
</div> --}}