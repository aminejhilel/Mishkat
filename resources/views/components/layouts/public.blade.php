<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name', 'Mishkat') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cairo:400,600,700,800|amiri:400,700" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Amiri', serif; }
        h1, h2, h3, h4, h5, h6, .title, .nav-link { font-family: 'Cairo', sans-serif; }
        .font-cairo { font-family: 'Cairo', sans-serif; }
        .font-amiri { font-family: 'Amiri', serif; }
        .nav-link {
            position: relative;
            padding-bottom: 2px;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #10b981;
            transition: width 0.3s ease;
            border-radius: 2px;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .nav-link.active { color: #10b981; }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-slate-900 text-white min-h-screen">

    <!-- ======= Navbar ======= -->
    <nav class="bg-slate-900/80 backdrop-blur-xl sticky top-0 z-50 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-emerald-500/30 group-hover:scale-105 transition-transform">
                        م
                    </div>
                    <span class="font-bold text-xl tracking-tight text-white">مِشْكَاة<span class="text-emerald-400">.</span></span>
                </a>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center gap-7 text-sm font-medium text-slate-400">
                    <a href="{{ route('quran.index') }}"
                       class="nav-link hover:text-white transition {{ request()->routeIs('quran*') ? 'active' : '' }}">
                        📖 القرآن
                    </a>
                    <a href="{{ route('prayer-times.index') }}"
                       class="nav-link hover:text-white transition {{ request()->routeIs('prayer-times*') ? 'active' : '' }}">
                        🕌 أوقات الصلاة
                    </a>
                    <a href="{{ route('adhkar.index') }}"
                       class="nav-link hover:text-white transition {{ request()->routeIs('adhkar*') ? 'active' : '' }}">
                        📿 الأذكار
                    </a>
                    <a href="{{ route('hadith.index') }}"
                       class="nav-link hover:text-white transition {{ request()->routeIs('hadith*') ? 'active' : '' }}">
                        📚 الحديث
                    </a>
                </div>

                <!-- Auth Links -->
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-slate-400 hover:text-white transition">
                            لوحة التحكم
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-400 hover:text-white transition">
                            تسجيل الدخول
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-semibold bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-2 rounded-full shadow-lg shadow-emerald-600/30 transition">
                                إنشاء حساب
                            </a>
                        @endif
                    @endauth

                    <!-- Mobile menu button -->
                    <button id="mobile-menu-btn" class="md:hidden text-slate-400 hover:text-white p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Nav -->
            <div id="mobile-menu" class="md:hidden hidden pb-4 space-y-2">
                <a href="{{ route('quran.index') }}" class="block py-2 px-4 text-slate-300 hover:text-emerald-400 hover:bg-slate-800 rounded-lg transition">📖 القرآن</a>
                <a href="{{ route('prayer-times.index') }}" class="block py-2 px-4 text-slate-300 hover:text-emerald-400 hover:bg-slate-800 rounded-lg transition">🕌 أوقات الصلاة</a>
                <a href="{{ route('adhkar.index') }}" class="block py-2 px-4 text-slate-300 hover:text-emerald-400 hover:bg-slate-800 rounded-lg transition">📿 الأذكار</a>
                <a href="{{ route('hadith.index') }}" class="block py-2 px-4 text-slate-300 hover:text-emerald-400 hover:bg-slate-800 rounded-lg transition">📚 الحديث</a>
            </div>
        </div>
    </nav>

    <!-- ======= Page Content ======= -->
    <main>
        {{ $slot }}
    </main>

    <!-- ======= Footer ======= -->
    <footer class="bg-slate-950 border-t border-slate-800 py-10 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="w-12 h-12 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">
                م
            </div>
            <p class="text-slate-400 font-medium">مِشْكَاة — رفيقك الرقمي الإسلامي</p>
            <p class="text-sm text-slate-500 mt-2">© {{ date('Y') }} Mishkat. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
        });
    </script>

    @stack('scripts')
</body>
</html>
