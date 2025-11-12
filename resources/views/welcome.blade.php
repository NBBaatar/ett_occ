<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Эрдэнэс Тавантолгой ХК</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex: 1 0 auto;
        }

        .footer {
            flex-shrink: 0;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .gate-icon {
            background: rgb(231, 137, 50);
        }

        .gate-number {
            background: rgb(231, 137, 50);
        }

        .footer-gradient {
            background: rgb(231, 137, 50);
            position: sticky;
            bottom: 0;
            width: 100%;
        }

        .header-color {
            color: rgb(231, 137, 50);
        }

        .button-gradient {
            background: rgb(231, 137, 50);
        }

        .button-gradient:hover {
            background: rgb(211, 117, 30);
        }
    </style>
</head>

<body class="font-sans bg-gradient-to-br from-gray-100 to-amber-100">
<div class="main-content">
    <!-- Header -->
    <div class="px-4 py-2 mx-auto w-full">
        <div class="sm:flex items-stretch justify-between grow py-2 px-2">
            <div class="flex items-center gap-x-4">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}"
                         alt="Эрдэнэс Тавантолгой ХК лого"
                         class="h-16 w-16 md:h-20 md:w-20 object-contain">
                </div>
                <!-- Нэр -->
                <div class='drop-shadow-lg'>
                    <h1 class='header-color font-bold text-2xl md:text-3xl lg:text-4xl'>"Эрдэнэс Тавантолгой" ХК</h1>
                </div>
            </div>
            <div class="flex items-center lg:shrink-0 lg:flex-nowrap">
                <div class="relative flex items-center lg:ml-4 sm:mr-0 mr-2">
                </div>
                <div class="relative lg:hidden flex items-center sm:ml-1 ml-auto">
                    <a href="javascript:void(0)"
                       class="flex items-center justify-center w-12 h-12 text-base font-medium leading-normal text-center align-middle transition-colors duration-150 ease-in-out bg-white border border-solid shadow-md cursor-pointer rounded-2xl text-stone-500 border-stone-200 hover:bg-gray-100 active:bg-gray-200 focus:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                    </a>
                </div>
                <div class="relative flex item-center ml-1 lg:ml-2">
                    <a href="/indexed"
                       class="flex items-center justify-center w-12 h-12 text-base font-medium leading-normal text-center align-middle transition-colors duration-150 ease-in-out bg-white border border-solid shadow-md cursor-pointer rounded-2xl text-stone-500 border-stone-200 hover:bg-gray-100 active:bg-gray-200 focus:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Title -->
    <div class="flex justify-center mt-4">
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">ШАЛГАН НЭВТРҮҮЛЭХ ЦЭГ</h1>
            <p class="text-gray-600 max-w-lg mx-auto">"Эрдэнэс Тaвантолгой ХК" Салбарын шалган нэвтрүүлэх цэгүүдийн байршил</p>
        </div>
    </div>

    <!-- Cards Container -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
            <!-- Card 1 -->
            <div class="card-hover w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl border-0 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-blue-100 opacity-50"></div>
                <div class="absolute -bottom-8 -left-8 w-16 h-16 rounded-full bg-amber-100 opacity-60"></div>

                <!-- Icon and Title -->
                <div class="flex items-center gap-x-4 mb-4">
                    <div class="gate-icon w-12 h-12 rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Шалган нэвтрүүлэх цэг</h3>
                        <div class="gate-number inline-block px-2 py-1 rounded-md text-white text-xs font-bold mt-1">
                            №1
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-4 flex items-center">
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                    <span class="text-sm text-gray-600">Идэвхтэй</span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <p class="text-gray-600 text-sm leading-relaxed">Уурхайн үндсэн хаалга. Ажилтнууд болон зочид хүлээн авах цэг.</p>
                </div>

                <!-- Button -->
                <a href="/post/6" class="block w-full py-3 px-4 button-gradient text-white text-center font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                    Нэвтрэх
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <!-- Card 2 -->
            <div class="card-hover w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl border-0 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-blue-100 opacity-50"></div>
                <div class="absolute -bottom-8 -left-8 w-16 h-16 rounded-full bg-amber-100 opacity-60"></div>

                <!-- Icon and Title -->
                <div class="flex items-center gap-x-4 mb-4">
                    <div class="gate-icon w-12 h-12 rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Шалган нэвтрүүлэх цэг</h3>
                        <div class="gate-number inline-block px-2 py-1 rounded-md text-white text-xs font-bold mt-1">
                            №2
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-4 flex items-center">
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                    <span class="text-sm text-gray-600">Идэвхтэй</span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <p class="text-gray-600 text-sm leading-relaxed">Цанхийн зүүн уурхай. Ажилтнууд болон зочид хүлээн авах цэг.</p>
                </div>

                <!-- Button -->
                <a href="/post/1" class="block w-full py-3 px-4 button-gradient text-white text-center font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                    Нэвтрэх
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <!-- Card 3 -->
            <div class="card-hover w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl border-0 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-green-100 opacity-50"></div>
                <div class="absolute -bottom-8 -left-8 w-16 h-16 rounded-full bg-purple-100 opacity-60"></div>

                <!-- Icon and Title -->
                <div class="flex items-center gap-x-4 mb-4">
                    <div class="gate-icon w-12 h-12 rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Шалган нэвтрүүлэх цэг</h3>
                        <div class="gate-number inline-block px-2 py-1 rounded-md text-white text-xs font-bold mt-1">
                            №5
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-4 flex items-center">
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                    <span class="text-sm text-gray-600">Идэвхтэй</span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <p class="text-gray-600 text-sm leading-relaxed">Бортээг уурхайн бүс. Зөвхөн зөвшөөрөлтэй ажилтнууд нэвтрэх боломжтой.</p>
                </div>

                <!-- Button -->
                <a href="/post/2" class="block w-full py-3 px-4 button-gradient text-white text-center font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                    Нэвтрэх
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="card-hover w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl border-0 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-purple-100 opacity-50"></div>
                <div class="absolute -bottom-8 -left-8 w-16 h-16 rounded-full bg-blue-100 opacity-60"></div>

                <!-- Icon and Title -->
                <div class="flex items-center gap-x-4 mb-4">
                    <div class="gate-icon w-12 h-12 rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Шалган нэвтрүүлэх цэг</h3>
                        <div class="gate-number inline-block px-2 py-1 rounded-md text-white text-xs font-bold mt-1">
                            №14
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-4 flex items-center">
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                    <span class="text-sm text-gray-600">Идэвхтэй</span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <p class="text-gray-600 text-sm leading-relaxed">Цанхийн баруун уурхай. Ажилтнууд болон зочид хүлээн авах цэг</p>
                </div>

                <!-- Button -->
                <a href="/post/3" class="block w-full py-3 px-4 button-gradient text-white text-center font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                    Нэвтрэх
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Card 5 -->
            <div class="card-hover w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl border-0 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-amber-100 opacity-50"></div>
                <div class="absolute -bottom-8 -left-8 w-16 h-16 rounded-full bg-green-100 opacity-60"></div>

                <!-- Icon and Title -->
                <div class="flex items-center gap-x-4 mb-4">
                    <div class="gate-icon w-12 h-12 rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Шалган нэвтрүүлэх цэг</h3>
                        <div class="gate-number inline-block px-2 py-1 rounded-md text-white text-xs font-bold mt-1">
                            №7
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-4 flex items-center">
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                    <span class="text-sm text-gray-600">Идэвхтэй</span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <p class="text-gray-600 text-sm leading-relaxed">Нүүрс ачилт логистикийн ажилтнууд нэвтрэх цэг.</p>
                </div>

                <!-- Button -->
                <a href="/post/4" class="block w-full py-3 px-4 button-gradient text-white text-center font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                    Нэвтрэх
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Card 6 -->
            <div class="card-hover w-full max-w-sm rounded-2xl bg-white p-6 shadow-xl border-0 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-red-100 opacity-50"></div>
                <div class="absolute -bottom-8 -left-8 w-16 h-16 rounded-full bg-blue-100 opacity-60"></div>

                <!-- Icon and Title -->
                <div class="flex items-center gap-x-4 mb-4">
                    <div class="gate-icon w-12 h-12 rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Шалган нэвтрүүлэх цэг</h3>
                        <div class="gate-number inline-block px-2 py-1 rounded-md text-white text-xs font-bold mt-1">
                            №15
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-4 flex items-center">
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                    <span class="text-sm text-gray-600">Идэвхтэй</span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <p class="text-gray-600 text-sm leading-relaxed">Цанхийн зүүн уурхай зүүн хэсэг.</p>
                </div>

                <!-- Button -->
                <a href="/post/5" class="block w-full py-3 px-4 button-gradient text-white text-center font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                    Нэвтрэх
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer-gradient text-white text-center py-4 footer">
    <div class="container mx-auto">
        <p class="text-center text-white text-sm">
            &copy; <script>document.write(new Date().getFullYear())</script> - Шуурхай удирдлага мэдээллийн технологийн газар
        </p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>
