@extends('coach.index')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('admin.Edit Coach')</h3>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            {!! Form::open(['route' => ['coach.updateInfo', $coach->id], 'method' => 'put', 'files' => true]) !!}

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name_en', trans('admin.name_en')) !!}
                        {!! Form::text('name_en', $coach->name_en, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name_ar', trans('admin.name_ar')) !!}
                        {!! Form::text('name_ar', $coach->name_ar, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', trans('admin.email')) !!}
                        {!! Form::email('email', $coach->email, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('mobile', trans('admin.mobile')) !!}
                        {!! Form::number('mobile', $coach->mobile, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('date_of_birth', trans('admin.date_of_birth')) !!}
                        {!! Form::date('date_of_birth', $coach->date_of_birth, ['class' => 'form-control', 'required' => 'required']) !!}

                    </div>

                    <div class="form-group">
                        {{ Form::label('country', trans('country'), ['class' => 'control-label col-sm-3']) }}
                        {!! Form::select('country_id', App\Models\Country::pluck('name_' . session('lang'), 'id'), $coach->country_id, [
                            'class' => 'form-control',
                            'placeholder' => 'Choose Country...',
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', trans('city'), ['class' => 'control-label col-sm-3']) }}
                        {!! Form::select('city_id', App\Models\City::pluck('name_' . session('lang'), 'id'), $coach->city_id, [
                            'class' => 'form-control',
                            'placeholder' => 'Choose City...',
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('district', trans('district'), ['class' => 'control-label col-sm-3']) }}
                        {!! Form::select(
                            'district_id',
                            App\Models\District::pluck('name_' . session('lang'), 'id'),
                            $coach->district_id,
                            [
                                'class' => 'form-control',
                                'placeholder' => 'Choose District...',
                            ],
                        ) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', trans('admin.password')) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'data-strength' => '']) !!}
                        <h6 id="pass-msg" style="display:none; color:#dd4b39;">{{ trans('admin.password_massage') }}</h6>
                    </div>

                    <div class="form-group">
                        {{ Form::label('gender', trans('admin.Gender'), ['class' => 'control-label col-sm-3']) }}
                        <div class="">
                            <select name="gender" class="form-control" required>
                                <option value="male" {{ $coach->gender == 'male' ? 'selected' : '' }}>@lang('admin.Male')
                                </option>
                                <option value="female" {{ $coach->gender == 'female' ? 'selected' : '' }}>
                                    @lang('admin.Female')</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('specialist', trans('coach.specialists')) !!}
                        {!! Form::select(
                            'specialist_id',
                            App\Models\Specialist::pluck('name_' . session('lang'), 'id'),
                            $coach->specialist_id,
                            [
                                'class' => 'form-control specialist_id',
                                'data-strength' => '',
                            ],
                        ) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('session_time', trans('admin.Session Time')) !!}
                        {!! Form::number('session_time', $coach->session_time, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address_en', trans('admin.address_en')) !!}
                        {!! Form::text('address_en', $coach->address_en, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('address_ar', trans('admin.address_ar')) !!}
                        {!! Form::text('address_ar', $coach->address_ar, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('fees', trans('admin.fees')) !!}
                        {!! Form::number('fees', $coach->fees, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 up_img">
                    <div class="form-group">
                        <h1>
                            {{ trans('admin.image') }}
                        </h1>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload-edit" name="image" />
                                <label for="imageUpload-edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview-edit"
                                    style="background-image: url({{ url('storage/' . $coach->image) }});"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::submit(trans('admin.Edit'), ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.box-body -->
    </div>
@endsection
