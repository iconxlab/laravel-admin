@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($model->fillable as $column)
                <div class="row">
                    <div class="col-xs-6">{!! title_case(str_replace("_", " ", snake_case($column))) !!}</div>
                    <div class="col-xs-6">{!! $model->{$column} !!}</div>
                </div>
            @endforeach

            <div class="row">
                <div class="col-md-6 text-right">
                    <a href="#edit" class="btn btn-primary">Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $model->id }}">Delete</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal{{ $model->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Delete record</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure? This action can't be undone!
                            </div>
                            <div class="modal-footer">
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => 'delete'
                                ]) !!}
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
