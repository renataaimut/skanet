<?php
session_start();

if($_SESSION['status']<>"sukses"){
    header('location:logout.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu Utama</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        @keyframes float {

            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-7px);
            }

        }

        @keyframes bounceCute {

            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }

        }

        @keyframes sparkle {

            0%, 100% {
                opacity: .4;
                transform: scale(.8);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }

        }

        @keyframes wiggle {

            0%, 100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-3deg);
            }

            75% {
                transform: rotate(3deg);
            }

        }

        .float {
            animation: float 3s ease-in-out infinite;
        }

        .bounce {
            animation: bounceCute 2.5s ease-in-out infinite;
        }

        .sparkle {
            animation: sparkle 2s ease-in-out infinite;
        }

        .wiggle:hover {
            animation: wiggle .4s ease-in-out;
        }

        ::-webkit-scrollbar {
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #fdf2f8;
        }

        ::-webkit-scrollbar-thumb {
            background: #f9a8d4;
            border-radius: 20px;
        }

    </style>

</head>


<body class="min-h-screen bg-gradient-to-br from-pink-200 via-pink-50 to-pink-300">


    <!-- ================= NAVBAR ================= -->

    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b-2 border-pink-100 shadow-md">

        <div class="max-w-6xl mx-auto px-5">

            <div class="h-16 flex items-center justify-between">

                <!-- LOGO -->

                <a href="index.php"
                   class="flex items-center gap-2 text-pink-500 font-bold text-lg">

                    <span class="text-2xl float">
                        🎀
                    </span>

                    <span>
                        SMKN TAKERAN
                    </span>

                </a>


                <!-- MENU DESKTOP -->

                <div class="hidden md:flex items-center gap-1">

                    <a href="index.php"
                       class="px-3 py-2 rounded-xl bg-pink-100 text-pink-600 font-bold hover:bg-pink-200 transition">
                        🏠 Beranda
                    </a>

                    <a href="siswa"
                       class="px-3 py-2 rounded-xl text-pink-600 font-semibold hover:bg-pink-100 transition">
                        👩‍🎓 Siswa
                    </a>

                    <a href="guru"
                       class="px-3 py-2 rounded-xl text-pink-600 font-semibold hover:bg-pink-100 transition">
                        👨‍🏫 Guru
                    </a>

                    <a href="mapel"
                       class="px-3 py-2 rounded-xl text-pink-600 font-semibold hover:bg-pink-100 transition">
                        📚 Mapel
                    </a>

                    <a href="nilai"
                       class="px-3 py-2 rounded-xl text-pink-600 font-semibold hover:bg-pink-100 transition">
                        📝 Nilai
                    </a>

                    <a href="logout.php"
                       class="ml-2 px-4 py-2 rounded-xl bg-pink-400 text-white font-bold hover:bg-pink-500 transition shadow-sm">
                        🎀 Logout
                    </a>

                </div>


                <!-- MOBILE BUTTON -->

                <button
                    onclick="document.getElementById('mobileMenu').classList.toggle('hidden')"
                    class="md:hidden text-pink-500 text-2xl">

                    ☰

                </button>

            </div>


            <!-- MOBILE MENU -->

            <div id="mobileMenu" class="hidden md:hidden pb-4 space-y-1">

                <a href="index.php"
                   class="block px-4 py-2 rounded-xl bg-pink-100 text-pink-600 font-bold">
                    🏠 Beranda
                </a>

                <a href="siswa"
                   class="block px-4 py-2 rounded-xl text-pink-600 font-semibold hover:bg-pink-100">
                    👩‍🎓 Siswa
                </a>

                <a href="guru"
                   class="block px-4 py-2 rounded-xl text-pink-600 font-semibold hover:bg-pink-100">
                    👨‍🏫 Guru
                </a>

                <a href="mapel"
                   class="block px-4 py-2 rounded-xl text-pink-600 font-semibold hover:bg-pink-100">
                    📚 Mapel
                </a>

                <a href="nilai"
                   class="block px-4 py-2 rounded-xl text-pink-600 font-semibold hover:bg-pink-100">
                    📝 Nilai
                </a>

                <a href="logout.php"
                   class="block px-4 py-2 rounded-xl bg-pink-400 text-white font-semibold">
                    🎀 Logout
                </a>

            </div>

        </div>

    </nav>


    <!-- ================= HIASAN ================= -->

    <div class="fixed top-24 left-7 text-pink-400 text-3xl float">
        ♡
    </div>

    <div class="fixed top-24 right-8 text-pink-300 text-3xl bounce">
        🌸
    </div>

    <div class="fixed top-40 left-20 text-pink-300 text-xl sparkle">
        ✦
    </div>

    <div class="fixed bottom-8 left-8 text-pink-300 text-2xl bounce">
        ♡
    </div>

    <div class="fixed bottom-7 right-8 text-pink-400 text-2xl float">
        🎀
    </div>


    <!-- ================= CONTENT ================= -->

    <main class="min-h-screen flex items-center justify-center px-5 pt-24 pb-10">

        <div class="w-full max-w-md">

            <!-- CARD -->

            <div class="relative bg-white rounded-[35px] shadow-2xl border-2 border-pink-100 p-6 overflow-hidden">


                <!-- HIASAN BULAT -->

                <div class="absolute -top-12 -right-12 w-32 h-32 bg-pink-100 rounded-full"></div>

                <div class="absolute -bottom-16 -left-16 w-36 h-36 bg-pink-50 rounded-full"></div>


                <!-- ================= HEADER ================= -->

                <div class="relative z-10 text-center">


                    <!-- BUNNY -->

                    <div class="bounce relative w-28 h-28 mx-auto mb-3">


                        <!-- TELINGA KIRI -->

                        <div class="absolute left-3 top-0 w-9 h-20 bg-pink-300 rounded-full rotate-[-12deg] border-2 border-pink-400">

                            <div class="absolute left-2 top-3 w-4 h-12 bg-pink-100 rounded-full"></div>

                        </div>


                        <!-- TELINGA KANAN -->

                        <div class="absolute right-3 top-0 w-9 h-20 bg-pink-300 rounded-full rotate-[12deg] border-2 border-pink-400">

                            <div class="absolute right-2 top-3 w-4 h-12 bg-pink-100 rounded-full"></div>

                        </div>


                        <!-- KEPALA -->

                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-24 bg-pink-300 rounded-full border-2 border-pink-400 shadow-lg">


                            <!-- MATA -->

                            <div class="absolute left-6 top-9 w-3 h-4 bg-gray-700 rounded-full">

                                <div class="absolute top-1 left-1 w-1 h-1 bg-white rounded-full"></div>

                            </div>

                            <div class="absolute right-6 top-9 w-3 h-4 bg-gray-700 rounded-full">

                                <div class="absolute top-1 left-1 w-1 h-1 bg-white rounded-full"></div>

                            </div>


                            <!-- PIPI -->

                            <div class="absolute left-2 top-14 w-6 h-2.5 bg-pink-400 rounded-full"></div>

                            <div class="absolute right-2 top-14 w-6 h-2.5 bg-pink-400 rounded-full"></div>


                            <!-- HIDUNG -->

                            <div class="absolute left-1/2 top-14 -translate-x-1/2 w-2.5 h-2.5 bg-pink-600 rounded-full"></div>


                            <!-- MULUT -->

                            <div class="absolute left-1/2 top-[67px] -translate-x-1/2 text-pink-700 font-bold">
                                ᴗ
                            </div>


                            <!-- PITA -->

                            <div class="absolute -right-4 top-1">

                                <div class="absolute w-7 h-7 bg-pink-500 rounded-full rotate-[-25deg]"></div>

                                <div class="absolute left-5 w-7 h-7 bg-pink-500 rounded-full rotate-[25deg]"></div>

                                <div class="absolute left-2.5 top-2 w-5 h-5 bg-pink-300 rounded-full border-2 border-pink-500"></div>

                            </div>

                        </div>

                    </div>


                    <h1 class="text-3xl font-extrabold text-pink-500">
                        ♡ Menu Utama ♡
                    </h1>

                    <p class="text-pink-400 text-sm mt-1">
                        Haii, selamat datang! 🎀
                    </p>

                    <div class="mt-2 text-pink-300 text-xs">
                        ✦ Pilih menu yang kamu mau ✦
                    </div>

                </div>


                <!-- ================= MENU KOTAK ================= -->

                <div class="relative z-10 grid grid-cols-2 gap-4 mt-6">


                    <!-- SISWA -->

                    <a href="siswa"
                       class="wiggle group relative bg-pink-50 border-2 border-pink-100 rounded-[25px] p-5 text-center shadow-sm hover:shadow-xl hover:bg-pink-100 hover:-translate-y-2 transition-all duration-300">

                        <div class="absolute top-2 right-3 text-pink-300 text-sm">
                            ♡
                        </div>

                        <div class="w-16 h-16 mx-auto bg-white rounded-[20px] flex items-center justify-center text-4xl shadow-sm group-hover:scale-110 transition duration-300">
                            👩‍🎓
                        </div>

                        <h2 class="mt-3 text-pink-600 font-bold text-lg">
                            Siswa
                        </h2>

                        <p class="text-[11px] text-pink-300 mt-1">
                            Data Siswa
                        </p>

                    </a>


                    <!-- GURU -->

                    <a href="guru"
                       class="wiggle group relative bg-pink-50 border-2 border-pink-100 rounded-[25px] p-5 text-center shadow-sm hover:shadow-xl hover:bg-pink-100 hover:-translate-y-2 transition-all duration-300">

                        <div class="absolute top-2 right-3 text-pink-300 text-sm">
                            ♡
                        </div>

                        <div class="w-16 h-16 mx-auto bg-white rounded-[20px] flex items-center justify-center text-4xl shadow-sm group-hover:scale-110 transition duration-300">
                            👨‍🏫
                        </div>

                        <h2 class="mt-3 text-pink-600 font-bold text-lg">
                            Guru
                        </h2>

                        <p class="text-[11px] text-pink-300 mt-1">
                            Data Guru
                        </p>

                    </a>


                    <!-- MAPEL -->

                    <a href="mapel"
                       class="wiggle group relative bg-pink-50 border-2 border-pink-100 rounded-[25px] p-5 text-center shadow-sm hover:shadow-xl hover:bg-pink-100 hover:-translate-y-2 transition-all duration-300">

                        <div class="absolute top-2 right-3 text-pink-300 text-sm">
                            ♡
                        </div>

                        <div class="w-16 h-16 mx-auto bg-white rounded-[20px] flex items-center justify-center text-4xl shadow-sm group-hover:scale-110 transition duration-300">
                            📚
                        </div>

                        <h2 class="mt-3 text-pink-600 font-bold text-lg">
                            Mapel
                        </h2>

                        <p class="text-[11px] text-pink-300 mt-1">
                            Mata Pelajaran
                        </p>

                    </a>


                    <!-- NILAI -->

                    <a href="nilai"
                       class="wiggle group relative bg-pink-50 border-2 border-pink-100 rounded-[25px] p-5 text-center shadow-sm hover:shadow-xl hover:bg-pink-100 hover:-translate-y-2 transition-all duration-300">

                        <div class="absolute top-2 right-3 text-pink-300 text-sm">
                            ♡
                        </div>

                        <div class="w-16 h-16 mx-auto bg-white rounded-[20px] flex items-center justify-center text-4xl shadow-sm group-hover:scale-110 transition duration-300">
                            📝
                        </div>

                        <h2 class="mt-3 text-pink-600 font-bold text-lg">
                            Nilai
                        </h2>

                        <p class="text-[11px] text-pink-300 mt-1">
                            Data Nilai
                        </p>

                    </a>

                </div>


                <!-- ================= FOOTER ================= -->

                <div class="relative z-10 text-center mt-7">

                    <div class="text-pink-300 text-sm">
                        ♡　🌸　♡　🎀　♡
                    </div>

                    <p class="text-xs text-pink-300 mt-2">
                        Sistem Informasi Sekolah
                    </p>

                </div>


            </div>

        </div>

    </main>

</body>

</html>