@component('mail::message')
A new message from {{ $name }} with email {{ $email }}
<br>
{{ $message }}

@endcomponent
