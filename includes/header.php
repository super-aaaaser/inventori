<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Aplikasi-Style Web (Tailwind)</title>

    <!-- Tailwind -->
    <link rel="stylesheet" href="/inventori/assets/css/tailwind.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/inventori/assets/css/style.css">
    <script src="/inventori/assets/js/alpine.min.js" defer></script>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <!-- MOBILE APP SHELL -->
    <div class=" app-sell max-w-[640px] h-screen mx-auto shadow-xl overflow-hidden flex flex-col">

        <!-- TOP APP BAR -->


        <header class="flex items-center justify-between px-4 py-3 bg-gradient-to-r from-gray-900 to-gray-800 text-white shadow-lg relative">

            <!-- Left Title -->
            <div class="flex flex-col leading-tight">
                <span class="text-sm font-semibold">My App</span>
                <span class="text-xs opacity-85">Welcome back, Nasir</span>
            </div>

            <!-- Right Icons + Profile Dropdown -->
            <div class="flex items-center gap-2" x-data="{ open: false }">

                <!-- Search -->
                <button class="p-2 rounded-full bg-white/20 hover:bg-white/30 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16.65 16.65A7 7 0 1010 17a7 7 0 006.65-.35z" />
                    </svg>
                </button>

                <!-- Avatar -->
                <button @click="open = !open">
                    <img src="https://i.pravatar.cc/80?img=3"
                        class="rounded-full w-8 h-8 border border-white/30 shadow-sm cursor-pointer" />
                </button>

                <!-- Dropdown -->
                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute top-14 right-3 bg-white text-gray-700 rounded-lg shadow-lg w-40 py-2 z-50">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-sm">Profil</a>
                    <a href="/inventori/user/list" class="block px-4 py-2 hover:bg-gray-100 text-sm">Manage Akun</a>
                    <hr class="my-1 border-gray-200">
                    <a href="#" class="block px-4 py-2 hover:bg-red-50 text-sm text-red-600">Logout</a>
                </div>

            </div>

        </header>