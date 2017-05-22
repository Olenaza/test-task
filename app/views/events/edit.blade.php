@extends('layouts.authorized.layout')

@section('page_content')

    <div class="container">

        <h3> Edit Event </h3>

        {{ Form::model($event, [
            'route' => ['events.update', $event->id],
            'method' => 'put',
            'class' => 'form-horizontal',
            ]) }}

        @include('events.form_fields')

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                {{ Form::submit('Save',
                  ['class'=>'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>
@endsection
