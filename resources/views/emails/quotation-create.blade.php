@component('mail::message')
# Pharmacy

Your quotation is ready.

@component('mail::button', ['url' => $url])
Click Here to Show
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
