<div class="card">
    <div class="card-body">
        <h5 class="card-title">@lang('admin.day'):</h5>
        <p class="card-text">{{ $coach_schedule->day }}</p>

        <h5 class="card-title">@lang('admin.from'):</h5>
        <p class="card-text">{{ $coach_schedule->from }}</p>

        <h5 class="card-title">@lang('admin.to'):</h5>
        <p class="card-text">{{ $coach_schedule->to }}</p>

        <h5 class="card-title">@lang('admin.session_duration'):</h5>
        <p class="card-text">{{ $coach_schedule->session_duration }}</p>

        <h5 class="card-title">@lang('admin.coach'):</h5>
        <p class="card-text">{{ session('lang') == 'en' ? $coach_schedule->coach->name_en : $coach_schedule->coach->name_ar }}</p>

    </div>
</div>
