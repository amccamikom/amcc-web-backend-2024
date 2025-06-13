<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car API Rental</title>
    <!-- Tailwind CSS -->
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
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdfa;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2314b8a6' fill-opacity='0.08'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(20, 184, 166, 0.1), 0 10px 10px -5px rgba(20, 184, 166, 0.04);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="card bg-white rounded-2xl shadow-xl p-10 md:p-10 max-w-md w-full relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 w-40 h-40 bg-teal-100 rounded-full -mr-20 -mt-20 opacity-70"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-teal-100 rounded-full -ml-12 -mb-12 opacity-70"></div>
        <div class="relative z-10">
            <!-- Main content -->
            <div class="text-center py-2">
                <h1 class="text-5xl font-bold text-teal-700 tracking-tight mb-3">
                    Car API Rental
                </h1>
                <div class="h-1 w-24 bg-gradient-to-r from-teal-400 to-teal-600 mx-auto my-6 rounded-full"></div>
                <p class="text-teal-600 text-lg font-light tracking-wide">
                    Simple, fast, reliable car rental API service
                </p>
                <!-- API version badge -->
                <div class="mt-8 flex justify-center">
                    <span
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-teal-100 to-teal-200 border border-teal-300 rounded-full text-teal-700 text-sm font-semibold shadow-sm">
                        API v1.0
                    </span>
                </div>
                <!-- Tautan dokumentasi -->
                <div class="mt-4 flex justify-center">
                    <a href="https://github.com/amccamikom/amcc-web-backend-2024/tree/car-rental-api"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-full shadow-lg font-semibold hover:from-teal-600 hover:to-teal-700 transition-all duration-200 transform hover:-translate-y-1"
                        target="_blank">
                        Baca Dokumentasi
                    </a>
                </div>
            </div>
            <!-- Bottom dots -->
            <div class="mt-10 flex justify-center space-x-2">
                <span class="inline-block h-2 w-2 rounded-full bg-teal-300"></span>
                <span class="inline-block h-2 w-2 rounded-full bg-teal-500"></span>
                <span class="inline-block h-2 w-2 rounded-full bg-teal-700"></span>
            </div>
        </div>
    </div>
</body>

</html>
