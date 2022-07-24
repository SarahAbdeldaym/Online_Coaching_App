<div id="ajax_edit_errors"></div>

{!! Form::open(['id' => 'update_form']) !!}
    <input type="hidden" name="id" id="id" value="{{$coach_schedule->id}}">
    <input type="hidden" name="coach_id" id="coach_id" value="{{$coach_schedule->coach_id}}">
    <div class="form-group">
        {!! Form::label('day', trans('admin.day')) !!}
        {!! Form::date('day', $coach_schedule->day, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('from', trans('admin.from')) !!}
        {!! Form::time('from', $coach_schedule->from, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('to', trans('admin.to')) !!}
        {!! Form::time('to', $coach_schedule->to, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('session_duration', trans('admin.session_duration')) !!}
        {!! Form::text('session_duration', $coach_schedule->session_duration, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit(trans('admin.edit'), ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
