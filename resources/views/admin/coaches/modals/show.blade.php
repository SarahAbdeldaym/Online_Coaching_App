<div class="card">
    <div class="card-body">
        <div class="avatar-upload">
            <div class="avatar-preview">
                <div style="background-image: url({{ url('storage/' . $coach->image) }});"></div>
            </div>
        </div>
        <h5 class="card-title">@lang('coach.name_en'):</h5>
        <p class="card-text">{{ $coach->name_en }}</p>
        <h5 class="card-title">@lang('coach.name_ar'):</h5>
        <p class="card-text">{{ $coach->name_ar }}</p>
        <h5 class="card-title">@lang('coach.email'):</h5>
        <p class="card-text">{{ $coach->email }}</p>
        <h5 class="card-title">@lang('coach.gender'):</h5>
        <p class="card-text">{{ $coach->gender }}</p>
        <h5 class="card-title">@lang('coach.mobile'):</h5>
        <p class="card-text">{{ $coach->mobile }}</p>
        <h5 class="card-title">@lang('coach.date_of_birth'):</h5>
        <p class="card-text">{{ $coach->date_of_birth }}</p>
        <h5 class="card-title">@lang('coach.session_time'):</h5>
        <p class="card-text">{{ $coach->session_time }}</p>
        <h5 class="card-title">@lang('coach.address_en'):</h5>
        <p class="card-text">{{ $coach->address_en }}</p>
        <h5 class="card-title">@lang('coach.address_ar'):</h5>
        <p class="card-text">{{ $coach->address_ar }}</p>
        <h5 class="card-title">@lang('coach.fees'):</h5>
        <p class="card-text">{{ $coach->fees }}</p>
        @if (direction() == 'rtl')
            <h5 class="card-title">@lang('coach.specialists'):</h5>
            <p class="card-text">{{ $coach->specialist['name_ar'] }}</p>
        @else
            <h5 class="card-title">@lang('coach.specialists'):</h5>
            <p class="card-text">{{ $coach->specialist['name_en'] }}</p>
        @endif
        <h5 class="card-title">@lang('coach.country'):</h5>
        <p class="card-text">{{ $coach->country['name_en'] }}</p>
        <h5 class="card-title">@lang('coach.city'):</h5>
        <p class="card-text">{{ $coach->city['name_en'] }}</p>
        <h5 class="card-title">@lang('coach.district'):</h5>
        <p class="card-text">{{ $coach->district['name_en'] }}</p>
    </div>
</div>
