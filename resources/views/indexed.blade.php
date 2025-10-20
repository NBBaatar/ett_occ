<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Эрдэнэс Тавантолгой ХК</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif

    <style>
        :root {
            --primary-color: rgb(231, 137, 50);
            --primary-dark: rgb(200, 110, 30);
            --primary-light: rgb(245, 180, 120);
            --primary-bg: rgb(252, 245, 235);
        }

        .primary-bg {
            background-color: var(--primary-color);
        }

        .primary-text {
            color: var(--primary-color);
        }

        .primary-border {
            border-color: var(--primary-color);
        }

        .primary-dark-bg {
            background-color: var(--primary-dark);
        }

        .primary-light-bg {
            background-color: var(--primary-bg);
        }
    </style>
</head>

<body class="font-sans bg-gradient-to-br from-white to-amber-50">
<div class="px-3 mb-6 mx-auto w-11/12">
    <!-- Header Section -->
    <div class="sm:flex items-stretch justify-between grow lg:mb-0 py-5 px-5 rounded-2xl primary-light-bg">
{{--        <div class="flex flex-col flex-wrap justify-center mb-5 mr-3 lg:mb-0">--}}
{{--            <div class='drop-shadow-lg'>--}}
{{--                <h1 class='primary-text font-bold text-4xl p-4 m-4 text-center'>"Эрдэнэс Тавантолгой" ХК</h1>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="flex items-center gap-x-4">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/logo.png') }}"
                     alt="Эрдэнэс Тавантолгой ХК лого"
                     class="h-16 w-16 md:h-20 md:w-20 object-contain">
            </div>
            <!-- Нэр -->
            <div class='drop-shadow-lg'>
                <h1 class='primary-text font-bold text-4xl p-4 m-4 text-center'>"Эрдэнэс Тавантолгой" ХК</h1>
            </div>
        </div>
        <div class="flex items-center lg:shrink-0 lg:flex-nowrap">
            <div class="relative flex items-center lg:ml-4 sm:mr-0 mr-2">
            </div>
            <div class="relative lg:hidden flex items-center sm:ml-2 ml-auto">
                <a href="javascript:void(0)"
                   class="flex items-center justify-center w-12 h-12 text-base font-medium leading-normal text-center align-middle transition-colors duration-150 ease-in-out bg-transparent border border-solid shadow-none cursor-pointer rounded-2xl primary-text primary-border hover:bg-primary-light active:bg-primary-light focus:bg-primary-light"
                   onclick="(function(){document.querySelector('.group\\/sidebar').classList.toggle('-translate-x-full');})();">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>
                </a>
            </div>
            <div class="relative flex items-center ml-1 lg:ml-2">
                <a href="/"
                   class="flex items-center justify-center w-12 h-12 text-base font-medium leading-normal text-center align-middle transition-colors duration-150 ease-in-out bg-transparent border border-solid shadow-none cursor-pointer rounded-2xl primary-text primary-border hover:bg-primary-light active:bg-primary-light focus:bg-primary-light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="mt-8 p-6 rounded-2xl primary-light-bg shadow-md">
        <div class="justify-center flex items-center sm:items-center">
            <div class="p-1 flex justify-content-center items-center full-width" style="height: 50%">
                <iframe title="Haruuliin_Post_20250501" width="1000" height="673.5" src="https://app.powerbi.com/view?r=eyJrIjoiYWM0NTI4MmItYmZlMy00OTY4LThkM2MtMTZmYjcyOGZhODlkIiwidCI6IjFiYTNkMjY4LTg0MzYtNGExNS05NjI5LTZhNDM4ZjQ5NWYwNSIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="justify-center flex sm:items-center sm:pt-0 text-xl text-white text-center primary-dark-bg border-t-4 border-primary-dark fixed inset-x-0 bottom-0 p-4">
    <script type="text/javascript">
        var date = new Date(),
            year = date.getFullYear(),
            text = "&copy;" + year + " - Шуурхай удирдлага мэдээллийн технологийн газар",
            html = '<p class="text-center">' + text + '</p>';
        document.write(html);
    </script>
</footer>
</body>

</html>
