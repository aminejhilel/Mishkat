<x-layouts.public title="الحديث النبوي — مِشْكَاة">
    @push('styles')
    <style>
        .category-tab.active {
            background-color: #059669; /* emerald-600 */
            color: white;
            border-color: #059669;
        }
    </style>
    @endpush

    <!-- Header Banner -->
    <div class="relative bg-gradient-to-br from-emerald-900/40 via-slate-800 to-slate-900 border-b border-slate-700 py-12">
        <div class="absolute inset-0 opacity-10"
             style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"60\" height=\"60\"><path d=\"M30 0 L60 30 L30 60 L0 30 Z\" fill=\"none\" stroke=\"%2310b981\" stroke-width=\"0.5\"/></svg>'); background-size: 60px;">
        </div>
        <div class="relative max-w-4xl mx-auto px-4 text-center">
            <h1 class="font-amiri text-5xl text-white mb-3">الحديث النبوي الشريف</h1>
            <p class="text-xl text-slate-300">ومَا يَنطِقُ عَنِ الهَوَىٰ، إِنْ هُوَ إِلَّا وَحْيٌ يُوحَىٰ</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Categories Tabs -->
        <div class="flex flex-wrap justify-center gap-3 mb-10" id="tabs-container">
            @foreach($categories as $index => $category)
                <button onclick="showCategory({{ $category->id }})"
                        id="tab-{{ $category->id }}"
                        class="category-tab px-6 py-3 rounded-full border border-slate-700 text-slate-300 font-medium hover:bg-slate-800 transition flex items-center gap-2 {{ $index === 0 ? 'active' : '' }}">
                    <span>{{ $category->getTranslation('name', 'ar') }}</span>
                </button>
            @endforeach
        </div>

        <!-- Hadiths Content -->
        <div id="hadiths-container">
            @foreach($categories as $index => $category)
                <div id="category-{{ $category->id }}" class="category-content space-y-6 {{ $index === 0 ? '' : 'hidden' }}">
                    @foreach($category->hadiths as $hadith)
                        <div class="bg-slate-800/50 border border-slate-700/50 rounded-2xl p-6 relative">
                            <!-- Hadith Grade Badge -->
                            <div class="absolute top-4 left-4">
                                @if(strtolower($hadith->grade) === 'sahih' || $hadith->grade === 'صحيح')
                                    <span class="px-3 py-1 bg-emerald-900/50 text-emerald-400 border border-emerald-700 rounded-full text-xs font-bold">صحيح</span>
                                @elseif(strtolower($hadith->grade) === 'hasan' || $hadith->grade === 'حسن')
                                    <span class="px-3 py-1 bg-blue-900/50 text-blue-400 border border-blue-700 rounded-full text-xs font-bold">حسن</span>
                                @else
                                    <span class="px-3 py-1 bg-slate-700 text-slate-300 border border-slate-600 rounded-full text-xs font-bold">{{ $hadith->grade }}</span>
                                @endif
                            </div>

                            <!-- Narrator -->
                            <p class="text-emerald-400 text-sm mb-3 text-right" dir="rtl">
                                عَنْ {{ $hadith->getTranslation('narrator', 'ar') }} رضي الله عنه قال:
                            </p>

                            <!-- Hadith Text -->
                            <p class="font-amiri text-3xl text-white leading-loose text-right mb-6" dir="rtl">
                                «{{ $hadith->getTranslation('text', 'ar') }}»
                            </p>

                            <!-- Source -->
                            <div class="border-t border-slate-700/50 pt-4 text-left">
                                <span class="text-xs text-slate-500 font-mono">{{ $hadith->source }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
    <script>
        function showCategory(id) {
            document.querySelectorAll('.category-content').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.category-tab').forEach(el => el.classList.remove('active', 'bg-emerald-600', 'text-white', 'border-emerald-600'));
            
            document.getElementById('category-' + id).classList.remove('hidden');
            
            const tab = document.getElementById('tab-' + id);
            tab.classList.add('active');
        }
    </script>
    @endpush
</x-layouts.public>
