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
            background: #f59e0b; /* amber-500 */
            transition: width 0.3s ease;
            border-radius: 2px;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .nav-link.active { color: #f59e0b; }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-slate-950 text-white min-h-screen selection:bg-amber-500/30 selection:text-amber-200">

    <!-- ======= Navbar ======= -->
    <nav class="bg-slate-950/80 backdrop-blur-xl sticky top-0 z-50 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">

                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <span class="font-bold text-4xl font-amiri tracking-tight text-white group-hover:text-amber-400 transition-colors">مِشْكَاة<span class="text-amber-500">.</span></span>
                </a>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center gap-8 text-base font-medium text-slate-300">
                    <a href="{{ route('quran.index') }}"
                       class="nav-link hover:text-white transition-colors duration-300 {{ request()->routeIs('quran*') ? 'active' : '' }}">
                        📖 القرآن
                    </a>
                    <a href="{{ route('prayer-times.index') }}"
                       class="nav-link hover:text-white transition-colors duration-300 {{ request()->routeIs('prayer-times*') ? 'active' : '' }}">
                        🕌 أوقات الصلاة
                    </a>
                    <a href="{{ route('adhkar.index') }}"
                       class="nav-link hover:text-white transition-colors duration-300 {{ request()->routeIs('adhkar*') ? 'active' : '' }}">
                        📿 الأذكار
                    </a>
                    <a href="{{ route('hadith.index') }}"
                       class="nav-link hover:text-white transition-colors duration-300 {{ request()->routeIs('hadith*') ? 'active' : '' }}">
                        📚 الحديث
                    </a>
                </div>

                <!-- Auth Links -->
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-slate-300 hover:text-white transition-colors">
                            لوحة التحكم
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-300 hover:text-white transition-colors hidden sm:block">
                            تسجيل الدخول
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-bold bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 px-6 py-2.5 rounded-full shadow-lg shadow-amber-500/20 hover:shadow-amber-500/40 transition-all duration-300 transform hover:-translate-y-0.5">
                                إنشاء حساب
                            </a>
                        @endif
                    @endauth

                    <!-- Mobile menu button -->
                    <button id="mobile-menu-btn" class="md:hidden text-slate-300 hover:text-white p-2 transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Nav -->
            <div id="mobile-menu" class="md:hidden hidden pb-6 space-y-2 border-t border-white/5 pt-4">
                <a href="{{ route('quran.index') }}" class="block py-3 px-4 text-slate-300 hover:text-amber-400 hover:bg-slate-900 rounded-xl transition-all">📖 القرآن الكريم</a>
                <a href="{{ route('prayer-times.index') }}" class="block py-3 px-4 text-slate-300 hover:text-amber-400 hover:bg-slate-900 rounded-xl transition-all">🕌 مواقيت الصلاة</a>
                <a href="{{ route('adhkar.index') }}" class="block py-3 px-4 text-slate-300 hover:text-amber-400 hover:bg-slate-900 rounded-xl transition-all">📿 الأذكار والسبحة</a>
                <a href="{{ route('hadith.index') }}" class="block py-3 px-4 text-slate-300 hover:text-amber-400 hover:bg-slate-900 rounded-xl transition-all">📚 الحديث الشريف</a>
            </div>
        </div>
    </nav>

    <!-- ======= Page Content ======= -->
    <main class="relative z-10">
        {{ $slot }}
    </main>

    <!-- ======= Footer ======= -->
    <footer class="bg-slate-950 border-t border-white/5 pt-16 pb-8 mt-24 relative overflow-hidden">
        <!-- Decorative Glow -->
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[500px] h-[300px] bg-amber-500/5 blur-[120px] rounded-full pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
            <h3 class="text-4xl font-bold font-amiri text-white mb-2">مِشْكَاة</h3>
            <p class="text-slate-400 font-medium mb-8">رفيقك الرقمي الإسلامي — يجمع بين أصالة المحتوى وجمال التصميم</p>
            <div class="w-24 h-1 bg-gradient-to-r from-transparent via-amber-500/50 to-transparent mx-auto mb-8"></div>
            <p class="text-sm text-slate-500">© {{ date('Y') }} Mishkat. جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            // simple slide animation
            if(!menu.classList.contains('hidden')) {
                menu.style.opacity = 0;
                menu.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    menu.style.transition = 'all 0.3s ease';
                    menu.style.opacity = 1;
                    menu.style.transform = 'translateY(0)';
                }, 10);
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
