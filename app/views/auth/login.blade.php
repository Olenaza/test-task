@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">

                        {{ Form::open([
                            'route' => 'session.store',
                            'class' => 'form-horizontal']) }}

                            <div class="form-group">
                                {{ Form::label('username', 'Username:',
                                    ['class'=>'col-md-4 control-label']) }}

                                <div class="col-md-6">
                                {{ Form::text('username', null,
                                    ['required',
                                    'class'=>'form-control',
                                    'placeholder'=>'Username']) }}
                                </div>
                                {{ $errors->first('username') }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('password', 'Password:',
                                    ['class'=>'col-md-4 control-label']) }}

                                <div class="col-md-6">
                                    {{ Form::password('password', null,
                                        ['required',
                                        'class'=>'form-control',
                                        'placeholder'=>'Password']) }}
                                </div>
                                {{ $errors->first('password') }}
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {{ Form::checkbox('remember', 'no') }}
                                    {{ Form::label('remember', 'Remember me') }}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {{ Form::submit('Login',
                                      ['class'=>'btn btn-primary']) }}
                                </div>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
