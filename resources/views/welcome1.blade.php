<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))--}}
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
{{--    @else--}}
{{--    @endif--}}
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Эрдэнэс Тавантолгой ХК</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

</head>

{{-- <body class="font-sans antialiased dark:bg-black dark:text-white/50"> --}}

<body class="font-sans bg-gradient-to-l from-gray-100 to-amber-100 ">
    <div class="px-2 mb-1  mx-auto w-11/12 ">
        <div class="sm:flex items-stretch justify-between grow lg:mb-0  py-1 px-1">
            <div class="flex flex-col flex-wrap justify-center mb-1 mr-3 lg:mb-0">
                <div class='drop-shadow-lg font-mono text-center'>
                    <h1 class='text-indigo-900 font-sans font-bold text-4xl p-2 m-2'>"Эрдэнэс Тавантолгой" ХК</h1>
                </div>
            </div>
            <div class="flex items-center lg:shrink-0 lg:flex-nowrap">
                <div class="relative flex items-center lg:ml-4 sm:mr-0 mr-2">
                </div>
                <div class="relative lg:hidden flex items-center sm:ml-1 ml-auto">
                    <a href="javascript:void(0)"
                        class="flex items-center justify-center w-12 h-12 text-base font-medium leading-normal text-center align-middle transition-colors duration-150 ease-in-out bg-transparent border border-solid shadow-none cursor-pointer rounded-2xl text-stone-500 border-stone-200 hover:text-primary active:text-primary focus:text-primary"
                        onclick="(function(){document.querySelector('.group\\/sidebar').classList.toggle('-translate-x-full');})();">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                    </a>
                </div>
                <div class="relative flex item-center ml-1 lg:ml-2">
                    <a href="/indexed"
                        class="flex items-center justify-center w-12 h-12 text-base font-medium leading-normal text-center align-middle transition-colors duration-150 ease-in-out bg-transparent border border-solid shadow-none cursor-pointer rounded-2xl text-stone-500 border-stone-200 hover:text-primary active:text-primary focus:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" /></svg>
                    </a>
                </div>
                <div class="relative flex items-center ml-1 lg:ml-2">
                    <button id="menu-btn" class="flex items-center justify-center w-12 h-12 text-base font-medium leading-normal text-center align-middle transition-colors duration-150 ease-in-out bg-transparent border border-solid shadow-none cursor-pointer rounded-2xl text-stone-500 border-stone-200 hover:text-primary active:text-primary focus:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                        </svg>
                        <div id="dropdown" class="hidden flex-col rounded mt-60 p-2 text-sm w-32 border border-1">
                            <a href="/app"  class="block px-4 py-2 text-md text-gray-700" >Цахим бүртгэлд нэвтрэх</a>
                            <a href="/tech" class="block px-4 py-2 text-md text-gray-700">Техник бүртгэлд нэвтрэх</a>
                        </div>
                    </button>

                    {{--                    <a href="/app"--}}
                    {{--                        class="flex items-center justify-center w-12 h-12 text-base font-medium leading-normal text-center align-middle transition-colors duration-150 ease-in-out bg-transparent border border-solid shadow-none cursor-pointer rounded-2xl text-stone-500 border-stone-200 hover:text-primary active:text-primary focus:text-primary">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
                    {{--                            stroke="currentColor" class="w-6 h-6">--}}
                    {{--                            <path stroke-linecap="round" stroke-linejoin="round"--}}
                    {{--                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z">--}}
                    {{--                            </path>--}}
                    {{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">--}}
                    {{--                            </path>--}}
                    {{--                        </svg>--}}
                    {{--                    </a>--}}
                </div>
            </div>
            </div>
        </div>

    <div class="justify-center flex items-center  p-2  sm:items-center sm:pt-0">
        <div class="mb-1 p-2">
            <label
                class="focus-within:ring-2 focus-within:ring-blue-500 justify-center block text-gray-700 text-lg font-bold mb-4"
                for="password">
                ТА КАРТАА УНШУУЛНА УУ
            </label>
            <input
                class="focus:border-blue-400 shadow appearance-none border border-sky-500 rounded w-full py-4 px-12 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                id="password" type="password" placeholder="" maxlength="10">
        </div>
    </div>
    <div id='search_list' class="justify-center flex items-center  p-4  sm:items-center sm:pt-0"></div>
{{--    Сүүлд уншигдсан байддал болон уншигдаагүй хэсгийн код--}}
{{--   <div class="grid grid-cols-2 gap-4 p-4 overflow-y-scroll max-h-[300px] border-collapse border border-gray-300 order-last">--}}
{{--      <label class="flex justify-center text-lg font-bold ">Сүүлд уншигдсан карт:</label>--}}
{{--      <table id="all_logs" class="overflow-y-scroll shadow-lg w-full border-collapse border border-gray-300 table-auto table-auto overflow-scroll w-full p-4 gap-2">--}}
{{--      <label class="flex justify-center text-lg font-bold">Сүүлд уншигдаагүй картын мэдээлэл:</label>--}}
{{--      <table id="error_logs" class="overflow-y-scroll shadow-lg w-full border-collapse border border-gray-300 table-auto table-auto overflow-scroll w-full p-4 gap-2">--}}
{{--   </div>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const menuBtn = document.querySelector('#menu-btn');
            const dropdown = document.querySelector('#dropdown');
            menuBtn.addEventListener('click', () => {
                if(dropdown.classList.contains('hidden')) {
                    dropdown.classList.remove('hidden');
                    dropdown.classList.add('flex');
                }else{
                    dropdown.classList.remove('flex');
                    dropdown.classList.add('hidden');
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {

            $('#password').on("keydown", function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    var query = $(this).val();
                    $.ajax({
                            url: 'search1',
                            type: 'GET',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'search': query
                            },
                            success: function(data) {
                                $('#search_list').html(data);
                                document.getElementById("password").value = '';
                            }
                        }),
                        $.ajax({
                            url: 'search',
                            type: 'POST',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'search': query,
                            },
                            success: function(data) {
                                // $('#all_list').html(data);
                                document.getElementById("password").value = '';
                            }
                        }),
                        $.ajax({
                            url: 'logs',
                            type: 'GET',
                            data: {
                            '_token': '{{ csrf_token() }}',
                            },
                              success: function(data) {
                                var obj = data;
                                var tableContent = '';
                                // console.log("The Logged Data :  ", obj);
                                for (var i = 0; i < obj.length; i++) {
                                    tableContent += '<tr>';
                                    tableContent += '<td class="border border-gray-300 p-4 m-4">' + obj[i].fname + '</td>';
                                    tableContent += '<td class="border border-gray-300 p-4 m-4">' + obj[i].lname + '</td>';
                                    tableContent += '<td class="border border-gray-300 p-4 m-4">' + obj[i].created_at + '</td>';
                                    tableContent += '<td class="border border-gray-300 p-4 m-4">' + '<img src="storage/' + obj[i].photo +
                                        '" width="50" height="70">' + '</td>';
                                    tableContent += '</tr>';
                                    }
                                    $('#all_logs').append(tableContent);
                              }
                        }),
                         $.ajax({
                          url: 'logs_error',
                          type: 'GET',
                          data: {
                              '_token': '{{ csrf_token() }}',
                          },
                          success: function(data_error){
                            var obj_error = data_error;
                            var tableContent1 = '';
                            // console.log("The Logged Data In Error:  ", obj_error);
                            for (var i = 0; i < obj_error.length; i++) {
                                tableContent1 += '<tr>';
                                tableContent1 += '<td class="border border-gray-300 p-4 m-4">' + obj_error[i].card_number + '</td>';
                                tableContent1 += '<td class="border border-gray-300 p-4 m-4">' + obj_error[i].is_inserted + '</td>';
                                tableContent1 += '<td class="border border-gray-300 p-4 m-4">' + obj_error[i].created_at + '</td>';
                                tableContent1 += '</tr>';
                            }
                            $('#error_logs').append(tableContent1);
                          }
                      })
                }
            });
        });
        $('#password').focus();
    </script>
    <footer
        class="text-3xl text-white text-center
             border-t-4 border-slate-400
             fixed
             inset-x-0
             bottom-0
             p-4">
        <script type="text/javascript">
            var date = new Date(),
                year = date.getFullYear(),
                text = "&copy;" + year + " - Шуурхай удирдлага мэдээллийн технологийн газар",
                html = '<p class="text-center text-gray-500 text-xs">' + text + '</p>';
            document.write(html);
        </script>
    </footer>
</body>

</html>
