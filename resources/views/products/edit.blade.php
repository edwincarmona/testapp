@extends('templates.basics')

@section('t_header')
        Product
@endsection

@section('principal_content')
    @include('adminlte-templates::common.errors')
    <div>
        {!! Form::model($product, ['route' => ['products.update', $product->id_product], 'method' => 'patch']) !!}

            @include('products.fields')

        {!! Form::close() !!}
    </div>
@endsection