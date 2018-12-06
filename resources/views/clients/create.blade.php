@extends('templates.basics')

@section('t_header')
    Client
@endsection

@section('principal_content')
    @include('adminlte-templates::common.errors')
    <div>
        {!! Form::open(['route' => 'clients.store']) !!}

            @include('clients.fields')

        {!! Form::close() !!}
    </div>
@endsection
