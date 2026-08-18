<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Islamic Web App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|amiri:400,700" rel="stylesheet" />

    <!-- Scripts and Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-amiri { font-family: 'Amiri', serif; }
        .bg-islamic-pattern {
            background-color: #0f172a;
            background-image: radial-gradient(#1e293b 2px, transparent 2px);
            background-size: 32px 32px;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900 dark:bg-slate-900 dark:text-gray-100 selection:bg-emerald-500 selection:text-white">

    <!-- Navbar -->
    <nav class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-emerald-500/30">
                        I
                    </div>
                    <span class="font-bold text-xl tracking-tight text-slate-800 dark:text-white">Islamic<span class="text-emerald-600">App</span></span>
                </div>
                
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-medium text-gray-600 hover:text-emerald-600 dark:text-gray-300 dark:hover:text-emerald-400 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-emerald-600 dark:text-gray-300 dark:hover:text-emerald-400 transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="font-medium bg-emerald-600 text-white px-5 py-2.5 rounded-full hover:bg-emerald-700 transition shadow-lg shadow-emerald-600/30">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-islamic-pattern pt-16 pb-32 flex items-center justify-center min-h-[70vh]">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900/90 pointer-events-none"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 drop-shadow-lg">
                Your Digital <span class="text-emerald-400">Islamic</span> Companion
            </h1>
            <p class="mt-4 text-xl md:text-2xl text-slate-300 max-w-3xl mx-auto font-light leading-relaxed">
                Read the Quran, learn Hadith, track your prayers, and discover authentic Islamic lessons in one beautiful application.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quran.index') }}" class="px-8 py-4 bg-emerald-500 hover:bg-emerald-600 text-white font-semibold rounded-full shadow-xl shadow-emerald-500/40 transition transform hover:-translate-y-1">
                    Start Reading Quran
                </a>
                <a href="{{ url('/admin') }}" class="px-8 py-4 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-full border border-slate-700 transition transform hover:-translate-y-1">
                    Access Admin Panel
                </a>
            </div>
        </div>
    </div>

    <!-- Features Overview -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-slate-700 flex flex-col items-center text-center transform transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="w-16 h-16 bg-emerald-100 dark:bg-emerald-900/50 rounded-2xl flex items-center justify-center text-emerald-600 dark:text-emerald-400 mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-slate-800 dark:text-white">Al-Quran</h3>
                <p class="text-slate-500 dark:text-slate-400">Read the Noble Quran with multiple translations and authentic audio recitations.</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-slate-700 flex flex-col items-center text-center transform transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/50 rounded-2xl flex items-center justify-center text-blue-600 dark:text-blue-400 mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-slate-800 dark:text-white">Prayer Times</h3>
                <p class="text-slate-500 dark:text-slate-400">Accurate daily prayer times based on your location with a Qibla compass.</p>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-slate-700 flex flex-col items-center text-center transform transition hover:-translate-y-2 hover:shadow-2xl">
                <div class="w-16 h-16 bg-amber-100 dark:bg-amber-900/50 rounded-2xl flex items-center justify-center text-amber-600 dark:text-amber-400 mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-slate-800 dark:text-white">Daily Adhkar</h3>
                <p class="text-slate-500 dark:text-slate-400">Morning and evening supplications with an interactive counting interface.</p>
            </div>
        </div>
    </div>

    <!-- Surahs Section -->
    <div id="quran" class="py-24 bg-gray-50 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white">Explore the Quran</h2>
                    <p class="text-slate-500 dark:text-slate-400 mt-2">Start your spiritual journey by reading the Surahs.</p>
                </div>
                <a href="#" class="text-emerald-600 dark:text-emerald-400 font-medium hover:underline">View All Surahs &rarr;</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($surahs as $surah)
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 hover:shadow-md transition cursor-pointer flex justify-between items-center group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center text-slate-600 dark:text-slate-300 font-semibold group-hover:bg-emerald-100 group-hover:text-emerald-600 transition">
                            {{ $surah->number }}
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 dark:text-white text-lg">{{ $surah->getTranslation('name', 'en') }}</h4>
                            <p class="text-sm text-slate-500 dark:text-slate-400">{{ $surah->revelation_type }} • {{ $surah->number_of_ayahs }} Ayahs</p>
                        </div>
                    </div>
                    <div class="font-amiri text-2xl text-emerald-600 dark:text-emerald-400">
                        {{ $surah->getTranslation('name', 'ar') }}
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12 text-gray-500">
                    No Surahs found. Run the QuranSeeder to populate the database.
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white dark:bg-slate-950 py-12 border-t border-gray-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="w-12 h-12 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-xl mx-auto mb-6">
                I
            </div>
            <p class="text-slate-500 dark:text-slate-400 font-medium">Built with Laravel & Tailwind CSS</p>
            <p class="text-sm text-slate-400 mt-2">&copy; {{ date('Y') }} Islamic Web App. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
