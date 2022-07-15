@extends('coach.index')

@section('content')

    @if (direction() == 'rtl')
        <style>
            @media (min-width:768px) {
                .coach-info {
                    border-left: 2px dashed #ccc;
                }
            }
        </style>
    @else
        <style>
            @media (min-width:768px) {
                .coach-info {
                    border-right: 2px dashed #ccc;
                }
            }
        </style>
    @endif
    <style>
        .coach-info ul li {
            margin: 15px 0;
        }

        .coach-info ul li span:first-child {
            display: inline-block;
            width: 40%;
        }
    </style>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('coach.main-info')</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12 coach-info">
                    <ul class="list-unstyled my-4">
                        <li>
                            @if (direction() == 'rtl')
                                <span>@lang('admin.name') :</span> <span>{{ $coach->name_ar }}</span>
                            @else
                                <span>@lang('admin.name') :</span> <span>{{ $coach->name_en }}</span>
                            @endif
                        </li>
                        <li>
                            <span>@lang('admin.email') : </span> <span>{{ $coach->email }}</span>
                        </li>

                        <li>
                            <span>@lang('admin.mobile') : </span>
                            @if ($coach->mobile)
                                <span>{{ $coach->mobile }}</span>
                            @else
                                <span>Not Specified</span>
                            @endif
                        </li>

                        <li>
                            <span>@lang('admin.age') : </span>
                            @if ($coach->getAgeAttribute())
                                <span>{{ $coach->getAgeAttribute() }}</span>
                            @else
                                <span>Not Specified</span>
                            @endif
                        </li>

                        <li>
                            <span>@lang('admin.gender') : </span> <span>{{ $coach->gender }}</span>
                        </li>

                        <li>
                            @if ($coach->specialist)
                                @if (direction() == 'rtl')
                                    <span>@lang('admin.specialist') : </span> <span>{{ $coach->specialist['name_ar'] }}</span>
                                @else
                                    <span>@lang('admin.specialist') : </span> <span>{{ $coach->specialist['name_en'] }}</span>
                                @endif
                            @else
                                <span>@lang('admin.specialist') : </span> <span>No Specialist Selected</span>
                            @endif
                        </li>

                        <li>
                            <a href="{{ route('coach.editInfo') }}" class="btn btn-primary">@lang('admin.edit-info')</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-sm-12 up_img">
                    <div class="form-group">
                        <div class="avatar-upload">
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="background-image: url({{ url('storage/' . $coach->image) }});"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
