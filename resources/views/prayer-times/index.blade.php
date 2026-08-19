<x-layouts.public title="أوقات الصلاة — مِشْكَاة">
    <div class="max-w-5xl mx-auto px-4 py-16">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-3 text-white">🕌 مواقيت الصلاة</h1>
            <p class="text-slate-400" id="location-label">جاري تحديد الموقع...</p>
        </div>

        <!-- Next Prayer Countdown -->
        <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-3xl p-10 text-center mb-10 shadow-2xl shadow-emerald-900/50">
            <p class="text-emerald-200 text-sm font-semibold uppercase tracking-widest mb-2">الصلاة القادمة</p>
            <h2 class="text-4xl font-bold mb-1 text-white" id="next-prayer-name">—</h2>
            <p class="text-emerald-200 text-lg mb-6" id="next-prayer-time">—</p>
            <div class="text-6xl font-mono font-bold tracking-wider text-white" id="countdown" dir="ltr">00:00:00</div>
        </div>

        <!-- Prayer Times Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4" id="prayers-grid" dir="ltr">
            <div class="col-span-full text-center py-16">
                <svg class="w-12 h-12 text-slate-600 mx-auto mb-4 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <p class="text-slate-500">جاري جلب أوقات الصلاة من Aladhan API...</p>
            </div>
        </div>

        <!-- Qibla Direction -->
        <div class="mt-10 bg-slate-800 rounded-3xl p-8 text-center border border-slate-700">
            <h3 class="text-xl font-bold mb-4 text-white">🧭 اتجاه القبلة</h3>
            <p class="text-slate-400 mb-6">قم بتدوير جهازك لتحديد اتجاه القبلة (يعمل على الهواتف)</p>
            <div class="relative w-48 h-48 mx-auto">
                <div class="w-full h-full rounded-full bg-slate-700 border-4 border-slate-600 flex items-center justify-center">
                    <div id="qibla-arrow" class="text-5xl transition-transform duration-700" style="transform: rotate(0deg)">🕋</div>
                </div>
                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-3 text-xs font-bold text-slate-400">ش</div>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-3 text-xs font-bold text-slate-400">ج</div>
                <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 text-xs font-bold text-slate-400">غ</div>
                <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 text-xs font-bold text-slate-400">ق</div>
            </div>
            <p class="mt-4 text-slate-300" dir="ltr"><span id="qibla-degrees">—</span>° from North</p>
        </div>
    </div>

    @push('scripts')
    <script>
        const PRAYERS_AR = {
            'Fajr': 'الفجر',
            'Sunrise': 'الشروق',
            'Dhuhr': 'الظهر',
            'Asr': 'العصر',
            'Maghrib': 'المغرب',
            'Isha': 'العشاء'
        };
        const PRAYERS = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];
        let prayerTimes = {};

        function renderPrayers(timings) {
            const grid = document.getElementById('prayers-grid');
            grid.innerHTML = '';
            PRAYERS.forEach(prayer => {
                const time = timings[prayer];
                const card = document.createElement('div');
                card.className = 'bg-slate-800 border border-slate-700 rounded-2xl p-6 text-center hover:border-emerald-500 transition';
                card.innerHTML = `<p class="text-slate-400 text-sm mb-2 font-bold">${PRAYERS_AR[prayer]}</p><p class="text-2xl font-bold text-white">${time}</p>`;
                grid.appendChild(card);
            });
        }

        function getNextPrayer(timings) {
            const now = new Date();
            for (const prayer of ['Fajr', 'Dhuhr', 'Asr', 'Maghrib', 'Isha']) {
                const [h, m] = timings[prayer].split(':').map(Number);
                const prayerDate = new Date();
                prayerDate.setHours(h, m, 0, 0);
                if (prayerDate > now) {
                    return { name: PRAYERS_AR[prayer], time: timings[prayer], date: prayerDate };
                }
            }
            return null;
        }

        function startCountdown(nextPrayer) {
            if (!nextPrayer) return;
            document.getElementById('next-prayer-name').textContent = nextPrayer.name;
            document.getElementById('next-prayer-time').textContent = nextPrayer.time;
            setInterval(() => {
                const now = new Date();
                const diff = nextPrayer.date - now;
                if (diff <= 0) return location.reload();
                const h = String(Math.floor(diff / 3600000)).padStart(2, '0');
                const m = String(Math.floor((diff % 3600000) / 60000)).padStart(2, '0');
                const s = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
                document.getElementById('countdown').textContent = `${h}:${m}:${s}`;
            }, 1000);
        }

        function getQibla(lat, lng) {
            fetch(`https://api.aladhan.com/v1/qibla/${lat}/${lng}`)
                .then(r => r.json())
                .then(data => {
                    const direction = data.data.direction;
                    document.getElementById('qibla-degrees').textContent = Math.round(direction);
                    document.getElementById('qibla-arrow').style.transform = `rotate(${direction}deg)`;
                });
        }

        function fetchPrayerData(lat, lng, city = null) {
            if (city) {
                document.getElementById('location-label').textContent = `الموقع: ${city}`;
            } else {
                document.getElementById('location-label').textContent = `خط العرض: ${lat.toFixed(3)}, خط الطول: ${lng.toFixed(3)}`;
            }

            // Fetch prayer times using Method 21 (Moroccan Ministry of Habous)
            fetch(`https://api.aladhan.com/v1/timings?latitude=${lat}&longitude=${lng}&method=21`)
                .then(r => r.json())
                .then(data => {
                    prayerTimes = data.data.timings;
                    renderPrayers(prayerTimes);
                    startCountdown(getNextPrayer(prayerTimes));
                });

            // Fetch qibla
            getQibla(lat, lng);
        }

        function fallbackToIP() {
            document.getElementById('location-label').textContent = 'جاري تحديد الموقع تقريبياً...';
            fetch('https://ipapi.co/json/')
                .then(res => res.json())
                .then(data => {
                    if (data.latitude && data.longitude) {
                        fetchPrayerData(data.latitude, data.longitude, data.city || data.country_name);
                    } else {
                        document.getElementById('location-label').textContent = 'لم نتمكن من تحديد الموقع. افتراضياً: وجدة، المغرب';
                        fetchPrayerData(34.6814, -1.9086, 'وجدة، المغرب');
                    }
                })
                .catch(() => {
                    document.getElementById('location-label').textContent = 'تعذر تحديد الموقع. افتراضياً: وجدة، المغرب';
                    fetchPrayerData(34.6814, -1.9086, 'وجدة، المغرب');
                });
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(pos => {
                const { latitude: lat, longitude: lng } = pos.coords;
                fetchPrayerData(lat, lng);
            }, () => {
                // If user denies or error occurs, fallback to IP
                fallbackToIP();
            });
        } else {
            fallbackToIP();
        }
    </script>
    @endpush
</x-layouts.public>
