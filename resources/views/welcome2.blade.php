<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Эрдэнэс Тавантолгой ХК - Карт уншигч</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        .custom-primary {
            color: rgb(231, 137, 50);
        }
        .custom-primary-bg {
            background-color: rgb(231, 137, 50);
        }
        .custom-primary-border {
            border-color: rgb(231, 137, 50);
        }
        .custom-primary-light {
            background-color: rgba(231, 137, 50, 0.1);
        }
        .custom-primary-gradient {
            background: linear-gradient(to right, rgb(231, 137, 50), rgb(200, 110, 30));
        }
        .custom-primary-gradient-footer {
            background: linear-gradient(to right, rgb(231, 137, 50), rgb(200, 110, 30));
        }
        .custom-primary-light-text {
            color: rgba(231, 137, 50, 0.8);
        }
    </style>
</head>

<body class="font-sans bg-gradient-to-br from-amber-50 to-amber-100 min-h-screen flex flex-col">
<!-- Header -->
<header class=" text-white shadow-lg">
    <div class="container mx-auto px-4 py-3">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center mb-4 md:mb-0">
                {{--                <div class="bg-white rounded-full p-2 mr-3 shadow-md">--}}
                {{--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
                {{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />--}}
                {{--                    </svg>--}}
                {{--                </div>--}}
                <div class="bg-white rounded-full p-4 mr-3 shadow-md">
                    <img src="{{ asset('images/logo.png') }}" alt="Эрдэнэс Тавантолгой ХК лого" class="h-10 w-auto">
                </div>
                <div>
                    <h1 class="custom-primary-light-text text-2xl font-bold">"Эрдэнэс Тавантолгой" ХК</h1>
                    <p class="custom-primary-light-text text-sm">Карт уншигч систем</p>
                </div>
            </div>

            <div class="flex items-center space-x-2">
                <a href="/indexed" class="flex items-center justify-center w-10 h-10 rounded-full bg-amber-600 hover:bg-amber-500 transition-colors" title="Индексжүүлсэн">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
                    </svg>
                </a>

                <div class="relative">
                    <button id="menu-btn" class="flex items-center justify-center w-10 h-10 rounded-full bg-amber-600 hover:bg-amber-500 transition-colors" title="Тохиргоо">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                        </svg>
                    </button>

                    <div id="dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-10 border border-gray-200">
                        <a href="/login" class="block px-4 py-3 text-sm text-gray-700 hover:bg-amber-50 rounded-t-lg transition-colors">Системд нэвтрэх</a>
{{--                        <a href="/tech" class="block px-4 py-3 text-sm text-gray-700 hover:bg-amber-50 rounded-b-lg transition-colors">Техник бүртгэлд нэвтрэх</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Card Reader Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border custom-primary-border">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold custom-primary mb-2">КАРТ УНШУУЛАХ</h2>
                <p class="text-gray-600">Та картаа уншуулна уу</p>
            </div>

            <div class="relative">
                <div class="flex justify-center mb-4">
                    <div class="custom-primary-light p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 custom-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                </div>

                <input
                    class="w-full py-4 px-6 text-lg text-center border-2 border-amber-300 rounded-lg focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none transition-colors"
                    id="password" type="password" placeholder="Карт уншуулах..." maxlength="10" autofocus>

                <div class="mt-4 text-center">
                    <div class="inline-flex items-center custom-primary-light custom-primary px-4 py-2 rounded-full text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Карт уншигдахыг хүлээж байна...
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Results -->
        <div id='search_list' class="bg-white rounded-xl shadow-lg p-6 mb-8 border custom-primary-border w-full">
            <div class="text-center text-gray-500 py-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p>Карт уншигдсан мэдээлэл</p>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="text-white py-4 mt-8">
    <div class="container mx-auto px-4 text-center">
        <p class="text-sm custom-primary-light-text">
            &copy; <span id="current-year"></span> - Шуурхай удирдлага мэдээллийн технологийн газар
        </p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>

<script>
    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Dropdown menu functionality
    window.addEventListener('DOMContentLoaded', () => {
        const menuBtn = document.querySelector('#menu-btn');
        const dropdown = document.querySelector('#dropdown');

        menuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', () => {
            dropdown.classList.add('hidden');
        });
    });

    // Card reading functionality
    $(document).ready(function() {
        $('#password').on("keydown", function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                var query = $(this).val();

                // Show loading state
                $('#search_list').html(`
                        <div class="text-center py-8">
                            <div class="inline-block animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-amber-500 mb-3"></div>
                            <p class="text-gray-600">Картын мэдээлэл уншиж байна...</p>
                        </div>
                    `);

                $.ajax({
                    url: 'search2',
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'search': query
                    },
                    success: function(data) {
                        $('#search_list').html(data);
                        document.getElementById("password").value = '';
                    }
                });

                $.ajax({
                    url: 'search',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'search': query,
                    },
                    success: function(data) {
                        document.getElementById("password").value = '';
                    }
                });

                $.ajax({
                    url: 'logs',
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        var obj = data;
                        var tableContent = '';

                        for (var i = 0; i < obj.length; i++) {
                            tableContent += '<tr class="border-b border-gray-100 hover:bg-amber-50 transition-colors">';
                            tableContent += '<td class="py-2 px-3">' + obj[i].fname + '</td>';
                            tableContent += '<td class="py-2 px-3">' + obj[i].lname + '</td>';
                            tableContent += '<td class="py-2 px-3">' + obj[i].created_at + '</td>';
                            tableContent += '<td class="py-2 px-3">' + '<img src="storage/' + obj[i].photo +
                                '" width="40" height="50" class="rounded">' + '</td>';
                            tableContent += '</tr>';
                        }

                        $('#all_logs tbody').html(tableContent);
                    }
                });

                $.ajax({
                    url: 'logs_error',
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(data_error){
                        var obj_error = data_error;
                        var tableContent1 = '';

                        for (var i = 0; i < obj_error.length; i++) {
                            tableContent1 += '<tr class="border-b border-gray-100 hover:bg-amber-50 transition-colors">';
                            tableContent1 += '<td class="py-2 px-3">' + obj_error[i].card_number + '</td>';
                            tableContent1 += '<td class="py-2 px-3">' + (obj_error[i].is_inserted ? 'Оруулсан' : 'Оруулаагүй') + '</td>';
                            tableContent1 += '<td class="py-2 px-3">' + obj_error[i].created_at + '</td>';
                            tableContent1 += '</tr>';
                        }

                        $('#error_logs tbody').html(tableContent1);
                    }
                });
            }
        });

        // Keep focus on input field
        $('#password').focus();
    });
</script>
</body>

</html>
