{!! Form::open(['route' => ['hojaderutas.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    {{-- <a href="{{ route('hojaderutas.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    @can('update tags')
        <a href="{{ route('hojaderutas.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    {{-- @can('delete tags')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return conformDel(this,event)"
        ]) !!}
    @endcan --}}
</div>
{!! Form::close() !!}
