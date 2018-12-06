@extends('templates.basics')

@section('t_header')
    Products
@endsection

@section('principal_content')
    @include('flash::message')

    <h1 class="pull-right">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('products.create') !!}">Add New</a>
    </h1>

    @include('products.table')
@endsection

