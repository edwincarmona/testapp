@extends('templates.basics')

@section('t_header')
        Product
@endsection

@section('principal_content')
    @include('adminlte-templates::common.errors')
    <div>
        {!! Form::open(['route' => 'products.store']) !!}

            @include('products.fields')

        {!! Form::close() !!}
    </div>
@endsection
