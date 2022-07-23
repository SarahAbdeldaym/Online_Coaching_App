@extends('admin.index')
@section('pageTitle', trans('admin.settings'))
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            {!! Form::open(['url' => adminUrl('settings'), 'files' => true]) !!}
            <div class="row">
                <div class="form-group col-md-4">
                    {!! Form::label('sitename_en', trans('admin.sitename_en')) !!}
                    {!! Form::text('sitename_en', setting()->sitename_en, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('sitename_ar', trans('admin.sitename_ar')) !!}
                    {!! Form::text('sitename_ar', setting()->sitename_ar, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('email', trans('admin.email')) !!}
                    {!! Form::email('email', setting()->email, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('main_lang', trans('admin.main_lang')) !!}
                    {!! Form::select('main_lang', ['ar' => trans('admin.ar'), 'en' => trans('admin.en')], setting()->main_lang, [
                        'class' => 'form-control',
                    ]) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('status', trans('admin.status')) !!}
                    {!! Form::select('status', ['open' => trans('admin.open'), 'close' => trans('admin.close')], setting()->status, [
                        'class' => 'form-control',
                    ]) !!}
                </div>
            </div>
            {!! Form::submit(trans('admin.save'), ['class' => 'btn btn-primary', 'style' => 'margin:0 15px;']) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
