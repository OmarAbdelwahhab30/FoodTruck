@component('mail::message')
    # {{$data['subject']}}

    {{$data['body']}}

    Thanks!
    {{ config('app.name') }}
@endcomponent
