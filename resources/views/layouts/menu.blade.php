<li class="{{ Request::is('admin/home*') ? 'active' : '' }}">
    <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-home"></i><span>Inicio</span></a>
</li>
@can('viewAny',\App\Document::class)
    <li class="{{ Request::is('admin/documents*') ? 'active' : '' }}">
        <a href="{!! route('documents.index') !!}"><i
                class="fa fa-file"></i><span>{{ ucfirst(config('settings.document_label_plural')) }}</span></a>
    </li>
@endcan

@can('read tags')
    <li class="{{ Request::is('admin/comunicaciones*') ? 'active' : '' }}">
        <a href="{!! route('comunicaciones.index') !!}"><i
                class="fa fa-phone"></i><span>Com. Internas</span></a>
    </li>
@endcan


@can('read tags')
    <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}">
        <a href="{!! route('tags.index') !!}"><i
                class="fa fa-tags"></i><span>{{ ucfirst(config('settings.tags_label_plural')) }}</span></a>
    </li>
@endcan

@can('read tags')
    <li class="{{ Request::is('admin/hojaderutas*') ? 'active' : '' }}">
        <a href="{!! route('hojaderutas.index') !!}"><i
                class="fa fa-file-text-o"></i><span>Hoja de rutas</span></a>
    </li>
@endcan

@can('read users')
    <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
        <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Usuarios</span></a>
    </li>
@endcan

@if(auth()->user()->is_super_admin)
    <li class="treeview {{ Request::is('admin/advanced*') ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-info-circle"></i>
            <span>Ajustes avanzados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('admin/advanced/settings*') ? 'active' : '' }}">
                <a href="{!! route('settings.index') !!}"><i class="fa fa-gear"></i><span>Configuracion</span></a>
            </li>
            <li class="{{ Request::is('admin/advanced/custom-fields*') ? 'active' : '' }}">
                <a href="{!! route('customFields.index') !!}"><i
                        class="fa fa-file-text-o"></i><span>Custom Fields</span></a>
            </li>
            <li class="{{ Request::is('admin/advanced/file-types*') ? 'active' : '' }}">
                <a href="{!! route('fileTypes.index') !!}"><i class="fa fa-file-o"></i><span>{{ucfirst(config('settings.file_label_singular'))}} Types</span></a>
            </li>
        </ul>
    </li>
@endif

