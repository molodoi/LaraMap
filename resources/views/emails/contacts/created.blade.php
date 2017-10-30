@component('mail::message')
# Mail

Hello {{ $msg->name }} your email is {{ $msg->email }}

Your message :
@component('mail::panel')
{{ $msg->body }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
