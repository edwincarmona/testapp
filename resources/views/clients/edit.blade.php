@extends('templates.basics')

@section('t_header')
    Client
@endsection

@section('principal_content')
    @include('adminlte-templates::common.errors')
    <div>
        {!! Form::model($client, ['route' => ['clients.update', $client->id_client], 'method' => 'patch']) !!}

            @include('clients.fields')

        {!! Form::close() !!}
    </div>
@endsection