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
                   {!! Form::model($documentRow, ['route' => ['documentRows.update', $documentRow->id_row], 'method' => 'patch']) !!}

                        @include('document_rows.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection