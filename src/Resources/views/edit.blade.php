@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($entity) !!}

            @foreach($model->fillable as $key)
                <div class="form-group">
                    {!! Form::text($key) !!}
                </div>
            @endforeach

            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
