<div id="ajax_edit_errors"></div>

{!! Form::open(['id' => 'update_form']) !!}

    <input type="text" name="id" class="hidden" id="id" value="{{$book->id}}">
    <div class="form-group">
        {!! Form::label('coach_id', trans('admin.coach_id')) !!}
        {!! Form::select('coach_id',App\Models\Coach::pluck('name_'.session('lang'), 'id'), $book->coach_id, ['class' => 'form-control coach_id']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('client_id', trans('admin.client_id')) !!}
        {!! Form::select('client_id',App\Models\Client::pluck('name_'.session('lang'), 'id'), $book->client_id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('day', trans('admin.day')) !!}
        {!! Form::date('day', old('day'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('fees', trans('admin.fees')) !!}
        {!! Form::number('fees', $book->fees, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('time', trans('admin.time')) !!}
        {!! Form::time('time', $book->time, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="confirm" {{ $book->confirm ? 'checked' : '' }}>
        <label class="form-check-label" for="exampleCheck1">{{ trans('admin.confirmed') }}</label>
    </div>

    {!! Form::submit(trans('admin.edit'), ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
