@component('mail::message')
    # Welcome to SheetThis!

    Thanks for signing up as an administrator. Please verify your email address to get started.

    @component('mail::button', ['url' => $url, 'color' => 'primary'])
        Verify Email Address
    @endcomponent

    If you didn't create an account with SheetThis, no further action is required.

    Thanks,<br>
    The SheetThis Team
@endcomponent
