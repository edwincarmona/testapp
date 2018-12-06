@extends('templates.basics')

@section('t_header')
    Clients
@endsection

@section('principal_content')
    @include('flash::message')

    <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('clients.create') !!}">Add New</a>
    </h1>

    @include('clients.table')
@endsection


