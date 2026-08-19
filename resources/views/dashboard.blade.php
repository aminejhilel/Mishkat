<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('لوحة التحكم') }}
        </h2>
    </x-slot>

    <div class="py-12" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Alert -->
            <div class="bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 rounded-2xl p-6 mb-8 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-emerald-800 dark:text-emerald-400 mb-1">أهلاً بك يا {{ Auth::user()->name }}!</h3>
                    <p class="text-emerald-600 dark:text-emerald-300">مرحباً بك في لوحة تحكم حسابك في تطبيق مِشْكَاة.</p>
                </div>
                <div class="hidden sm:block text-5xl">🌙</div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Quran Stat -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 rounded-xl flex items-center justify-center text-2xl">
                                📖
                            </div>
                            <h4 class="font-bold text-gray-700 dark:text-gray-300">ختمة القرآن</h4>
                        </div>
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">0%</p>
                                <p class="text-sm text-gray-500 mt-1">لم تبدأ بعد</p>
                            </div>
                            <a href="{{ route('quran.index') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">ابدأ القراءة &larr;</a>
                        </div>
                    </div>
                </div>

                <!-- Adhkar Stat -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/50 text-amber-600 dark:text-amber-400 rounded-xl flex items-center justify-center text-2xl">
                                📿
                            </div>
                            <h4 class="font-bold text-gray-700 dark:text-gray-300">الأذكار اليومية</h4>
                        </div>
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">0</p>
                                <p class="text-sm text-gray-500 mt-1">ذكر مكتمل اليوم</p>
                            </div>
                            <a href="{{ route('adhkar.index') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">الذهاب للأذكار &larr;</a>
                        </div>
                    </div>
                </div>

                <!-- Favorites Stat -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-rose-100 dark:bg-rose-900/50 text-rose-600 dark:text-rose-400 rounded-xl flex items-center justify-center text-2xl">
                                ❤️
                            </div>
                            <h4 class="font-bold text-gray-700 dark:text-gray-300">المفضلة</h4>
                        </div>
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">0</p>
                                <p class="text-sm text-gray-500 mt-1">عناصر محفوظة</p>
                            </div>
                            <button class="text-sm font-medium text-gray-400 cursor-not-allowed">قريباً</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">روابط سريعة</h3>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('quran.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition group border border-transparent hover:border-emerald-200 dark:hover:border-emerald-800">
                        <span class="text-3xl mb-2 group-hover:scale-110 transition">📖</span>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">القرآن</span>
                    </a>
                    
                    <a href="{{ route('prayer-times.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition group border border-transparent hover:border-emerald-200 dark:hover:border-emerald-800">
                        <span class="text-3xl mb-2 group-hover:scale-110 transition">🕌</span>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">أوقات الصلاة</span>
                    </a>
                    
                    <a href="{{ route('adhkar.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition group border border-transparent hover:border-emerald-200 dark:hover:border-emerald-800">
                        <span class="text-3xl mb-2 group-hover:scale-110 transition">📿</span>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">الأذكار</span>
                    </a>
                    
                    <a href="{{ route('hadith.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition group border border-transparent hover:border-emerald-200 dark:hover:border-emerald-800">
                        <span class="text-3xl mb-2 group-hover:scale-110 transition">📚</span>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">الحديث</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
