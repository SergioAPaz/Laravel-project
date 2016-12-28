@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="border-color:#2579A9">
                <div class="panel-heading" style="background-color:#2579A9;color:#fafafa;border-color:#2579A9">Nuevo recordatorio</div>

                <div class="panel-body">
                    @include('layouts.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
