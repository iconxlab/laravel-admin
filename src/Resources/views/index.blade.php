@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table">
                <thead>
                <tr>
                    @foreach($columns as $column)
                        <th>
                            <a href="#sort">
                                {!! title_case(str_replace("_", " ", snake_case($column))) !!}
                            </a>
                        </th>
                    @endforeach
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paginator as $model)
                    <tr>
                        @foreach($columns as $column)
                            <th>{!! $model->{$column} !!}</th>
                        @endforeach
                        <th>
                            <div class="col-md-6 text-right">
                                <a href="#show" class="btn btn-primary">Show</a>
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
                        </th>
                    <tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <a class="btn btn-small btn-primary" href="#create" class="btn">Add new</a>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
