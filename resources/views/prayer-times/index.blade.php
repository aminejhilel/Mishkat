<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prayer Times - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-900 text-white min-h-screen">

    <nav class="bg-slate-900/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">I</div>
                    <span class="font-bold text-xl">Islamic<span class="text-emerald-400">App</span></span>
                </a>
                <div class="flex gap-6 text-sm font-medium text-slate-400">
                    <a href="{{ route('quran.index') }}" class="hover:text-white transition">Quran</a>
                    <a href="{{ route('prayer-times.index') }}" class="text-emerald-400">Prayers</a>
                    <a href="{{ route('adhkar.index') }}" class="hover:text-white transition">Adhkar</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-4 py-16">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-3">🕌 Prayer Times</h1>
            <p class="text-slate-400" id="location-label">Detecting your location...</p>
        </div>

        <!-- Next Prayer Countdown -->
        <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-3xl p-10 text-center mb-10 shadow-2xl shadow-emerald-900/50">
            <p class="text-emerald-200 text-sm font-semibold uppercase tracking-widest mb-2">Next Prayer</p>
            <h2 class="text-4xl font-bold mb-1" id="next-prayer-name">—</h2>
            <p class="text-emerald-200 text-lg mb-6" id="next-prayer-time">—</p>
            <div class="text-6xl font-mono font-bold tracking-wider" id="countdown">00:00:00</div>
        </div>

        <!-- Prayer Times Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4" id="prayers-grid">
            <div class="col-span-full text-center py-16">
                <svg class="w-12 h-12 text-slate-600 mx-auto mb-4 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <p class="text-slate-500">Fetching prayer times from Aladhan API...</p>
            </div>
        </div>

        <!-- Qibla Direction -->
        <div class="mt-10 bg-slate-800 rounded-3xl p-8 text-center border border-slate-700">
            <h3 class="text-xl font-bold mb-4">🧭 Qibla Direction</h3>
            <p class="text-slate-400 mb-6">Rotate your device to face the Qibla</p>
            <div class="relative w-48 h-48 mx-auto">
                <div class="w-full h-full rounded-full bg-slate-700 border-4 border-slate-600 flex items-center justify-center">
                    <div id="qibla-arrow" class="text-5xl transition-transform duration-700" style="transform: rotate(0deg)">🕋</div>
                </div>
                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-3 text-xs font-bold text-slate-400">N</div>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-3 text-xs font-bold text-slate-400">S</div>
                <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 text-xs font-bold text-slate-400">W</div>
                <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 text-xs font-bold text-slate-400">E</div>
            </div>
            <p class="mt-4 text-slate-300"><span id="qibla-degrees">—</span>° from North</p>
        </div>
    </div>

    <script>
        const PRAYERS = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];
        let prayerTimes = {};

        function renderPrayers(timings) {
            const grid = document.getElementById('prayers-grid');
            grid.innerHTML = '';
            PRAYERS.forEach(prayer => {
                const time = timings[prayer];
                const card = document.createElement('div');
                card.className = 'bg-slate-800 border border-slate-700 rounded-2xl p-6 text-center hover:border-emerald-500 transition';
                card.innerHTML = `<p class="text-slate-400 text-sm mb-2">${prayer}</p><p class="text-2xl font-bold">${time}</p>`;
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
                    return { name: prayer, time: timings[prayer], date: prayerDate };
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

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(pos => {
                const { latitude: lat, longitude: lng } = pos.coords;
                document.getElementById('location-label').textContent = `Lat: ${lat.toFixed(3)}, Lng: ${lng.toFixed(3)}`;

                // Fetch prayer times
                fetch(`https://api.aladhan.com/v1/timings?latitude=${lat}&longitude=${lng}&method=2`)
                    .then(r => r.json())
                    .then(data => {
                        prayerTimes = data.data.timings;
                        renderPrayers(prayerTimes);
                        startCountdown(getNextPrayer(prayerTimes));
                    });

                // Fetch qibla
                getQibla(lat, lng);
            }, () => {
                document.getElementById('location-label').textContent = 'Location access denied. Please allow location in your browser.';
            });
        }
    </script>
</body>
</html>
