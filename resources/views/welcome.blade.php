<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>اتحاد طلبة كلية التقنية الإلكترونية</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Instrument Sans', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
        <style type="text/tailwindcss">
            .gradient-background {
                @apply bg-gradient-to-r from-blue-500 to-blue-600;
            }
            .text-gradient {
                @apply bg-gradient-to-r from-blue-500 to-blue-600 bg-clip-text text-transparent;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-50 text-gray-900">
        <div class="min-h-screen flex flex-col items-center">
            <header class="w-full py-6 px-6 sm:px-10 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logocuet.png') }}" class="w-8 h-8" alt="Logo">
                    <span class="text-xl font-semibold">اتحاد طلبة كلية التقنية الإلكترونية</span>
                </div>

                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded-md text-sm font-medium">
                                لوحة التحكم
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded-md text-sm font-medium">
                                تسجيل الدخول
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded-md text-sm font-medium">
                                    إنشاء حساب
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </header>

            <main class="flex-1 flex flex-col items-center justify-center w-full px-6 sm:px-10 py-12">
                <div class="max-w-4xl w-full">
                    <div class="text-center mb-12">
                        <h1 class="text-4xl md:text-5xl font-bold mb-4">
                            أهلاً وسهلاً بكم في
                            <span class="text-gradient">اتحاد طلبة كلية التقنية الإلكترونية</span>
                        </h1>
                        <p class="text-xl text-gray-600 max-w-4xl mx-auto">
                            نسعى لتوفير بيئة طلابية متميزة تعزز التعاون وتطور المهارات الأكاديمية والاجتماعية لطلبة الكلية.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                            <div class="flex items-center mb-4">
                                <svg class="w-6 h-6 text-blue-600 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V7C19 5.89543 18.1046 5 17 5H15
                                             M9 5C9 6.10457 9.89543 7 11 7H13C14.1046 7 15 6.10457 15 5M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5
                                             M12 12H15M12 16H15M9 12H9.01M9 16H9.01"></path>
                                </svg>
                                <h2 class="text-lg font-semibold">إدارة الفعاليات</h2>
                            </div>
                            <p class="text-gray-600">
                                تنظيم الأنشطة والمسابقات الطلابية والإشراف على سيرها لضمان التفاعل والنجاح.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                            <div class="flex items-center mb-4">
                                <svg class="w-6 h-6 text-blue-600 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 20H22V18C22 16.3431 20.6569 15 19 15C18.0444 15 17.1931 15.4468 16.6438 16.1429M17 20H7M17 20V18
                                             C17 17.3438 16.8736 16.717 16.6438 16.1429M7 20H2V18C2 16.3431 3.34315 15 5 15C5.95561 15 6.80686 15.4468 7.35625 16.1429
                                             M7 20V18C7 17.3438 7.12642 16.717 7.35625 16.1429M7.35625 16.1429C8.0935 14.301 9.89482 13 12 13C14.1052 13 15.9065 14.301 16.6438 16.1429
                                             M15 7C15 8.65685 13.6569 10 12 10C10.3431 10 9 8.65685 9 7C9 5.34315 10.3431 4 12 4
                                             C13.6569 4 15 5.34315 15 7ZM21 10C21 11.1046 20.1046 12 19 12
                                             C17.8954 12 17 11.1046 17 10C17 8.89543 17.8954 8 19 8
                                             C20.1046 8 21 8.89543 21 10ZM7 10C7 11.1046 6.10457 12 5 12
                                             C3.89543 12 3 11.1046 3 10C3 8.89543 3.89543 8 5 8
                                             C6.10457 8 7 8.89543 7 10Z"></path>
                                </svg>
                                <h2 class="text-lg font-semibold">تعزيز العمل الجماعي</h2>
                            </div>
                            <p class="text-gray-600">
                                توفير منصات تواصل وتنظيم لقاءات دورية لاستعراض الأفكار والأنشطة الجديدة.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
                            <div class="flex items-center mb-4">
                                <svg class="w-6 h-6 text-blue-600 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 19V13C9 11.8954 8.10457 11 7 11H5C3.89543 11 3 11.8954 3 13V19C3 20.1046 3.89543 21 5 21H7
                                             C8.10457 21 9 20.1046 9 19ZM9 19V9C9 7.89543 9.89543 7 11 7H13C14.1046 7 15 7.89543 15 9V19
                                             M9 19C9 20.1046 9.89543 21 11 21H13C14.1046 21 15 20.1046 15 19M15 19V5
                                             C15 3.89543 15.8954 3 17 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H17
                                             C15.8954 21 15 20.1046 15 19Z"></path>
                                </svg>
                                <h2 class="text-lg font-semibold">متابعة التطور الأكاديمي</h2>
                            </div>
                            <p class="text-gray-600">
                                دعم الطلبة عبر تنظيم الدورات والورش وتوفير الإرشاد الأكاديمي لضمان تحقيق الأهداف.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <a href="/admin" class="gradient-background text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 text-lg">
                            الوصول إلى لوحة التحكم
                        </a>
                        <p class="mt-4 text-sm text-gray-500">
                            راجع التحديثات والأنشطة من خلال لوحة تحكم الإدارة الخاصة بالاتحاد.
                        </p>
                    </div>
                </div>
            </main>

            <footer class="w-full py-8 px-6 sm:px-10">
                <div class="max-w-4xl mx-auto text-center">
                    <p class="text-gray-600">
                        © {{ date('Y') }} اتحاد طلبة كلية التقنية الإلكترونية. جميع الحقوق محفوظة.
                    </p>
                    <p class="text-sm text-gray-500 mt-2">
                        تم التطوير باستخدام Laravel و Filament
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>
