<div class="form-group">
    {{ Form::label('event_title', 'Event Title:',
        ['class'=>'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::text('event_title', null, [
            'required',
            'class'=>'form-control',
            'placeholder'=>'Title',
            ]) }}
    </div>
    {{ $errors->first('event_title') }}
</div>

<div class="form-group">
    {{ Form::label('start_date', 'Event Start Day:',
        ['class'=>'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::text('start_date', null, [
            'required',
             'class'=>'form-control',
             'placeholder'=>'dd-mm-yyyy',
             'id' => 'datepicker',
             ]) }}
    </div>
    {{ $errors->first('start_date') }}
</div>

<div class="form-group">
    {{ Form::label('start_time', 'Event Start Time:',
        ['class'=>'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::text('start_time', null, [
            'required',
             'class'=>'form-control',
             'placeholder'=>'hh:mm',
             'id' => 'timepicker',
             ]) }}
    </div>
    {{ $errors->first('start_time') }}
</div>

<div class="form-group">
    {{ Form::label('event_description', 'Event Description:',
        ['class'=>'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::textarea('event_description', null, [
            'required',
            'class'=>'form-control',
            'placeholder'=>'Description',
            ]) }}
    </div>
    {{ $errors->first('event_description') }}
</div>
