@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(session()->has('msj'))
                <div class="alert alert-success" role="alert">{{ session('msj') }}</div>
            @endif
            <div class="panel panel-default" style="border-color:#2579A9">
                @if(!isset($edit))
                    <div class="panel-heading" style="background-color:#2579A9;color:#fafafa;border-color:#2579A9">Nuevo recordatorio</div>
                @else
                    <div class="panel-heading" style="background-color:#2579A9;color:#fafafa;border-color:#2579A9">Modificar recordatorio</div>
                @endif
                <div class="panel-body">
                    @if(isset($edit))
                        @include('layouts.edit')
                    @else
                        @include('layouts.form')      
                    @endif

                                
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    @if(!isset($edit))
        @include('layouts.tabla')
    @endif
</div>

@endsection
