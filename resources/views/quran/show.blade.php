<x-layouts.public :title="'سورة ' . $surah->getTranslation('name', 'ar') . ' — مِشْكَاة'">
    @push('styles')
    <style>
        .ayah-card {
            transition: all 0.3s ease;
        }
        .ayah-card:hover {
            border-color: rgba(16, 185, 129, 0.5);
            background: rgba(16, 185, 129, 0.05);
        }
        .ayah-number {
            background: conic-gradient(from 0deg, #059669, #10b981, #34d399, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .ayah-card { animation: fadeInUp 0.4s ease both; }
    </style>
    @endpush

    <!-- Header Banner -->
    <div class="relative bg-gradient-to-br from-emerald-900/40 via-slate-800 to-slate-900 border-b border-slate-700 py-12">
        <div class="absolute inset-0 opacity-10"
             style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"60\" height=\"60\"><path d=\"M30 0 L60 30 L30 60 L0 30 Z\" fill=\"none\" stroke=\"%2310b981\" stroke-width=\"0.5\"/></svg>'); background-size: 60px;">
        </div>
        <div class="relative max-w-4xl mx-auto px-4 text-center">
            <!-- Breadcrumb -->
            <nav class="flex justify-center items-center gap-2 text-sm text-slate-400 mb-6">
                <a href="{{ route('quran.index') }}" class="hover:text-emerald-400 transition">القرآن الكريم</a>
                <span>›</span>
                <span class="text-white">سورة {{ $surah->getTranslation('name', 'ar') }}</span>
            </nav>

            <!-- Surah Name -->
            <h1 class="font-amiri text-6xl text-white mb-3 drop-shadow-lg">
                {{ $surah->getTranslation('name', 'ar') }}
            </h1>
            <p class="text-2xl font-semibold text-slate-300 mb-2">{{ $surah->getTranslation('name', 'en') }}</p>
            <div class="flex items-center justify-center gap-4 mt-4">
                <span class="px-4 py-1.5 bg-emerald-900/50 border border-emerald-700/50 text-emerald-300 rounded-full text-sm font-medium">
                    {{ $surah->revelation_type === 'Meccan' ? 'مكية' : 'مدنية' }}
                </span>
                <span class="px-4 py-1.5 bg-slate-700/50 border border-slate-600/50 text-slate-300 rounded-full text-sm font-medium">
                    {{ $surah->number_of_ayahs }} آية
                </span>
                <span class="px-4 py-1.5 bg-slate-700/50 border border-slate-600/50 text-slate-300 rounded-full text-sm font-medium">
                    السورة {{ $surah->number }}
                </span>
            </div>

            <!-- Audio Player -->
            <div class="mt-8 flex items-center justify-center gap-4">
                <button id="play-audio" onclick="toggleAudio()"
                    class="flex items-center gap-2 px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white rounded-full font-semibold shadow-lg shadow-emerald-600/30 transition transform hover:-translate-y-0.5">
                    <svg id="play-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                    <svg id="pause-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                    </svg>
                    <span id="audio-btn-text">استمع للسورة</span>
                </button>
                <audio id="surah-audio"
                    src="https://server9.mp3quran.net/omar_warsh/{{ str_pad($surah->number, 3, '0', STR_PAD_LEFT) }}.mp3"
                    onended="resetAudio()">
                </audio>
            </div>
            
            <p class="text-xs text-slate-400 mt-3">التلاوة بصوت: عمر القزابري (رواية ورش)</p>
        </div>
    </div>

    <!-- Surah Navigation -->
    <div class="max-w-4xl mx-auto px-4 py-4 flex justify-between items-center">
        @if($surah->number > 1)
            <a href="{{ route('quran.show', $surah->number - 1) }}"
               class="flex items-center gap-2 text-sm text-slate-400 hover:text-emerald-400 transition">
                ← السورة السابقة
            </a>
        @else
            <div></div>
        @endif

        <a href="{{ route('quran.index') }}" class="text-sm text-slate-400 hover:text-white transition">
            قائمة السور
        </a>

        @if($surah->number < 114)
            <a href="{{ route('quran.show', $surah->number + 1) }}"
               class="flex items-center gap-2 text-sm text-slate-400 hover:text-emerald-400 transition">
                السورة التالية →
            </a>
        @else
            <div></div>
        @endif
    </div>

    <!-- Basmala (except for Al-Fatiha and At-Tawbah) -->
    @if($surah->number !== 1 && $surah->number !== 9)
        <div class="max-w-4xl mx-auto px-4 mb-6">
            <div class="text-center py-6 border border-slate-700/50 rounded-2xl bg-slate-800/30">
                <p class="font-amiri text-4xl text-emerald-300 leading-relaxed">
                    بِسۡمِ ٱللَّهِ ٱلرَّحۡمَٰنِ ٱلرَّحِيمِ
                </p>
            </div>
        </div>
    @endif

    <!-- Ayahs -->
    <div class="max-w-4xl mx-auto px-4 pb-16">
        @if($surah->ayahs->count() > 0)
            <div class="space-y-4">
                @foreach($surah->ayahs as $index => $ayah)
                    <div class="ayah-card bg-slate-800/50 border border-slate-700/50 rounded-2xl p-6"
                         style="animation-delay: {{ min($index * 0.03, 0.5) }}s">
                        <!-- Ayah Text -->
                        <p class="font-amiri text-3xl text-white leading-loose text-right mb-4" dir="rtl">
                            {{ $ayah->getTranslation('text', 'ar') }}
                            <span class="text-emerald-400">﴿{{ $ayah->number_in_surah }}﴾</span>
                        </p>

                        <!-- Translation -->
                        @if($ayah->getTranslation('text', 'en', false))
                            <p class="text-slate-400 text-base leading-relaxed border-t border-slate-700/50 pt-4 mt-4">
                                {{ $ayah->getTranslation('text', 'en', false) }}
                            </p>
                        @endif

                        <!-- Ayah Number Badge -->
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-xs text-slate-500">الآية {{ $ayah->number_in_surah }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- No ayahs yet — show placeholder with API info -->
            <div class="text-center py-20">
                <div class="w-20 h-20 rounded-full bg-slate-800 flex items-center justify-center mx-auto mb-6">
                    <span class="text-4xl">📖</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">الآيات لم تُحمَّل بعد</h3>
                <p class="text-slate-400 mb-6">يمكنك الاستماع للسورة أو تشغيل AyahSeeder لتحميل النص الكامل.</p>
                <div class="bg-slate-800 border border-slate-700 rounded-xl p-4 text-left max-w-md mx-auto">
                    <p class="text-sm font-mono text-emerald-400 mb-1">لتحميل الآيات:</p>
                    <p class="text-sm font-mono text-slate-300">php artisan db:seed --class=AyahSeeder</p>
                </div>
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
        function toggleAudio() {
            const audio = document.getElementById('surah-audio');
            const playIcon = document.getElementById('play-icon');
            const pauseIcon = document.getElementById('pause-icon');
            const btnText = document.getElementById('audio-btn-text');

            if (audio.paused) {
                audio.play();
                playIcon.classList.add('hidden');
                pauseIcon.classList.remove('hidden');
                btnText.textContent = 'إيقاف';
            } else {
                audio.pause();
                playIcon.classList.remove('hidden');
                pauseIcon.classList.add('hidden');
                btnText.textContent = 'استمع للسورة';
            }
        }

        function resetAudio() {
            document.getElementById('play-icon').classList.remove('hidden');
            document.getElementById('pause-icon').classList.add('hidden');
            document.getElementById('audio-btn-text').textContent = 'استمع للسورة';
        }
    </script>
    @endpush
</x-layouts.public>
