<div class="card">
    <div class="card-body">
        <div class="avatar-upload">
            <div class="avatar-preview">
                <div style="background-image: url({{ url('storage/' . $admin->image) }});"></div>
            </div>
        </div>
        <h5 class="card-title">@lang('admin.name_en'):</h5>
        <p class="card-text">{{ $admin->name_en }}</p>
        <h5 class="card-title">@lang('admin.name_ar'):</h5>
        <p class="card-text">{{ $admin->name_ar }}</p>
        <h5 class="card-title">@lang('admin.email'):</h5>
        <p class="card-text">{{ $admin->email }}</p>
    </div>
</div>
