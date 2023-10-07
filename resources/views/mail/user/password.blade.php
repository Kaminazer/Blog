<x-mail::message xmlns:x-mail="">
# Welcome {{ $user->name }}!

Thank you for registering at {{ config('app.name') }}.

    You can now login with your email and password.

    It is recommended to change your password after logging in.

    This is your email: {{ $user->email }}

    This is your password: {{ $password }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
