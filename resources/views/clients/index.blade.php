@extends('templates.basics')

@section('t_header')
    Clients
@endsection

@section('principal_content')
    @include('flash::message')

    <div>
        <div class="pull-left">
            <a href="clients?search=is_deleted:0" class="btn btn-success">Actives</a>
            <a href="clients?search=is_deleted:1" class="btn btn-danger">Deleted</a>
            <a href="clients" class="btn btn-default">All</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('clients.create') !!}">Add New</a>
        </div>
    </div>
    <br/>
    <br/>

    @include('clients.table')
@endsection


