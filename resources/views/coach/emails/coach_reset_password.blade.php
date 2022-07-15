@component('mail::message')
# Reset Account
Welcome {{ $data['data']->name_en }} <br>

@component('mail::button', ['url' => coachUrl('reset/password/'.$data['token'])])
Click Here To Reset Your Password
@endcomponent
Or <br>
copy this link
<a href="{{ coachUrl('reset/password/'.$data['token']) }}">{{ coachUrl('reset/password/'.$data['token']) }}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
