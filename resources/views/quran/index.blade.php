<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quran - {{ config('app.name', 'Islamic Web App') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|amiri:400,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>.font-amiri { font-family: 'Amiri', serif; }</style>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900 dark:bg-slate-900 dark:text-gray-100">

    <nav class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">I</div>
                    <span class="font-bold text-xl tracking-tight">Islamic<span class="text-emerald-600">App</span></span>
                </a>
            </div>
        </div>
    </nav>

    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-8">The Noble Quran</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($surahs as $surah)
            <a href="{{ route('quran.show', $surah->id) }}" class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 hover:shadow-md hover:border-emerald-500 transition group flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center font-semibold group-hover:bg-emerald-100 group-hover:text-emerald-600 transition">
                        {{ $surah->number }}
                    </div>
                    <div>
                        <h4 class="font-bold text-lg">{{ $surah->getTranslation('name', 'en') }}</h4>
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ $surah->revelation_type }} • {{ $surah->number_of_ayahs }} Ayahs</p>
                    </div>
                </div>
                <div class="font-amiri text-2xl text-emerald-600">
                    {{ $surah->getTranslation('name', 'ar') }}
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>
</html>
