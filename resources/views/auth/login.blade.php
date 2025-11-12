@extends('layouts.auth')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-50 to-amber-50 dark:from-gray-900 dark:to-gray-800 py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl border border-orange-100 dark:border-gray-700 w-full max-w-md transform transition-all duration-300 hover:shadow-2xl">
            <div class="max-w-md w-full space-y-8">
                <div class="text-center">
                    <!-- Лого -->
                    <div class="flex justify-center mb-6">
                        <div class="bg-white dark:bg-gray-700 rounded-full p-4 mr-3 shadow-md">
                            <img src="{{ asset('images/logo.png') }}" alt="Эрдэнэс Тавантолгой ХК" class="h-10 w-auto">
                        </div>
                    </div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-[rgb(231,137,50)] to-amber-600 bg-clip-text text-transparent">
                        Нэвтрэх
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Системд тавтай морил</p>
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-400 px-4 py-3 rounded-xl">
                        <ul class="text-sm">
                            @foreach ($errors->all() as $error)
                                <li class="flex items-center">
                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Цахим хаяг</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none transition-colors duration-300 group-focus-within:text-[rgb(231,137,50)]">
                                    <i class="fas fa-envelope text-gray-400 dark:text-gray-500 group-focus-within:text-[rgb(231,137,50)]"></i>
                                </div>
                                <input id="email" name="email" type="email" required
                                       value="{{ old('email') }}"
                                       class="py-3 px-4 pl-10 block w-full border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-[rgb(231,137,50)] focus:border-transparent transition duration-300 hover:border-orange-200 dark:hover:border-amber-600 shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                       placeholder="example@email.com">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Нууц үг</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none transition-colors duration-300 group-focus-within:text-[rgb(231,137,50)]">
                                    <i class="fas fa-lock text-gray-400 dark:text-gray-500 group-focus-within:text-[rgb(231,137,50)]"></i>
                                </div>
                                <input id="password" name="password" type="password" required
                                       class="py-3 px-4 pl-10 block w-full border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-[rgb(231,137,50)] focus:border-transparent transition duration-300 hover:border-orange-200 dark:hover:border-amber-600 shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                       placeholder="Нууц үг">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <!-- Remember me checkbox -->
                        <div class="flex items-center">
                            <input id="remember-me" name="remember" type="checkbox"
                                   class="h-4 w-4 text-[rgb(231,137,50)] focus:ring-[rgb(231,137,50)] border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Намайг сана</label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-[rgb(231,137,50)] hover:text-amber-700 dark:hover:text-amber-400 transition duration-300">Нууц үгээ мартсан?</a>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                                class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-gradient-to-r from-[rgb(231,137,50)] to-amber-600 hover:from-[rgb(231,120,30)] hover:to-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[rgb(231,137,50)] dark:focus:ring-offset-gray-800 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-sign-in-alt text-amber-200 group-hover:text-amber-100 transition duration-300"></i>
                            </span>
                            Нэвтрэх
                        </button>
                    </div>

                    <!-- Бүртгүүлэх линк -->
                    <div class="text-center pt-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Бүртгэлгүй юу?
                            <a href="#" class="font-semibold text-[rgb(231,137,50)] hover:text-amber-700 dark:hover:text-amber-400 transition duration-300">
                                Бүртгүүлэх
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Dark mode toggle functionality
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        // Check for saved theme preference or prefer OS setting
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        });
    </script>
@endsection
