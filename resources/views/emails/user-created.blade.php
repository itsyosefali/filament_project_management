@component('mail::message')
# Welcome, {{ $user->name }}!

We (اتحاد طلبة كلية التقنية الإلكترونية) are excited to have you on board!
Your account is ready, and we can’t wait to see you in action.

@component('mail::button', ['url' => url('/')])
Join Us Now
@endcomponent

@component('mail::panel')
**Pro Tip:** Personalize your profile and explore our resources to get the most out of our platform.
@endcomponent

Best Regards,
{{ config('app.name') }}
@endcomponent

