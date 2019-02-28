 @component('mail::message')
# Welcome to RHEA app

**You are added as a Patient.**

Thanks for using our app. We really appreciate it. Let us know if we can do more to please you!

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
