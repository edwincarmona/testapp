@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Document Row
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'documentRows.store']) !!}

                        @include('document_rows.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
