@extends('layouts.app')
@section('title','New User')
@section('content')
    <section class="content-header">
        <h1>
            Nuevo Usuario
        </h1>
    </section>
    <div class="content">

        {!! Form::open(['route' => 'users.store']) !!}

            @include('users.fields')

        {!! Form::close() !!}
    </div>
@endsection
