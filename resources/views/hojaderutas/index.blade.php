@extends('layouts.app')
@section('title','Listado HR')
@section('css')
    @include('layouts.datatables_css')
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Hojas de Rutas</h1>
        <h1 class="pull-right">
            @can('create tags')
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                   href="{!! route('hojaderutas.create') !!}">
                    <i class="fa fa-plus"></i>
                    Agregar Nuevo
                </a>
            @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        {{-- @include('flash::message') --}}

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered table-mini']) !!}
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection
