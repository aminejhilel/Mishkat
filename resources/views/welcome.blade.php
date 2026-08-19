<x-layouts.public title="مِشْكَاة — رفيقك الرقمي الإسلامي">
    @push('styles')
    <style>
        .hero-bg {
            background: radial-gradient(circle at top center, rgba(16, 185, 129, 0.15) 0%, rgba(15, 23, 42, 1) 100%);
        }
        
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: 3s;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .gold-gradient-text {
            background: linear-gradient(135deg, #FDE68A 0%, #D97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
    @endpush

    <!-- Hero Section -->
    <div class="relative overflow-hidden hero-bg min-h-[85vh] flex items-center justify-center pt-16 pb-32">
        <!-- Decorative Background Patterns -->
        <div class="absolute inset-0 opacity-[0.03] z-0" 
             style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%2310b981\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>
        
        <!-- Glowing Orbs -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-emerald-600/20 rounded-full blur-[100px] pointer-events-none floating-element"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-amber-600/10 rounded-full blur-[100px] pointer-events-none floating-element-delayed"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-900/30 border border-emerald-500/20 text-emerald-300 text-sm font-medium mb-8 backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                مرحباً بك في مِشْكَاة
            </div>

            <h1 class="text-6xl md:text-8xl font-bold text-white mb-6 drop-shadow-2xl leading-tight">
                رفيقك <span class="gold-gradient-text">الإسلامي</span><br>الرقمي
            </h1>
            
            <p class="mt-6 text-xl md:text-2xl text-slate-300 max-w-3xl mx-auto font-light leading-relaxed" dir="rtl">
                بوابة متكاملة تجمع بين أصالة المحتوى وحداثة التصميم. اقرأ القرآن، تدارس الأحاديث، وداوم على أذكارك اليومية في مكان واحد.
            </p>
            
            <div class="mt-12 flex flex-col sm:flex-row gap-5 justify-center items-center">
                <a href="{{ route('quran.index') }}" class="group relative px-8 py-4 bg-emerald-600 text-white font-bold rounded-full overflow-hidden shadow-[0_0_40px_rgba(16,185,129,0.3)] transition-all hover:scale-105 hover:shadow-[0_0_60px_rgba(16,185,129,0.5)]">
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
                    <span class="relative flex items-center gap-2">
                        📖 ابدأ القراءة الآن
                    </span>
                </a>
                
                <a href="{{ route('prayer-times.index') }}" class="px-8 py-4 bg-slate-800/80 hover:bg-slate-700 text-white font-bold rounded-full border border-slate-600 backdrop-blur-md transition-all hover:scale-105 flex items-center gap-2">
                    🕌 مواقيت الصلاة
                </a>
            </div>
        </div>
    </div>

    <!-- Daily Inspiration Section -->
    <div class="relative z-20 -mt-16 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-32" dir="rtl">
        <div class="glass-card rounded-3xl p-8 md:p-12 text-center relative overflow-hidden group hover:border-emerald-500/30 transition-colors duration-500">
            <!-- decorative quote marks -->
            <div class="absolute top-4 right-8 text-8xl text-emerald-500/10 font-serif leading-none">"</div>
            
            <p class="text-emerald-400 text-sm font-bold uppercase tracking-widest mb-6">آيـة اليـوم</p>
            <h2 class="font-amiri text-4xl md:text-5xl text-white leading-relaxed mb-6">
                ﴿ إِنَّ هَٰذَا الْقُرْآنَ يَهْدِي لِلَّتِي هِيَ أَقْوَمُ وَيُبَشِّرُ الْمُؤْمِنِينَ ﴾
            </h2>
            <p class="text-slate-400 font-medium">— سورة الإسراء (9)</p>
        </div>
    </div>

    <!-- Premium Features Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20" dir="rtl">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">كل ما تحتاجه في مكان واحد</h2>
            <p class="text-slate-400 text-lg">تجربة مستخدم فريدة مصممة خصيصاً لراحتك</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <a href="{{ route('quran.index') }}" class="group block relative p-1 rounded-3xl bg-gradient-to-b from-slate-700 to-slate-900 hover:from-emerald-500 hover:to-slate-900 transition-all duration-500 hover:-translate-y-2">
                <div class="h-full bg-slate-900 rounded-[22px] p-8">
                    <div class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-emerald-600 transition-colors duration-500">
                        <span class="text-3xl">📖</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-emerald-400 transition-colors">القرآن الكريم</h3>
                    <p class="text-slate-400 leading-relaxed font-amiri text-lg">
                        تصفح سور القرآن الكريم بخط أميري واضح، مع توفر الترجمات وإمكانية الاستماع لأشهر القراء بروايات متعددة.
                    </p>
                </div>
            </a>

            <!-- Feature 2 -->
            <a href="{{ route('adhkar.index') }}" class="group block relative p-1 rounded-3xl bg-gradient-to-b from-slate-700 to-slate-900 hover:from-amber-500 hover:to-slate-900 transition-all duration-500 hover:-translate-y-2">
                <div class="h-full bg-slate-900 rounded-[22px] p-8">
                    <div class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-amber-600 transition-colors duration-500">
                        <span class="text-3xl">📿</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-amber-400 transition-colors">الأذكار والسبحة</h3>
                    <p class="text-slate-400 leading-relaxed font-amiri text-lg">
                        حافظ على أذكار الصباح والمساء من خلال واجهة تفاعلية تحتوي على سبحة رقمية ذكية مع تنبيهات عند الاكتمال.
                    </p>
                </div>
            </a>

            <!-- Feature 3 -->
            <a href="{{ route('hadith.index') }}" class="group block relative p-1 rounded-3xl bg-gradient-to-b from-slate-700 to-slate-900 hover:from-blue-500 hover:to-slate-900 transition-all duration-500 hover:-translate-y-2">
                <div class="h-full bg-slate-900 rounded-[22px] p-8">
                    <div class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-blue-600 transition-colors duration-500">
                        <span class="text-3xl">📚</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-blue-400 transition-colors">الحديث الشريف</h3>
                    <p class="text-slate-400 leading-relaxed font-amiri text-lg">
                        استكشف كنوز السنة النبوية المطهرة مع مجموعة من الأحاديث الصحيحة المصنفة، مثل الأربعين النووية.
                    </p>
                </div>
            </a>
        </div>
    </div>

    <!-- Explore Quran Preview -->
    <div class="relative py-24 bg-slate-950 border-t border-slate-800 overflow-hidden" dir="rtl">
        <!-- Glow effect -->
        <div class="absolute right-0 top-0 w-1/2 h-full bg-emerald-900/10 blur-[120px] pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div>
                    <span class="text-emerald-500 font-bold tracking-wider mb-2 block">استكشف</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-white">سور مختارة</h2>
                </div>
                <a href="{{ route('quran.index') }}" class="group flex items-center gap-2 text-slate-300 hover:text-emerald-400 transition-colors font-bold">
                    عرض المصحف كاملاً
                    <svg class="w-5 h-5 rotate-180 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($surahs ?? [] as $index => $surah)
                <a href="{{ route('quran.show', $surah->id) }}" 
                   class="glass-card p-6 rounded-2xl hover:bg-slate-800 transition-all duration-300 flex justify-between items-center group border border-slate-700/50 hover:border-emerald-500/50">
                    <div class="flex items-center gap-5">
                        <div class="w-14 h-14 rounded-full bg-slate-800 flex items-center justify-center text-slate-300 font-bold text-lg group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300 shadow-inner">
                            {{ $surah->number }}
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-xl mb-1 group-hover:text-emerald-300 transition-colors">{{ $surah->getTranslation('name', 'en') }}</h4>
                            <p class="text-sm text-slate-400 flex items-center gap-2">
                                <span class="{{ $surah->revelation_type === 'Meccan' ? 'text-amber-400' : 'text-blue-400' }}">
                                    {{ $surah->revelation_type === 'Meccan' ? 'مكية' : 'مدنية' }}
                                </span>
                                <span class="w-1 h-1 rounded-full bg-slate-600"></span>
                                <span>{{ $surah->number_of_ayahs }} آية</span>
                            </p>
                        </div>
                    </div>
                    <div class="font-amiri text-3xl text-emerald-400/80 group-hover:text-emerald-400 transition-colors">
                        {{ $surah->getTranslation('name', 'ar') }}
                    </div>
                </a>
                @empty
                <div class="col-span-full text-center py-12 text-slate-500">
                    لا توجد سور للعرض حالياً.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.public>
