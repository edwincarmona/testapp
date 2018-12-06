@extends('templates.basics')

@section('t_header')
        Product
@endsection

@section('principal_content')
    <div>
        @include('products.show_fields')
        <a href="{!! route('products.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
