@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('t_header')</div>
                
                <div class="card-body">
                    @yield('principal_content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('templates.scripts')
@endsection