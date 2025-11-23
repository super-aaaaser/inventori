<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Aplikasi-Style Web (Tailwind)</title>
  <!-- Tailwind Play CDN (for quick demo). For production, compile Tailwind properly. -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Small helper to mimic Android-like status bar area on desktop */
    .app-shell {
      max-width: 420px;
      height: 100vh;
      margin: auto;
      border: 1px solid #e5e7eb;
      border-radius: 18px;
      overflow: hidden;
      background: white;
    }

    /* make bottom safe-area on iOS style */
    .bottom-nav {
      padding-bottom: env(safe-area-inset-bottom);
    }
  </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
  <div class="app-shell shadow-xl flex flex-col">
    <!-- Top App Bar -->
    <header class="flex items-center justify-between px-4 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
      <div class="flex items-center gap-3">
        <button aria-label="menu" class="p-2 rounded-lg bg-white/10 hover:bg-white/20">
          <!-- menu icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        <div>
          <div class="text-sm font-medium">My App</div>
          <div class="text-xs opacity-80">Welcome back, Nasir</div>
        </div>
      </div>
      <div class="flex items-center gap-2">
        <button class="p-2 rounded-full bg-white/10 hover:bg-white/20">
          <!-- search -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7 7 0 1010 17a7 7 0 006.65-.35z" />
          </svg>
        </button>
        <img src="https://i.pravatar.cc/40?img=3" alt="avatar" class="rounded-full w-8 h-8" />
      </div>
    </header>

    <!-- Content area -->
    <main class="flex-1 overflow-auto p-4 relative">
      <!-- Hero / Quick actions -->
      <section class="mb-4">
        <div class="rounded-2xl p-4 bg-gradient-to-r from-white to-gray-50 shadow-sm">
          <h2 class="text-lg font-semibold">Halo, Nasir 👋</h2>
          <p class="text-sm text-gray-500">Apa yang ingin kamu lakukan hari ini?</p>

          <div class="mt-3 grid grid-cols-4 gap-3">
            <button class="flex flex-col items-center gap-1 p-2 bg-indigo-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2 5a2 2 0 012-2h3.5a1 1 0 01.707.293l1.207 1.207A1 1 0 0010.914 5H16a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V5z" />
                </svg></div>
              <span class="text-xs">Folder</span>
            </button>
            <button class="flex flex-col items-center gap-1 p-2 bg-green-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-9H7v2h6V9z" clip-rule="evenodd" />
                </svg></div>
              <span class="text-xs">Baru</span>
            </button>
            <button class="flex flex-col items-center gap-1 p-2 bg-yellow-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2 11a1 1 0 011-1h14a1 1 0 110 2H3a1 1 0 01-1-1z" />
                </svg></div>
              <span class="text-xs">Bagikan</span>
            </button>
            <button class="flex flex-col items-center gap-1 p-2 bg-pink-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM2 16a6 6 0 0112 0H2z" />
                </svg></div>
              <span class="text-xs">Profil</span>
            </button>
          </div>
        </div>
      </section>
      <section class="mb-4">
        <div class="rounded-2xl p-4 bg-gradient-to-r from-white to-gray-50 shadow-sm">
          <h2 class="text-lg font-semibold">Halo, Nasir 👋</h2>
          <p class="text-sm text-gray-500">Apa yang ingin kamu lakukan hari ini?</p>

          <div class="mt-3 grid grid-cols-4 gap-3">
            <button class="flex flex-col items-center gap-1 p-2 bg-indigo-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2 5a2 2 0 012-2h3.5a1 1 0 01.707.293l1.207 1.207A1 1 0 0010.914 5H16a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V5z" />
                </svg></div>
              <span class="text-xs">Folder</span>
            </button>
            <button class="flex flex-col items-center gap-1 p-2 bg-green-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-9H7v2h6V9z" clip-rule="evenodd" />
                </svg></div>
              <span class="text-xs">Baru</span>
            </button>
            <button class="flex flex-col items-center gap-1 p-2 bg-yellow-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2 11a1 1 0 011-1h14a1 1 0 110 2H3a1 1 0 01-1-1z" />
                </svg></div>
              <span class="text-xs">Bagikan</span>
            </button>
            <button class="flex flex-col items-center gap-1 p-2 bg-pink-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM2 16a6 6 0 0112 0H2z" />
                </svg></div>
              <span class="text-xs">Profil</span>
            </button>
          </div>
        </div>
      </section>
      <section class="mb-4">
        <div class="rounded-2xl p-4 bg-gradient-to-r from-white to-gray-50 shadow-sm">
          <h2 class="text-lg font-semibold">Halo, Nasir 👋</h2>
          <p class="text-sm text-gray-500">Apa yang ingin kamu lakukan hari ini?</p>

          <div class="mt-3 grid grid-cols-4 gap-3">
            <button class="flex flex-col items-center gap-1 p-2 bg-indigo-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2 5a2 2 0 012-2h3.5a1 1 0 01.707.293l1.207 1.207A1 1 0 0010.914 5H16a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V5z" />
                </svg></div>
              <span class="text-xs">Folder</span>
            </button>
            <button class="flex flex-col items-center gap-1 p-2 bg-green-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-9H7v2h6V9z" clip-rule="evenodd" />
                </svg></div>
              <span class="text-xs">Baru</span>
            </button>
            <button class="flex flex-col items-center gap-1 p-2 bg-yellow-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2 11a1 1 0 011-1h14a1 1 0 110 2H3a1 1 0 01-1-1z" />
                </svg></div>
              <span class="text-xs">Bagikan</span>
            </button>
            <button class="flex flex-col items-center gap-1 p-2 bg-pink-50 rounded-lg">
              <div class="p-2 rounded-lg bg-white shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM2 16a6 6 0 0112 0H2z" />
                </svg></div>
              <span class="text-xs">Profil</span>
            </button>
          </div>
        </div>
      </section>

      <!-- Cards list -->
      <section class="space-y-3">
        <article class="bg-white rounded-2xl p-4 shadow-sm">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h3 class="font-semibold">Tugas Terbaru</h3>
              <p class="text-sm text-gray-500">3 tugas belum selesai</p>
            </div>
            <div class="text-sm text-indigo-600 font-medium">Lihat</div>
          </div>
          <div class="mt-3 grid grid-cols-3 gap-3 text-xs">
            <div class="bg-gray-50 rounded-lg p-2">Pemrograman</div>
            <div class="bg-gray-50 rounded-lg p-2">Multimedia</div>
            <div class="bg-gray-50 rounded-lg p-2">Grafis</div>
          </div>
        </article>

        <article class="bg-white rounded-2xl p-4 shadow-sm">
          <div class="flex items-center justify-between">
            <h3 class="font-semibold">Notifikasi</h3>
            <div class="text-xs text-gray-500">Baru</div>
          </div>
          <ul class="mt-3 space-y-2">
            <li class="flex items-start gap-3">
              <div class="w-9 h-9 rounded-lg bg-indigo-100 flex items-center justify-center">A</div>
              <div class="flex-1 text-sm">
                <div class="font-medium">Update Kurikulum</div>
                <div class="text-xs text-gray-500">2 jam lalu</div>
              </div>
            </li>
            <li class="flex items-start gap-3">
              <div class="w-9 h-9 rounded-lg bg-green-100 flex items-center justify-center">M</div>
              <div class="flex-1 text-sm">
                <div class="font-medium">Meeting Lab</div>
                <div class="text-xs text-gray-500">Kemarin</div>
              </div>
            </li>
          </ul>
        </article>

        <!-- A simple list / feed -->
        <article class="bg-white rounded-2xl p-4 shadow-sm">
          <h3 class="font-semibold">Feed</h3>
          <div class="mt-3 space-y-3">
            <div class="text-sm">🔔 Pengumuman: Perpindahan jadwal praktikum hari Jumat.</div>
            <div class="text-sm">📝 Tips: Gunakan Git untuk versi kontrol proyek siswa.</div>
          </div>
        </article>
      </section>

      <div class="h-24"></div>
      <!-- spacing for bottom nav + fab -->
      <button id="fab"
        class="sticky bottom-6 right-20 -translate-x-20 bg-indigo-600 text-white p-4 rounded-full shadow-2xl transform hover:scale-105">
        +
      </button>
    </main>

    <!-- Floating Action Button -->


    <!-- Bottom Navigation -->
    <nav class="bottom-nav bg-white border-t px-4 py-2 flex items-center justify-between">
      <div class="flex items-center gap-6 w-full justify-between">
        <button class="flex flex-col items-center text-xs">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-0.5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 2a6 6 0 016 6v5a1 1 0 01-1 1h-2v2a1 1 0 01-1 1H8a1 1 0 01-1-1v-2H5a1 1 0 01-1-1V8a6 6 0 015-6z" />
          </svg>
          Home
        </button>
        <button class="flex flex-col items-center text-xs opacity-70">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-0.5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM2 16a6 6 0 0112 0H2z" />
          </svg>
          Profil
        </button>
        <div class="w-12"></div> <!-- space for FAB */ -->
        <button class="flex flex-col items-center text-xs opacity-70">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-0.5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H8l-6 3V5z" />
          </svg>
          Pesan
        </button>
        <button class="flex flex-col items-center text-xs opacity-70">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-0.5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M3 3h14v2H3V3zM3 7h14v10H3V7z" />
          </svg>
          Lainnya
        </button>
      </div>
    </nav>
  </div>

  <script>
    // Small interactive touches
    document.getElementById('fab').addEventListener('click', function() {
      alert('FAB diklik — buat item baru!');
    });
  </script>
</body>

</html>