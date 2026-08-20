<x-layouts.public title="مِشْكَاة — رفيقك الرقمي الإسلامي">
    @push('styles')
    <style>
        .hero-bg {
            background: radial-gradient(circle at top center, rgba(245, 158, 11, 0.15) 0%, rgba(2, 6, 23, 1) 100%);
        }
        
        .floating-element {
            animation: float 7s ease-in-out infinite;
        }
        
        .floating-element-delayed {
            animation: float 7s ease-in-out infinite;
            animation-delay: 3.5s;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(245, 158, 11, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
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
    <div class="relative overflow-hidden hero-bg min-h-[85vh] flex items-center justify-center pt-16 pb-32 border-b border-white/5">
        <!-- Decorative Background Patterns -->
        <div class="absolute inset-0 opacity-[0.02] z-0" 
             style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23f59e0b\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>
        
        <!-- Glowing Orbs -->
        <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-amber-600/10 rounded-full blur-[120px] pointer-events-none floating-element"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-indigo-600/10 rounded-full blur-[100px] pointer-events-none floating-element-delayed"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            
            <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-amber-950/40 border border-amber-500/20 text-amber-200 text-sm font-medium mb-10 backdrop-blur-md shadow-[0_0_20px_rgba(245,158,11,0.1)]">
                <span class="relative flex h-2.5 w-2.5">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-amber-500"></span>
                </span>
                مرحباً بك في مِشْكَاة
            </div>

            <h1 class="text-6xl md:text-8xl font-bold text-white mb-8 drop-shadow-2xl leading-tight">
                رفيقك <span class="gold-gradient-text">الإسلامي</span><br>الرقمي
            </h1>
            
            <p class="mt-6 text-xl md:text-2xl text-slate-300 max-w-3xl mx-auto font-light leading-relaxed opacity-90" dir="rtl">
                بوابة متكاملة تجمع بين أصالة المحتوى وفخامة التصميم. اقرأ القرآن، تدارس الأحاديث، وداوم على أذكارك اليومية في مكان واحد.
            </p>
            
            <div class="mt-14 flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('quran.index') }}" class="group relative px-10 py-4 bg-gradient-to-r from-amber-500 to-amber-600 text-slate-950 font-bold text-lg rounded-full overflow-hidden shadow-[0_0_40px_rgba(245,158,11,0.25)] transition-all hover:scale-105 hover:shadow-[0_0_60px_rgba(245,158,11,0.4)]">
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
                    <span class="relative flex items-center gap-3">
                        📖 ابدأ القراءة الآن
                    </span>
                </a>
                
                <a href="{{ route('prayer-times.index') }}" class="px-10 py-4 bg-slate-900/60 hover:bg-slate-800 text-white font-bold text-lg rounded-full border border-white/10 backdrop-blur-md transition-all duration-300 hover:scale-105 hover:border-amber-500/30 flex items-center gap-3">
                    🕌 مواقيت الصلاة
                </a>
            </div>
        </div>
    </div>

    <!-- Daily Inspiration Section -->
    <div class="relative z-20 -mt-20 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-32" dir="rtl">
        <div class="glass-card rounded-[2.5rem] p-10 md:p-14 text-center relative overflow-hidden group hover:border-amber-500/30 hover:shadow-[0_0_50px_rgba(245,158,11,0.1)] transition-all duration-700">
            <!-- decorative quote marks -->
            <div class="absolute top-4 right-10 text-9xl text-amber-500/5 font-serif leading-none select-none group-hover:text-amber-500/10 transition-colors duration-700">"</div>
            <div class="absolute bottom-10 left-10 text-9xl text-amber-500/5 font-serif leading-none select-none group-hover:text-amber-500/10 transition-colors duration-700 rotate-180">"</div>
            
            <p class="text-amber-400 text-sm font-bold uppercase tracking-[0.2em] mb-8 relative z-10">آيـة اليـوم</p>
            <h2 class="font-amiri text-4xl md:text-5xl text-white leading-loose mb-8 relative z-10 drop-shadow-lg">
                ﴿ إِنَّ هَٰذَا الْقُرْآنَ يَهْدِي لِلَّتِي هِيَ أَقْوَمُ وَيُبَشِّرُ الْمُؤْمِنِينَ ﴾
            </h2>
            <p class="text-slate-400 font-medium text-lg relative z-10 flex items-center justify-center gap-3">
                <span class="w-8 h-[1px] bg-amber-500/30"></span>
                سورة الإسراء (9)
                <span class="w-8 h-[1px] bg-amber-500/30"></span>
            </p>
        </div>
    </div>

    <!-- Premium Features Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20" dir="rtl">
        <div class="text-center mb-24">
            <span class="text-amber-500 font-bold tracking-wider mb-3 block uppercase text-sm">مميزات المنصة</span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">كل ما تحتاجه في مكان واحد</h2>
            <p class="text-slate-400 text-xl font-light">تجربة مستخدم فريدة مصممة خصيصاً لراحتك</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <a href="{{ route('quran.index') }}" class="group block relative p-[1px] rounded-3xl bg-gradient-to-b from-white/10 to-transparent hover:from-amber-500/50 hover:to-amber-500/0 transition-all duration-500 hover:-translate-y-3">
                <div class="h-full bg-slate-900/90 backdrop-blur-xl rounded-[23px] p-10 border border-white/5 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/10 rounded-full blur-[40px] group-hover:bg-amber-500/20 transition-colors duration-500"></div>
                    <div class="w-16 h-16 bg-slate-800 border border-white/5 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-amber-500/10 group-hover:border-amber-500/30 transition-all duration-500 relative z-10">
                        <span class="text-3xl">📖</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-5 group-hover:text-amber-400 transition-colors relative z-10">القرآن الكريم</h3>
                    <p class="text-slate-400 leading-relaxed font-amiri text-xl relative z-10 opacity-90">
                        تصفح سور القرآن الكريم بخط أميري واضح، مع توفر الترجمات وإمكانية الاستماع لأشهر القراء بروايات متعددة.
                    </p>
                </div>
            </a>

            <!-- Feature 2 -->
            <a href="{{ route('adhkar.index') }}" class="group block relative p-[1px] rounded-3xl bg-gradient-to-b from-white/10 to-transparent hover:from-amber-500/50 hover:to-amber-500/0 transition-all duration-500 hover:-translate-y-3">
                <div class="h-full bg-slate-900/90 backdrop-blur-xl rounded-[23px] p-10 border border-white/5 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/10 rounded-full blur-[40px] group-hover:bg-amber-500/20 transition-colors duration-500"></div>
                    <div class="w-16 h-16 bg-slate-800 border border-white/5 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-amber-500/10 group-hover:border-amber-500/30 transition-all duration-500 relative z-10">
                        <span class="text-3xl">📿</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-5 group-hover:text-amber-400 transition-colors relative z-10">الأذكار والسبحة</h3>
                    <p class="text-slate-400 leading-relaxed font-amiri text-xl relative z-10 opacity-90">
                        حافظ على أذكار الصباح والمساء من خلال واجهة تفاعلية تحتوي على سبحة رقمية ذكية مع تنبيهات عند الاكتمال.
                    </p>
                </div>
            </a>

            <!-- Feature 3 -->
            <a href="{{ route('hadith.index') }}" class="group block relative p-[1px] rounded-3xl bg-gradient-to-b from-white/10 to-transparent hover:from-amber-500/50 hover:to-amber-500/0 transition-all duration-500 hover:-translate-y-3">
                <div class="h-full bg-slate-900/90 backdrop-blur-xl rounded-[23px] p-10 border border-white/5 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/10 rounded-full blur-[40px] group-hover:bg-amber-500/20 transition-colors duration-500"></div>
                    <div class="w-16 h-16 bg-slate-800 border border-white/5 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-amber-500/10 group-hover:border-amber-500/30 transition-all duration-500 relative z-10">
                        <span class="text-3xl">📚</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-5 group-hover:text-amber-400 transition-colors relative z-10">الحديث الشريف</h3>
                    <p class="text-slate-400 leading-relaxed font-amiri text-xl relative z-10 opacity-90">
                        استكشف كنوز السنة النبوية المطهرة مع مجموعة من الأحاديث الصحيحة المصنفة، مثل الأربعين النووية.
                    </p>
                </div>
            </a>
        </div>
    </div>

    <!-- Explore Quran Preview -->
    <div class="relative py-28 bg-[#070b14] border-t border-white/5 overflow-hidden mt-10" dir="rtl">
        <!-- Glow effect -->
        <div class="absolute right-0 top-0 w-1/2 h-full bg-amber-900/10 blur-[120px] pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">
                <div>
                    <span class="text-amber-500 font-bold tracking-wider mb-3 block uppercase text-sm">استكشف</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-white">سور مختارة</h2>
                </div>
                <a href="{{ route('quran.index') }}" class="group flex items-center gap-3 px-6 py-3 rounded-full bg-white/5 hover:bg-amber-500/10 text-slate-300 hover:text-amber-400 transition-all duration-300 font-bold border border-white/5 hover:border-amber-500/20">
                    عرض المصحف كاملاً
                    <svg class="w-5 h-5 rotate-180 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($surahs ?? [] as $index => $surah)
                <a href="{{ route('quran.show', $surah->id) }}" 
                   class="glass-card p-8 rounded-3xl hover:bg-slate-800/80 transition-all duration-500 flex justify-between items-center group border border-white/5 hover:border-amber-500/40 hover:shadow-[0_10_30px_rgba(245,158,11,0.15)] hover:-translate-y-2">
                    <div class="flex items-center gap-6">
                        <div class="w-14 h-14 rounded-2xl bg-slate-900 border border-white/5 flex items-center justify-center text-slate-300 font-bold text-xl group-hover:bg-gradient-to-br group-hover:from-amber-400 group-hover:to-amber-600 group-hover:text-slate-950 transition-all duration-500 shadow-inner">
                            {{ $surah->number }}
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-xl mb-2 group-hover:text-amber-300 transition-colors">{{ $surah->getTranslation('name', 'en') }}</h4>
                            <p class="text-sm text-slate-400 flex items-center gap-3">
                                <span class="{{ $surah->revelation_type === 'Meccan' ? 'text-amber-500/80' : 'text-blue-400/80' }} font-bold">
                                    {{ $surah->revelation_type === 'Meccan' ? 'مكية' : 'مدنية' }}
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
                                <span>{{ $surah->number_of_ayahs }} آية</span>
                            </p>
                        </div>
                    </div>
                    <div class="font-amiri text-4xl text-amber-500/50 group-hover:text-amber-400 transition-colors duration-500">
                        {{ $surah->getTranslation('name', 'ar') }}
                    </div>
                </a>
                @empty
                <div class="col-span-full text-center py-20 text-slate-500 glass-card rounded-3xl border border-white/5">
                    لا توجد سور للعرض حالياً.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.public>
