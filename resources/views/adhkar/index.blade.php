<x-layouts.public title="الأذكار — مِشْكَاة">
    @push('styles')
    <style>
        .category-tab.active {
            background-color: #059669; /* emerald-600 */
            color: white;
            border-color: #059669;
        }
        .dhikr-card {
            transition: all 0.3s ease;
        }
        .dhikr-card.completed {
            opacity: 0.6;
            filter: grayscale(100%);
        }
        .counter-btn {
            touch-action: manipulation;
        }
        .progress-ring__circle {
            transition: stroke-dashoffset 0.35s;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }
    </style>
    @endpush

    <!-- Header Banner -->
    <div class="relative bg-gradient-to-br from-emerald-900/40 via-slate-800 to-slate-900 border-b border-slate-700 py-12">
        <div class="absolute inset-0 opacity-10"
             style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"60\" height=\"60\"><path d=\"M30 0 L60 30 L30 60 L0 30 Z\" fill=\"none\" stroke=\"%2310b981\" stroke-width=\"0.5\"/></svg>'); background-size: 60px;">
        </div>
        <div class="relative max-w-4xl mx-auto px-4 text-center">
            <h1 class="font-amiri text-5xl text-white mb-3">الأذكار اليومية</h1>
            <p class="text-xl text-slate-300">ألا بذكر الله تطمئن القلوب</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Categories Tabs -->
        <div class="flex flex-wrap justify-center gap-3 mb-10" id="tabs-container">
            @foreach($categories as $index => $category)
                <button onclick="showCategory({{ $category->id }})"
                        id="tab-{{ $category->id }}"
                        class="category-tab px-6 py-3 rounded-full border border-slate-700 text-slate-300 font-medium hover:bg-slate-800 transition flex items-center gap-2 {{ $index === 0 ? 'active' : '' }}">
                    <span>{{ $category->icon }}</span>
                    <span>{{ $category->getTranslation('name', 'ar') }}</span>
                </button>
            @endforeach
        </div>

        <!-- Dhikrs Content -->
        <div id="dhikrs-container">
            @foreach($categories as $index => $category)
                <div id="category-{{ $category->id }}" class="category-content space-y-6 {{ $index === 0 ? '' : 'hidden' }}">
                    @foreach($category->dhikrs as $dhikrIndex => $dhikr)
                        <div class="dhikr-card bg-slate-800/50 border border-slate-700/50 rounded-2xl p-6 relative" id="dhikr-{{ $dhikr->id }}">
                            
                            <p class="font-amiri text-3xl text-white leading-loose text-right mb-4" dir="rtl">
                                {{ $dhikr->getTranslation('text', 'ar') }}
                            </p>
                            
                            @if($dhikr->getTranslation('translation', 'ar'))
                                <p class="text-emerald-400 text-sm mb-6 text-right" dir="rtl">
                                    💡 {{ $dhikr->getTranslation('translation', 'ar') }}
                                </p>
                            @endif

                            <!-- Interaction Area -->
                            <div class="flex justify-between items-center border-t border-slate-700/50 pt-4 mt-2">
                                <div class="text-slate-400 text-sm">
                                    العدد المطلوب: <span class="font-bold text-white">{{ $dhikr->count }}</span>
                                </div>
                                
                                <button onclick="incrementDhikr({{ $dhikr->id }}, {{ $dhikr->count }})" 
                                        class="counter-btn relative w-16 h-16 flex items-center justify-center bg-slate-700 rounded-full hover:bg-slate-600 transition active:scale-95">
                                    
                                    <!-- Circular Progress SVG -->
                                    <svg class="absolute inset-0 w-full h-full" width="64" height="64">
                                        <circle stroke="#334155" stroke-width="4" fill="transparent" r="28" cx="32" cy="32"/>
                                        <circle id="progress-{{ $dhikr->id }}" class="progress-ring__circle" 
                                                stroke="#10b981" stroke-width="4" fill="transparent" r="28" cx="32" cy="32"
                                                stroke-dasharray="175.929" stroke-dashoffset="175.929" />
                                    </svg>
                                    
                                    <span id="count-{{ $dhikr->id }}" class="text-2xl font-bold text-white relative z-10">0</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
    <script>
        // Tab switching logic
        function showCategory(id) {
            document.querySelectorAll('.category-content').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.category-tab').forEach(el => el.classList.remove('active', 'bg-emerald-600', 'text-white', 'border-emerald-600'));
            
            document.getElementById('category-' + id).classList.remove('hidden');
            
            const tab = document.getElementById('tab-' + id);
            tab.classList.add('active');
        }

        // Dhikr Counting logic
        const counts = {};
        const circumference = 28 * 2 * Math.PI; // r=28

        function incrementDhikr(id, max) {
            if (!counts[id]) counts[id] = 0;
            
            if (counts[id] < max) {
                counts[id]++;
                
                // Vibrate if supported
                if (navigator.vibrate) {
                    navigator.vibrate(50);
                }

                // Update text
                document.getElementById('count-' + id).innerText = counts[id];
                
                // Update circle progress
                const progressCircle = document.getElementById('progress-' + id);
                const offset = circumference - (counts[id] / max) * circumference;
                progressCircle.style.strokeDashoffset = offset;

                // Check completion
                if (counts[id] === max) {
                    document.getElementById('dhikr-' + id).classList.add('completed');
                    if (navigator.vibrate) {
                        navigator.vibrate([100, 50, 100]); // longer vibration on completion
                    }
                }
            }
        }
    </script>
    @endpush
</x-layouts.public>
