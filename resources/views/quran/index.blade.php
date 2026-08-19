<x-layouts.public title="القرآن الكريم — مِشْكَاة">
    @push('styles')
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .surah-card {
            animation: fadeInUp 0.4s ease both;
        }
        #search-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
        }
    </style>
    @endpush

    <!-- Hero -->
    <div class="relative bg-gradient-to-br from-emerald-900/30 via-slate-800/50 to-slate-900 border-b border-slate-700 py-16 text-center overflow-hidden">
        <div class="absolute inset-0 opacity-5"
             style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"80\" height=\"80\"><circle cx=\"40\" cy=\"40\" r=\"38\" fill=\"none\" stroke=\"%2310b981\" stroke-width=\"0.5\"/><circle cx=\"40\" cy=\"40\" r=\"25\" fill=\"none\" stroke=\"%2310b981\" stroke-width=\"0.5\"/></svg>'); background-size: 80px;">
        </div>
        <div class="relative max-w-3xl mx-auto px-4">
            <p class="font-amiri text-2xl text-emerald-300 mb-4">بِسۡمِ ٱللَّهِ ٱلرَّحۡمَٰنِ ٱلرَّحِيمِ</p>
            <h1 class="text-5xl font-bold text-white mb-3">القرآن الكريم</h1>
            <p class="text-slate-400 text-lg">١١٤ سورة • ٦٢٣٦ آية</p>

            <!-- Search -->
            <div class="mt-8 max-w-md mx-auto relative">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input id="search-input" type="text" placeholder="ابحث عن سورة..."
                    class="w-full pl-12 pr-4 py-3 bg-slate-800 border border-slate-600 text-white placeholder-slate-500 rounded-full transition focus:border-emerald-500"
                    oninput="filterSurahs(this.value)">
            </div>

            <!-- Filter -->
            <div class="mt-4 flex justify-center gap-3">
                <button onclick="filterByType('all')" id="btn-all"
                    class="px-4 py-1.5 rounded-full text-sm font-medium bg-emerald-600 text-white transition filter-btn">
                    الكل
                </button>
                <button onclick="filterByType('Meccan')" id="btn-Meccan"
                    class="px-4 py-1.5 rounded-full text-sm font-medium bg-slate-700 text-slate-300 hover:bg-slate-600 transition filter-btn">
                    مكية
                </button>
                <button onclick="filterByType('Medinan')" id="btn-Medinan"
                    class="px-4 py-1.5 rounded-full text-sm font-medium bg-slate-700 text-slate-300 hover:bg-slate-600 transition filter-btn">
                    مدنية
                </button>
            </div>
        </div>
    </div>

    <!-- Surahs Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div id="surahs-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach($surahs as $index => $surah)
                <a href="{{ route('quran.show', $surah->id) }}"
                   class="surah-card group bg-slate-800/60 border border-slate-700/50 hover:border-emerald-500/60 rounded-2xl p-5 flex justify-between items-center transition hover:bg-slate-800 hover:shadow-lg hover:shadow-emerald-900/20"
                   style="animation-delay: {{ min($index * 0.02, 0.5) }}s"
                   data-name-ar="{{ $surah->getTranslation('name', 'ar') }}"
                   data-name-en="{{ $surah->getTranslation('name', 'en') }}"
                   data-type="{{ $surah->revelation_type }}">

                    <div class="flex items-center gap-4">
                        <!-- Number -->
                        <div class="relative w-11 h-11 flex-shrink-0">
                            <svg viewBox="0 0 44 44" class="w-full h-full text-emerald-600/40 group-hover:text-emerald-500/60 transition" fill="currentColor">
                                <polygon points="22,2 42,12 42,32 22,42 2,32 2,12"/>
                            </svg>
                            <span class="absolute inset-0 flex items-center justify-center text-xs font-bold text-emerald-300 group-hover:text-emerald-200 transition">
                                {{ $surah->number }}
                            </span>
                        </div>
                        <!-- Name -->
                        <div>
                            <h3 class="font-bold text-white group-hover:text-emerald-300 transition">
                                {{ $surah->getTranslation('name', 'en') }}
                            </h3>
                            <p class="text-xs text-slate-500 mt-0.5">
                                {{ $surah->revelation_type === 'Meccan' ? 'مكية' : 'مدنية' }} • {{ $surah->number_of_ayahs }} آية
                            </p>
                        </div>
                    </div>

                    <!-- Arabic Name -->
                    <div class="font-amiri text-2xl text-emerald-400/80 group-hover:text-emerald-300 transition">
                        {{ $surah->getTranslation('name', 'ar') }}
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Empty state -->
        <div id="empty-state" class="hidden text-center py-16">
            <p class="text-slate-500 text-lg">لا توجد سورة تطابق البحث.</p>
        </div>

        @if($surahs->isEmpty())
            <div class="text-center py-16">
                <p class="text-slate-400 text-lg mb-4">لا توجد سور في قاعدة البيانات.</p>
                <p class="text-sm font-mono text-emerald-400 bg-slate-800 inline-block px-4 py-2 rounded-lg">
                    php artisan db:seed --class=QuranSeeder
                </p>
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
        let activeType = 'all';

        function filterSurahs(query) {
            applyFilters(query, activeType);
        }

        function filterByType(type) {
            activeType = type;
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('bg-emerald-600', 'text-white');
                btn.classList.add('bg-slate-700', 'text-slate-300');
            });
            const activeBtn = document.getElementById('btn-' + type);
            activeBtn.classList.add('bg-emerald-600', 'text-white');
            activeBtn.classList.remove('bg-slate-700', 'text-slate-300');
            applyFilters(document.getElementById('search-input').value, type);
        }

        function applyFilters(query, type) {
            const cards = document.querySelectorAll('#surahs-grid a');
            let visible = 0;
            const q = query.trim().toLowerCase();

            cards.forEach(card => {
                const nameAr = card.dataset.nameAr?.toLowerCase() || '';
                const nameEn = card.dataset.nameEn?.toLowerCase() || '';
                const cardType = card.dataset.type;

                const matchesSearch = !q || nameAr.includes(q) || nameEn.includes(q);
                const matchesType = type === 'all' || cardType === type;

                if (matchesSearch && matchesType) {
                    card.style.display = '';
                    visible++;
                } else {
                    card.style.display = 'none';
                }
            });

            document.getElementById('empty-state').classList.toggle('hidden', visible > 0);
        }
    </script>
    @endpush
</x-layouts.public>
