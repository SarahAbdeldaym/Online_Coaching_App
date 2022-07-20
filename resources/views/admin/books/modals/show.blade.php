<div class="card">
    <div class="card-body">
        <h5 class="card-title">@lang('admin.coach'):</h5>
        <p class="card-text">{{ session('lang') == 'en' ? $book->coach->name_en : $book->coach->name_ar }}</p>

        <h5 class="card-title">@lang('admin.address'):</h5>
        <p class="card-text">{{ session('lang') == 'en' ? $book->address_en : $book->address_ar }}</p>

        <h5 class="card-title">@lang('admin.client'):</h5>
        <p class="card-text">{{ session('lang') == 'en' ? $book->client->name_en : $book->client->name_ar }}</p>

        <h5 class="card-title">@lang('admin.day'):</h5>
        <p class="card-text">{{ $book->day }}</p>

        <h5 class="card-title">@lang('admin.fees'):</h5>
        <p class="card-text">{{ $book->fees }}</p>

        <h5 class="card-title">@lang('admin.confirm'):</h5>
        <p class="card-text">{{ $book->confirm }}</p>

        <h5 class="card-title">@lang('admin.time'):</h5>
        <p class="card-text">{{ $book->time }}</p>

    </div>
</div>
