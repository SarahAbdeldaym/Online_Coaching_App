@component('mail::message')
# Reset Account
Welcome {{ $data['data']->name }} <br>

@component('mail::button', ['url' => adminUrl('reset/password/'.$data['token'])])
Click Here To Reset Your Password
@endcomponent
Or <br>
copy this link
<a href="{{ adminUrl('reset/password/'.$data['token']) }}">{{ adminUrl('reset/password/'.$data['token']) }}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
