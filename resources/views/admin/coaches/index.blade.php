@extends('admin.index')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
            {!! $dataTable->table(['class' => 'dataTable table table-striped table-hover table-bordered'], true) !!}
        </div>
    </div>

    <!-- view modal view using by ajax -->
    <div id="ajax_view" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body" id="ajax_view_content">

                </div>
            </div>
        </div>
    </div>

    <!-- edit modal view using by ajax -->
    <div id="ajax_edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body" id="ajax_edit_content">

                </div>
            </div>
        </div>
    </div>

    <!-- delete modal view using by ajax -->
    <div id="ajax_delete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="modal-body" id="ajax_delete_content">
                    @csrf
                    <h4 class="mb-3">{{ trans('admin.delete_this') }}</h4>
                    <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.no') }}</button>
                    <button class="btn btn-danger" id="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- delete all modal view using by ajax -->
    <div id="mutlipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="empty_record hidden">
                        <h4>{{ trans('admin.please_check_some_records') }} </h4>
                    </div>
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="not_empty_record hidden">
                        <h4>{{ trans('admin.ask_delete_item') }} <span class="record_count"></span> ? </h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ trans('admin.close') }}</button>
                    </div>
                    <div class="not_empty_record hidden">
                        @csrf
                        <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.no') }}</button>
                        <button class="btn btn-danger" id="ajax_delete_all">{{ trans('admin.yes') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- create modal view using by ajax -->
    <div id="ajax_create" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.add') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="col-md-6 col-sm-12 up_img">
                    <div class="form-group">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload-create" name="image" />
                                <label for="imageUpload-create">
                                    <i class="fa fa-pencil-alt"></i>
                                </label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview-create"
                                    style="background-image: url({{ url('storage/images/coaches/default_coach.png') }});">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body" id="ajax_create_content">

                    <div id="ajax_create_errors"></div>

                    {!! Form::open(['id' => 'store_form']) !!}
                    <div class="form-group">
                        {!! Form::label('name_en', trans('admin.name_en')) !!}
                        {!! Form::text('name_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name_ar', trans('admin.name_ar')) !!}
                        {!! Form::text('name_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', trans('admin.email')) !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('mobile', trans('admin.mobile')) !!}
                        {!! Form::number('mobile', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('date_of_birth', trans('admin.date_of_birth')) !!}
                        {!! Form::date('date_of_birth', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', trans('admin.password')) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'data-strength' => '', 'required' => 'required']) !!}
                        <h6 id="pass-msg" style="display:none; color:#dd4b39;">{{ trans('admin.password_massage') }}
                        </h6>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="label">@lang('admin.Gender')</label>
                        <div class="">
                            <select required class="form-control input" name="gender">
                                <option selected value="">@lang('admin.Choose One')</option>

                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>@lang('admin.Male')
                                </option>

                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                    @lang('admin.Female')</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    {!! Form::label('specialist', trans('coach.specialists')) !!}
                    {!! Form::select(
                        'specialist_id',
                        App\Models\Specialist::pluck('name_' . session('lang'), 'id'),
                        old('specialist_id'),
                        [
                            'class' => 'form-control specialist_id',
                            'data-strength' => '',
                        ],
                    ) !!}
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    {!! Form::label('session_time', trans('admin.Session Time')) !!}
                    {!! Form::number('session_time', old('session_time'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label for="country_id" class="control-label col-sm-3">@lang('admin.Country')</label>
                    <div>
                        <select class="form-control country_n" name="country_id">
                            <option selected value="">@lang('admin.Choose_One')</option>
                            @foreach (App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}">
                                    @if (direction() == 'rtl')
                                        {{ $country->name_ar }}
                                    @else
                                        {{ $country->name_en }}
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    {{ Form::label('city_id', trans('admin.cities'), ['class' => 'control-label col-sm-3']) }}
                    <div>
                        <select name="city_id" id="city_id" class="form-control">
                            <option value=""> @lang('admin.Choose One') </option>
                        </select>
                    </div>
                </div>


                <div class="form-group col-md-6 col-sm-12">
                    {{ Form::label('district_id', trans('admin.districts'), ['class' => 'control-label col-sm-3']) }}
                    <div>
                        <select name="district_id" id="district_id" class="form-control">
                            <option value=""> @lang('admin.Choose One') </option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    {!! Form::label('address_ar', trans('admin.address_ar')) !!}
                    {!! Form::text('address_ar', old('address_ar'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    {!! Form::label('address_en', trans('admin.address_en')) !!}
                    {!! Form::text('address_en', old('address_en'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    {!! Form::label('fees', trans('admin.Fees')) !!}
                    {!! Form::text('fees', old('fees'), ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit(trans('admin.add'), ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    </div>

    @push('js')
        {!! $dataTable->scripts() !!}
        @include('admin.coaches.modals.script')
    @endpush

    @push('js')
        @include('admin.templates.scripts.city')
        @include('admin.templates.scripts.district')
    @endpush

@endsection
