@extends('layouts.authorized.layout')

@section('page_content')

    <div class="container">

        <h3> Create New Event </h3>

        {{ Form::open([
            'route' => 'events.store',
            'class' => 'form-horizontal',
            ]) }}

        @include('events.form_fields')

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                {{ Form::submit('Create event',
                  ['class'=>'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>
@endsection
