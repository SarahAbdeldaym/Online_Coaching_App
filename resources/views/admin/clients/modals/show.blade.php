<div class="card">
    <div class="card-body">
        <div class="avatar-upload">
            <div class="avatar-preview">
                @if (!empty($client->image))
                    <div style="background-image: url({{ url('storage/' . $client->image) }});"></div>
                @else
                    <div style="background-image: url({{ url('storage/images/clients/default_client.png') }});"></div>
                @endif
            </div>
        </div>
        <h5 class="card-title">@lang('admin.name_en'):</h5>
        <p class="card-text">{{ $client->name_en }}</p>
        <h5 class="card-title">@lang('admin.name_ar'):</h5>
        <p class="card-text">{{ $client->name_ar }}</p>
        <h5 class="card-title">@lang('admin.email'):</h5>
        <p class="card-text">{{ $client->email }}</p>
        <h5 class="card-title">Mobile:</h5>
        <p class="card-text">{{ $client->mobile }}</p>
        <h5 class="card-title">Date of Birth:</h5>
        <p class="card-text">{{ $client->date_of_birth }}</p>
        <h5 class="card-title">Gender</h5>
        <p class="card-text">{{ $client->gender }}</p>
    </div>
</div>
