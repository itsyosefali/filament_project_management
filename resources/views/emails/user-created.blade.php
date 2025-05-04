@component('mail::message')

<img src="{{ asset('images/logocuet.png') }}" alt="شعار الاتحاد" width="80" style="display: block; margin: 0 auto 20px;">

# مرحباً {{ $user->name }}!

يسرنا انضمامك إلى اتحاد طلبة كلية التقنية الإلكترونية وتهانينا على إنشاء حسابك الجديد. بانضمامك إلينا، نسعى سويًا إلى:
- تطوير مهاراتنا الأكاديمية
- تعزيز أواصر التعاون والتواصل بين الطلبة

@component('mail::button', ['url' => url('/')])
ابدأ الآن
@endcomponent

@component('mail::panel')
**نصيحة هامة:**
- قم بإكمال ملفك الشخصي.
- غيّر كلمة المرور الافتراضية للحصول على أفضل استفادة.
@endcomponent

نتمنى لك التوفيق والنجاح،
{{ config('app.name') }}

إذا كان لديك أي استفسارات أو تواجه أي مشكلة، يمكنك التواصل مع:
[@et_dev](https://t.me/et_dev)

@endcomponent

