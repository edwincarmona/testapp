@extends('templates.basics')

@section('t_header')
    Client
@endsection

@section('principal_content')
    <div>
        @include('clients.show_fields')
        <a href="{!! route('clients.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
