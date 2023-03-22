{{-- <p>Hello {{ $user->first_name }},</p>

<p>Thank you for signing up for Mayalu. Please click the button below to verify your email address and access the home feed:</p>

<a href="{{ $signedUrl }}" style="display: inline-block; background-color: #3490dc; color: #ffffff; padding: 12px 24px; border-radius: 4px; text-decoration: none;">Verify Email Address</a>

<p>If you did not sign up for our dating website, please ignore this email.</p>

<p>Thanks,</p>

<p>The Mayalu Website Team</p> --}}
<p>Hi {{ $user->first_name }},</p>

<p>Thank you for registering on our website. Please click on the following link to verify your email address:</p>

<p><a href="{{ $verification_url}}">Verify Email</a></p>

<p>If you did not register on our website, please ignore this email.</p>
