@component('mail::message')
    # Introduction

    <h1>Reset Your Password</h1>

    <p>Use the following OTP to reset your password:</p>

    <h2>{{ $otp }}</h2>

    <p>If you did not request a password reset, no further action is required.</p>

    @component('mail::button', ['url' => ''])
        Reset Password
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

