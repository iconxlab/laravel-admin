@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{ exit('<pre>' . print_r($model->fillable, TRUE) . '</pre>'); }}
        </div>
    </div>

@endsection
