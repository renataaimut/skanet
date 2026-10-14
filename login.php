<?php
include "koneksi.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($query);

    if ($cek > 0) {

        session_start();

        $_SESSION['status'] = "sukses";
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];

        header('location:index.php');
        exit;
    } else {
        $pesan = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login ♡</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        * {
            box-sizing: border-box;
        }

        @keyframes float {

            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }

            100% {
                transform: translateY(0px);
            }

        }

        @keyframes wiggle {

            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-5deg);
            }

            50% {
                transform: rotate(5deg);
            }

            75% {
                transform: rotate(-3deg);
            }

            100% {
                transform: rotate(0deg);
            }

        }

        @keyframes sparkle {

            0% {
                transform: scale(0.8);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(0.8);
                opacity: 0.5;
            }

        }

        @keyframes heart {

            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.15);
            }

            100% {
                transform: scale(1);
            }

        }

        .float {
            animation: float 3s ease-in-out infinite;
        }

        .wiggle {
            animation: wiggle 2s ease-in-out infinite;
        }

        .sparkle {
            animation: sparkle 2s ease-in-out infinite;
        }

        .heart {
            animation: heart 1.8s ease-in-out infinite;
        }

        .cute-shadow {
            box-shadow:
                0 15px 35px rgba(236, 72, 153, 0.15),
                0 5px 12px rgba(244, 114, 182, 0.10);
        }

    </style>

</head>


<body class="min-h-screen bg-gradient-to-br from-pink-200 via-pink-50 to-pink-300 flex items-center justify-center overflow-hidden">


    <!-- ================= HIASAN ================= -->

    <div class="float absolute top-8 left-8 text-pink-400 text-4xl">
        ♡
    </div>

    <div class="sparkle absolute top-12 left-1/4 text-pink-300 text-2xl">
        ✦
    </div>

    <div class="sparkle absolute top-10 right-12 text-pink-400 text-3xl">
        🌸
    </div>

    <div class="heart absolute top-1/3 right-8 text-pink-300 text-3xl">
        ♡
    </div>

    <div class="sparkle absolute bottom-16 left-12 text-pink-300 text-2xl">
        ✦
    </div>

    <div class="float absolute bottom-8 right-10 text-pink-400 text-3xl">
        🎀
    </div>

    <div class="heart absolute bottom-1/3 left-8 text-pink-300 text-2xl">
        ♡
    </div>


    <!-- ================= LOGIN ================= -->

    <div class="w-full max-w-sm px-5 py-8">


        <!-- CARD UTAMA -->

        <div class="bg-white rounded-[35px] cute-shadow p-7 border-4 border-pink-100 relative overflow-hidden">


            <!-- Dekorasi Card -->

            <div class="absolute -top-8 -right-8 w-24 h-24 bg-pink-100 rounded-full opacity-70"></div>

            <div class="absolute -bottom-10 -left-10 w-28 h-28 bg-pink-50 rounded-full"></div>


            <div class="relative z-10">


                <!-- ================= KARAKTER ================= -->

                <div class="text-center mb-5">

                    <div class="float relative w-28 h-28 mx-auto mb-3">


                        <!-- Telinga kiri -->

                        <div class="absolute left-2 top-1 w-9 h-16 bg-pink-400 rounded-full rotate-[-18deg] shadow-sm">

                            <div class="absolute left-2 top-2 w-5 h-11 bg-pink-200 rounded-full"></div>

                        </div>


                        <!-- Telinga kanan -->

                        <div class="absolute right-2 top-1 w-9 h-16 bg-pink-400 rounded-full rotate-[18deg] shadow-sm">

                            <div class="absolute right-2 top-2 w-5 h-11 bg-pink-200 rounded-full"></div>

                        </div>


                        <!-- Kepala -->

                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-24 bg-pink-300 rounded-full border-4 border-pink-400 shadow-md">


                            <!-- Mata kiri -->

                            <div class="absolute left-6 top-8 w-3 h-4 bg-gray-700 rounded-full">

                                <div class="absolute w-1.5 h-1.5 bg-white rounded-full top-1 left-0.5"></div>

                            </div>


                            <!-- Mata kanan -->

                            <div class="absolute right-6 top-8 w-3 h-4 bg-gray-700 rounded-full">

                                <div class="absolute w-1.5 h-1.5 bg-white rounded-full top-1 left-0.5"></div>

                            </div>


                            <!-- Pipi -->

                            <div class="absolute left-2 top-14 w-5 h-2.5 bg-pink-400 rounded-full"></div>

                            <div class="absolute right-2 top-14 w-5 h-2.5 bg-pink-400 rounded-full"></div>


                            <!-- Hidung -->

                            <div class="absolute left-1/2 top-14 -translate-x-1/2 w-2 h-2 bg-pink-500 rounded-full"></div>


                            <!-- Mulut -->

                            <div class="absolute left-1/2 top-[62px] -translate-x-1/2 text-pink-700 text-lg font-bold">
                                ᴗ
                            </div>


                            <!-- Pita -->

                            <div class="absolute -right-4 top-1 wiggle">

                                <div class="absolute w-7 h-7 bg-pink-500 rounded-full rotate-[-25deg]"></div>

                                <div class="absolute left-5 w-7 h-7 bg-pink-500 rounded-full rotate-[25deg]"></div>

                                <div class="absolute left-2.5 top-2.5 w-5 h-5 bg-pink-300 rounded-full border-2 border-pink-500"></div>

                            </div>


                        </div>

                    </div>


                    <!-- Judul -->

                    <h1 class="text-3xl font-extrabold text-pink-500 tracking-wide">

                        ♡ Welcome ♡

                    </h1>


                    <p class="text-pink-300 text-sm mt-2 font-medium">

                        Haii! Login dulu yuk 🎀

                    </p>

                    <div class="flex justify-center gap-1 mt-2 text-pink-300">

                        <span>♡</span>
                        <span>✦</span>
                        <span>♡</span>

                    </div>

                </div>


                <!-- ================= PESAN ERROR ================= -->

                <?php if (isset($pesan)) { ?>

                    <div class="mb-4 bg-pink-50 border-2 border-pink-200 text-pink-500 px-4 py-3 rounded-2xl text-center text-sm font-semibold">

                        💗 <?php echo $pesan; ?>

                    </div>

                <?php } ?>


                <!-- ================= FORM ================= -->

                <form action="" method="post">


                    <!-- Username -->

                    <div class="mb-4">

                        <label class="block text-pink-600 font-bold text-sm mb-2">

                            🌸 Username

                        </label>


                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-pink-300">
                                ♡
                            </span>

                            <input
                                type="text"
                                name="username"
                                placeholder="Masukkan username"
                                required
                                class="w-full pl-10 pr-4 py-3.5 bg-pink-50 border-2 border-pink-100 rounded-2xl outline-none text-pink-600 placeholder-pink-300 focus:border-pink-300 focus:bg-white focus:ring-4 focus:ring-pink-100 transition duration-300"
                            >

                        </div>

                    </div>


                    <!-- Password -->

                    <div class="mb-5">

                        <label class="block text-pink-600 font-bold text-sm mb-2">

                            🎀 Password

                        </label>


                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-pink-300">
                                ♡
                            </span>

                            <input
                                type="password"
                                name="password"
                                placeholder="Masukkan password"
                                required
                                class="w-full pl-10 pr-4 py-3.5 bg-pink-50 border-2 border-pink-100 rounded-2xl outline-none text-pink-600 placeholder-pink-300 focus:border-pink-300 focus:bg-white focus:ring-4 focus:ring-pink-100 transition duration-300"
                            >

                        </div>

                    </div>


                    <!-- ================= TOMBOL ================= -->

                    <button
                        type="submit"
                        name="login"
                        class="w-full py-3.5 bg-pink-400 hover:bg-pink-500 text-white font-extrabold rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">

                        🎀 Login Sekarang ♡

                    </button>


                </form>


                <!-- ================= FOOTER ================= -->

                <div class="text-center mt-6">

                    <div class="flex justify-center items-center gap-2 text-pink-200 mb-2">

                        <span>━━</span>

                        <span class="heart text-pink-400">
                            ♡
                        </span>

                        <span>━━</span>

                    </div>


                    <p class="text-xs text-pink-300 font-medium">

                        ♡ Sistem Informasi Sekolah ♡

                    </p>


                    <p class="text-[10px] text-pink-200 mt-1">

                        Selamat datang di halaman login ✨

                    </p>

                </div>


            </div>

        </div>


    </div>

</body>

</html>