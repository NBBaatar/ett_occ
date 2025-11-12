<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Эрдэнэс Тавантолгой ХК - Салбарын дотоод хэрэгцээнд</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-50: rgb(253, 243, 232);
            --primary-100: rgb(250, 226, 204);
            --primary-200: rgb(247, 209, 176);
            --primary-300: rgb(244, 192, 148);
            --primary-400: rgb(238, 165, 99);
            --primary-500: rgb(231, 137, 50);
            --primary-600: rgb(208, 123, 45);
            --primary-700: rgb(185, 110, 40);
            --primary-800: rgb(162, 96, 35);
            --primary-900: rgb(139, 82, 30);
            --dark-bg: #121212;
            --dark-surface: #1E1E1E;
            --dark-card: #252525;
            --text-primary: #FFFFFF;
            --text-secondary: #B0B0B0;
        }

        /* Light Theme Variables */
        [data-theme="light"] {
            --dark-bg: #f5f5f5;
            --dark-surface: #ffffff;
            --dark-card: #ffffff;
            --text-primary: #333333;
            --text-secondary: #666666;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html, body {
            height: 100%;
        }

        body {
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a1a 25%, #1a1309 50%, #1a1a1a 75%, #0c0c0c 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            transition: background 0.3s ease, color 0.3s ease;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        [data-theme="light"] body {
            background: linear-gradient(135deg, #e0e0e0 0%, #f5f5f5 25%, #f8f2e9 50%, #f5f5f5 75%, #e0e0e0 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            color: var(--text-primary);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Main content wrapper */
        .main-content {
            flex: 1 0 auto;
            width: 100%;
        }

        /* Header Styles */
        header {
            background-color: rgba(18, 18, 18, 0.9);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }

        [data-theme="light"] header {
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-img {
            height: 50px;
            width: auto;
            object-fit: contain;
            filter: brightness(0) invert(1);
        }

        [data-theme="light"] .logo-img {
            filter: none;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-500);
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary-500);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--primary-500);
            transition: width 0.3s;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Шинэ навтирэх холбоосын загвар */
        .nav-login-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-700));
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 15px rgba(231, 137, 50, 0.3);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .nav-login-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-600), var(--primary-800));
            transition: all 0.4s ease;
            z-index: -1;
        }

        .nav-login-link:hover::before {
            width: 100%;
        }

        .nav-login-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(231, 137, 50, 0.5);
        }

        .nav-login-link:active {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(231, 137, 50, 0.4);
        }

        .nav-login-link i {
            font-size: 0.9rem;
            transition: transform 0.3s ease;
        }

        .nav-login-link:hover i {
            transform: translateX(3px);
        }

        .mobile-menu {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            padding: 180px 0 100px;
            text-align: center;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, rgba(231, 137, 50, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        [data-theme="light"] .hero::before {
            background: radial-gradient(circle at center, rgba(231, 137, 50, 0.2) 0%, transparent 70%);
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            background: linear-gradient(to right, var(--primary-400), var(--primary-600));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 40px;
            color: var(--text-secondary);
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(to right, var(--primary-500), var(--primary-700));
            color: white;
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(231, 137, 50, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(231, 137, 50, 0.4);
        }

        /* Modules Section */
        .modules {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--primary-500);
        }

        .section-title p {
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }
        .section-title span {
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Divider Styles */
        .fancy-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 40px 0;
            position: relative;
        }

        .divider-line {
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg,
            transparent 0%,
            var(--primary-500) 50%,
            transparent 100%);
            position: relative;
        }

        .divider-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 20px;
            position: relative;
            z-index: 2;
            box-shadow: 0 4px 15px rgba(231, 137, 50, 0.4);
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .divider-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(231, 137, 50, 0.6);
        }

        .divider-icon i {
            font-size: 1.5rem;
            color: white;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 4px 15px rgba(231, 137, 50, 0.4);
            }
            50% {
                box-shadow: 0 4px 20px rgba(231, 137, 50, 0.7);
            }
            100% {
                box-shadow: 0 4px 15px rgba(231, 137, 50, 0.4);
            }
        }

        /* Alternative Divider Style */
        .fancy-divider-alt {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 40px 0;
        }

        .divider-line-alt {
            height: 3px;
            background: linear-gradient(90deg,
            transparent 0%,
            var(--primary-300) 20%,
            var(--primary-500) 50%,
            var(--primary-300) 80%,
            transparent 100%);
            border-radius: 3px;
        }

        .divider-icon-alt {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-700));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 15px;
            position: relative;
            z-index: 2;
            box-shadow: 0 4px 12px rgba(231, 137, 50, 0.3);
            transition: all 0.3s ease;
        }

        .divider-icon-alt i {
            font-size: 1.3rem;
            color: white;
        }

        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .module-card {
            background-color: var(--dark-card);
            border-radius: 12px;
            padding: 30px;
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border-left: 4px solid var(--primary-500);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        [data-theme="light"] .module-card {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
            border-left: 4px solid var(--primary-500);
        }

        .module-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        [data-theme="light"] .module-card:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .module-icon {
            font-size: 40px;
            color: var(--primary-500);
            margin-bottom: 20px;
        }

        .module-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .module-card p {
            color: var(--text-secondary);
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .module-features {
            list-style-type: none;
        }

        .module-features li {
            padding: 8px 0;
            color: var(--text-secondary);
            position: relative;
            padding-left: 25px;
        }

        .module-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--primary-500);
            font-weight: bold;
        }

        .module-button {
            display: inline-block;
            background: linear-gradient(to right, var(--primary-500), var(--primary-700));
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(231, 137, 50, 0.3);
            margin-top: auto;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .module-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 137, 50, 0.4);
            color: white;
        }

        /* Stats Section */
        .stats {
            padding: 80px 0;
            background-color: rgba(30, 30, 30, 0.7);
            transition: background-color 0.3s ease;
        }

        [data-theme="light"] .stats {
            background-color: rgba(245, 245, 245, 0.7);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .stat-item {
            text-align: center;
            padding: 30px 20px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-500);
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--text-secondary);
        }
        /* Шинэ товчны стильүүд */
        .access-button {
            display: inline-block;
            background: linear-gradient(to right, var(--primary-400), var(--primary-600));
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(231, 137, 50, 0.3);
            margin-top: auto;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .access-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 137, 50, 0.4);
            color: white;
        }

        .login-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(to right, var(--primary-500), var(--primary-700));
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(231, 137, 50, 0.3);
            margin-top: auto;
            border: none;
            cursor: pointer;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 137, 50, 0.4);
            color: white;
        }

        .login-button i {
            font-size: 0.8rem;
        }

        /* Footer - Fixed to bottom */
        footer {
            background-color: var(--dark-surface);
            padding: 40px 0 20px;
            transition: background-color 0.3s ease;
            flex-shrink: 0;
            width: 100%;
            margin-top: auto;
        }

        [data-theme="light"] footer {
            border-top: 1px solid #e0e0e0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 30px;
        }

        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--primary-500);
        }

        .footer-links {
            list-style-type: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--primary-500);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-secondary);
            font-size: 0.9rem;
            transition: border-color 0.3s ease;
        }

        [data-theme="light"] .copyright {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        /* Theme Toggle Button */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--primary-500);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1001;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: rgba(18, 18, 18, 0.95);
                padding: 20px;
                gap: 15px;
            }

            [data-theme="light"] .nav-links {
                background-color: rgba(255, 255, 255, 0.95);
            }

            .nav-links.active {
                display: flex;
            }

            .mobile-menu {
                display: block;
            }

            .logo-img {
                height: 40px;
            }

            .logo-text {
                font-size: 18px;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .module-button {
                padding: 10px 20px;
                font-size: 0.85rem;
            }

            .theme-toggle {
                width: 40px;
                height: 40px;
                font-size: 1rem;
                top: 15px;
                right: 15px;
            }

            .hero {
                padding: 150px 0 80px;
            }

            .modules {
                padding: 80px 0;
            }

            footer {
                padding: 30px 0 15px;
            }

            .divider-icon {
                width: 50px;
                height: 50px;
                margin: 0 15px;
            }

            .divider-icon i {
                font-size: 1.3rem;
            }

            .divider-icon-alt {
                width: 40px;
                height: 40px;
                margin: 0 10px;
            }

            .divider-icon-alt i {
                font-size: 1.1rem;
            }

            .nav-login-link {
                padding: 10px 18px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .logo {
                gap: 10px;
            }

            .logo-img {
                height: 35px;
            }

            .logo-text {
                font-size: 16px;
            }

            .hero {
                padding: 130px 0 60px;
            }

            .modules-grid {
                grid-template-columns: 1fr;
            }

            /* "OR" текстийн хэв маяг */
            .or-divider {
                text-align: center;
                margin: 10px 0;
                color: #B0B0B0;
                font-size: 0.8rem;
                font-weight: 500;
            }

            .modules {
                padding: 60px 0;
            }

            footer {
                padding: 25px 0 15px;
            }

            .fancy-divider {
                margin: 30px 0;
            }

            .divider-icon {
                width: 45px;
                height: 45px;
                margin: 0 10px;
            }

            .divider-icon i {
                font-size: 1.2rem;
            }
        }

        /* Ensure content doesn't get hidden behind fixed header */
        .hero, .modules, .stats {
            scroll-margin-top: 80px;
        }
    </style>
</head>
<body data-theme="dark">
<!-- Theme Toggle Button -->
<button class="theme-toggle" id="themeToggle">
    <i class="fas fa-sun"></i>
</button>

<!-- Header Section -->
<header>
    <div class="container">
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}"
                     alt="Эрдэнэс Тавантолгой ХК лого"
                     class="logo-img">
                <span class="logo-text">Эрдэнэс Тавантолгой</span>
            </div>
            <div class="nav-links">
                <a href="/login" class="nav-login-link">
                    <i class="fas fa-sign-in-alt"></i>
                    Системд нэвтрэх
                </a>
            </div>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </div>
</header>

<!-- Main Content -->
<div class="main-content">
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Салбарын дотоод хэрэгцээний систем</h1>
            <p>Эрдэнэс Тавантолгой ХК-ийн салбарын дотоод хэрэглээний системд тавтай морил</p>
                <div class="container">
                    <div class="section-title">
                        <h2>Систем Модуль</h2>
                    </div>
                    <!-- Divider -->
                    <div class="fancy-divider">
                        <div class="divider-line"></div>
                        <div class="divider-icon">
                            <i class="fas fa-cubes"></i>
                        </div>
                        <div class="divider-line"></div>
                    </div>

                    <div class="modules-grid">
                        <!-- Module 1 -->
                        <div class="module-card">
                            <i class="fas fa-shield-alt module-icon"></i>
                            <h3>Шалган нэвтрүүлэх цэг</h3>
{{--                            <p>Салбарын Шалган нэвтрүүлэх цэгийн байршил, хяналтын систем</p>--}}
                            <ul class="module-features">
                                <li>Салбарын Шалган нэвтрүүлэх цэгийн байршил, хяналтын систем</li>
                            </ul>
                            <a href="/post" class="login-button">
                                <i class="fas fa-sign-in-alt"></i>
                                Хандах
                            </a>
                        </div>

                        <!-- Module 2 -->
                        <div class="module-card">
                            <i class="fas fa-tools module-icon"></i>
                            <h3>Техник бүртгэл</h3>
                            <ul class="module-features">
                                <li>Техникийн мэдээллийн сан</li>
                            </ul>
                            <a href="/login" class="login-button">
                                <i class="fas fa-sign-in-alt"></i>
                                Нэвтрэх
                            </a>
                        </div>

                        <!-- Module 3 -->
                        <div class="module-card">
                            <i class="fas fa-laptop-code module-icon"></i>
                            <h3>Мэдээлэл технологи</h3>
                            <p>Мэдээлэл технологийн алба, дотоод хэрэгцээнд зориулсан систем</p>
                            <ul class="module-features">
{{--                                <li>Сүлжээний мониторинг</li>--}}
{{--                                <li>Програм хангамжийн удирдлага</li>--}}
{{--                                <li>Техникийн дэмжлэг</li>--}}
                            </ul>
                            <a href="/login" class="login-button">
                                <i class="fas fa-sign-in-alt"></i>
                                Нэвтрэх
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="copyright">
            &copy; <script>document.write(new Date().getFullYear())</script> Шуурхай удирдлага мэдээллийн технологийн газар
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle
    document.querySelector('.mobile-menu').addEventListener('click', function() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });

                // Close mobile menu if open
                if (window.innerWidth <= 768) {
                    document.querySelector('.nav-links').classList.remove('active');
                }
            }
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        const navLinks = document.querySelector('.nav-links');
        const mobileMenu = document.querySelector('.mobile-menu');

        if (window.innerWidth <= 768 &&
            !navLinks.contains(e.target) &&
            !mobileMenu.contains(e.target) &&
            navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
        }
    });

    // Add animation to stats when they come into view
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Theme toggle functionality
    const themeToggle = document.getElementById('themeToggle');

    // Check for saved theme or prefered scheme
    const savedTheme = localStorage.getItem('theme');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');

    // Set initial theme
    if (savedTheme) {
        document.documentElement.setAttribute('data-theme', savedTheme);
        updateToggleButton(savedTheme);
    } else if (prefersDarkScheme.matches) {
        document.documentElement.setAttribute('data-theme', 'dark');
        updateToggleButton('dark');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        updateToggleButton('light');
    }

    // Theme toggle event
    themeToggle.addEventListener('click', function() {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateToggleButton(newTheme);
    });

    function updateToggleButton(theme) {
        if (theme === 'dark') {
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        } else {
            themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        }
    }

    // Animate stats counter
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-count'));
        const duration = 2000; // 2 seconds
        const step = target / (duration / 16); // 60fps
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }

    // Observe stat items
    document.querySelectorAll('.stat-item').forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(item);

        // Animate counter when stat becomes visible
        const statObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const numberElement = entry.target.querySelector('.stat-number');
                    animateCounter(numberElement);
                    statObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statObserver.observe(item);
    });

    // Ensure footer stays at bottom on resize
    window.addEventListener('resize', function() {
        // This forces a reflow to ensure proper footer positioning
        document.body.style.display = 'none';
        document.body.offsetHeight;
        document.body.style.display = '';
    });
</script>
</body>
</html>
