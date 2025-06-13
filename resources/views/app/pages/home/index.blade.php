<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/icons/car.webp') }}" type="image/x-icon">
    <title>Home - Car Rental API</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        teal: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            300: '#5eead4',
                            400: '#2dd4bf',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* background-color: #f0fdfa; */
            /* teal-50 */
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>
</head>

<body class="antialiased min-h-screen">
    <header class="absolute w-full z-30">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16 md:h-20">
                <a class="flex-shrink-0" href="/">
                    <h2 class="text-2xl font-bold text-teal-700 hover:text-teal-600 transition">
                        CarRental API
                    </h2>
                </a>
                <nav class="flex items-center space-x-6">
                    <a href="{{ route('docs') }}"
                        class="font-medium text-slate-600 hover:text-teal-600 transition duration-150 ease-in-out">
                        Docs
                    </a>
                    <a href="https://github.com/amccamikom/amcc-web-backend-2024/tree/car-rental-api" target="_blank"
                        rel="noopener noreferrer" class="text-slate-500 hover:text-teal-600 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.168 6.839 9.492.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.378.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.338 4.695-4.566 4.942.359.308.678.92.678 1.852 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </header>
    <main class="relative overflow-hidden">
        <section class="relative pt-24 pb-12 md:pt-32 md:pb-20">
            <div class="absolute inset-0 bg-teal-50 overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 bg-teal-200 rounded-full -mr-48 -mt-48 opacity-50"></div>
                <div class="absolute bottom-0 left-0 w-72 h-72 bg-teal-200 rounded-full -ml-32 -mb-32 opacity-50"></div>
            </div>
            <div class="relative max-w-6xl mx-auto px-4 sm:px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="text-center md:text-left">
                        <span
                            class="inline-block px-4 py-1.5 bg-teal-100 text-teal-700 font-semibold text-sm rounded-full mb-4 shadow-sm">API
                            v1.0 - Ready to Use</span>
                        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tighter text-teal-900 mb-6">
                            Bangun Aplikasi Rental Mobil Modern
                        </h1>
                        <p class="text-xl text-slate-600 mb-8">
                            API RESTful yang tangguh dan mudah diintegrasikan untuk mengelola mobil, booking, dan data
                            pengguna dengan efisien.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <a href="{{ route('docs') }}"
                                class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-lg shadow-lg font-semibold hover:from-teal-600 hover:to-teal-700 transition-all duration-300 transform hover:-translate-y-1">
                                Baca Dokumentasi
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                            <a href="https://github.com/amccamikom/amcc-web-backend-2024" target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-teal-600 border border-teal-300 rounded-lg shadow-sm font-semibold hover:bg-teal-50 hover:border-teal-400 transition-all duration-300 transform hover:-translate-y-1">
                                Lihat di GitHub
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="relative">
                            <div class="animate-float">
                                <svg class="w-full h-auto" viewBox="0 0 550 450" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path fill="#CCFBF1"
                                            d="M126 333.84C56.417 333.84 0 277.423 0 207.84S56.417 81.84 126 81.84c66.443 0 121.23 50.838 127.947 115.828 6.002-34.91 35.84-61.668 71.94-61.668 40.525 0 73.498 32.973 73.498 73.499s-32.973 73.5-73.498 73.5c-3.13 0-6.195-.198-9.172-.58C283.47 302.213 226.85 348.84 158 348.84c-10.74 0-21.205-1.32-31.144-3.805A122.997 122.997 0 0 0 126 333.84z"
                                            transform="translate(120 20)" />
                                        <rect fill="#0D9488" x="20" y="200" width="400" height="220"
                                            rx="12" />
                                        <rect fill="#FFF" x="35" y="215" width="370" height="190"
                                            rx="6" />
                                        <path d="M45 255h350v2H45z" fill="#E5E7EB" />
                                        <path d="M45 295h350v2H45z" fill="#E5E7EB" />
                                        <path d="M45 335h350v2H45z" fill="#E5E7EB" />
                                        <path d="M45 375h350v2H45z" fill="#E5E7EB" />
                                        <g fill="#2DD4BF">
                                            <circle cx="55" cy="235" r="8" />
                                            <rect x="75" y="232" width="100" height="6" rx="3" />
                                            <circle cx="55" cy="275" r="8" />
                                            <rect x="75" y="272" width="280" height="6" rx="3" />
                                            <circle cx="55" cy="315" r="8" />
                                            <rect x="75" y="312" width="180" height="6" rx="3" />
                                            <circle cx="55" cy="355" r="8" />
                                            <rect x="75" y="352" width="220" height="6" rx="3" />
                                        </g>
                                        <g transform="translate(380 50)">
                                            <path
                                                d="M86.5 173c-47.782 0-86.5-38.718-86.5-86.5S38.718 0 86.5 0 173 38.718 173 86.5c0 43.52-32.23 79.625-73.743 85.454l-13.014 29.09C82.59 200.74 76.5 204.5 70 204.5c-11.046 0-20-8.954-20-20v-24.544C27.994 150.84 0 121.288 0 86.5 0 38.718 38.718 0 86.5 0"
                                                fill="#F0FDF4" opacity=".6" />
                                            <path fill="#10B981"
                                                d="M129.873 75.52l-40.73 40.73-19.13-19.13c-2.44-2.44-6.39-2.44-8.83 0-2.44 2.438-2.44 6.39 0 8.828l23.545 23.545c2.44 2.44 6.39 2.44 8.83 0l45.145-45.144c2.44-2.438 2.44-6.39 0-8.828-2.44-2.44-6.39-2.44-8.83 0z" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-white border border-solid border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">
            <div class="text-center text-slate-500">
                &copy; {{ date('Y') }} Car Rental API. Dibuat dengan 💚 oleh <a
                    class="text-teal-600 hover:underline" href="https://github.com/salmanabdurrahman"
                    target="_blank">Salman</a>.
            </div>
        </div>
    </footer>
</body>

</html>
