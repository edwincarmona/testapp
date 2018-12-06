@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Segment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($segment, ['route' => ['segments.update', $segment->id_segment], 'method' => 'patch']) !!}

                        @include('segments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection