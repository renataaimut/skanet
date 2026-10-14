<?php
include "../koneksi.php";
session_start();

if ($_SESSION['status'] <> "sukses") {
    header('location:../logout.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Guru</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fbcfe8, #fdf2f8, #f9a8d4);
            color: #6b2148;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 65px;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 2px solid #fbcfe8;
            box-shadow: 0 3px 15px rgba(236, 72, 153, 0.15);
            z-index: 1000;
        }

        .navbar-container {
            max-width: 1150px;
            height: 100%;
            margin: auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            text-decoration: none;
            color: #db2777;
            font-size: 20px;
            font-weight: bold;
        }

        .logo span {
            margin-right: 7px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #be185d;
            font-weight: bold;
            padding: 10px 13px;
            border-radius: 12px;
            transition: 0.3s;
        }

        .nav-menu a:hover {
            background: #fce7f3;
        }

        .nav-menu .active {
            background: #fce7f3;
        }

        .nav-menu .logout {
            background: #ec4899;
            color: white;
            margin-left: 8px;
        }

        .nav-menu .logout:hover {
            background: #db2777;
        }

        /* ================= CONTENT ================= */

        .container {
            max-width: 1150px;
            margin: auto;
            padding: 95px 20px 30px;
        }

        /* ================= HIASAN ================= */

        .hiasan {
            position: fixed;
            font-size: 28px;
            z-index: 1;
            opacity: 0.7;
        }

        .hiasan-1 {
            top: 85px;
            left: 25px;
            color: #ec4899;
        }

        .hiasan-2 {
            top: 85px;
            right: 30px;
        }

        .hiasan-3 {
            bottom: 25px;
            left: 25px;
            color: #f9a8d4;
        }

        .hiasan-4 {
            bottom: 20px;
            right: 30px;
        }

        /* ================= HEADER ================= */

        .header-card {
            background: white;
            border: 2px solid #fce7f3;
            border-radius: 28px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 8px 25px rgba(236, 72, 153, 0.12);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-box {
            width: 58px;
            height: 58px;
            background: #fce7f3;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 31px;
        }

        .title {
            color: #ec4899;
            font-size: 27px;
            font-weight: bold;
        }

        .subtitle {
            color: #f9a8d4;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-tambah {
            display: inline-block;
            text-decoration: none;
            background: #ec4899;
            color: white;
            padding: 12px 20px;
            border-radius: 15px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(236, 72, 153, 0.2);
        }

        .btn-tambah:hover {
            background: #db2777;
            transform: translateY(-2px);
        }

        /* ================= TABLE ================= */

        .table-card {
            background: white;
            border: 2px solid #fce7f3;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(236, 72, 153, 0.12);
        }

        .table-title {
            background: #fdf2f8;
            padding: 16px 20px;
            border-bottom: 1px solid #fbcfe8;
            color: #db2777;
            font-weight: bold;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #ec4899;
            color: white;
        }

        th {
            padding: 14px 18px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 13px 18px;
            border-bottom: 1px solid #fce7f3;
            color: #555;
        }

        tbody tr:hover {
            background: #fdf2f8;
        }

        .nama-box,
        .alamat-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .data-icon {
            width: 40px;
            height: 40px;
            background: #fce7f3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .nama {
            font-weight: bold;
            color: #555;
        }

        .aksi {
            text-align: center;
            white-space: nowrap;
        }

        .btn-edit,
        .btn-hapus {
            display: inline-block;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 11px;
            font-weight: bold;
            font-size: 13px;
            transition: 0.3s;
        }

        .btn-edit {
            background: #fce7f3;
            color: #db2777;
        }

        .btn-edit:hover {
            background: #ec4899;
            color: white;
        }

        .btn-hapus {
            background: #fce7f3;
            color: #db2777;
            margin-left: 4px;
        }

        .btn-hapus:hover {
            background: #ec4899;
            color: white;
        }

        /* ================= FOOTER ================= */

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #f9a8d4;
            font-size: 14px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 800px) {

            .nav-menu a {
                padding: 8px 7px;
                font-size: 13px;
            }

            .logo {
                font-size: 17px;
            }

            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-tambah {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 600px) {

            .navbar {
                height: auto;
            }

            .navbar-container {
                flex-direction: column;
                padding: 12px 10px;
                gap: 8px;
            }

            .nav-menu {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .nav-menu a {
                font-size: 12px;
                padding: 7px 8px;
            }

            .container {
                padding-top: 150px;
            }

            .title {
                font-size: 22px;
            }

            th,
            td {
                padding: 11px 12px;
                font-size: 13px;
            }
        }
    </style>

</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav class="navbar">

        <div class="navbar-container">

            <a href="../index.php" class="logo">
                <span>🎀</span>SMKN TAKERAN
            </a>

            <div class="nav-menu">

                <a href="../index.php">
                    🏠 Beranda
                </a>

                <a href="../siswa">
                    🧑‍🎓 Siswa
                </a>

                <a href="../guru" class="active">
                    👨‍🏫 Guru
                </a>

                <a href="../mapel">
                    📚 Mapel
                </a>

                <a href="../nilai">
                    📝 Nilai
                </a>

                <a href="../logout.php" class="logout">
                    🎀 Logout
                </a>

            </div>

        </div>

    </nav>


    <!-- ================= HIASAN ================= -->

    <div class="hiasan hiasan-1">
        ♡
    </div>

    <div class="hiasan hiasan-2">
        🌸
    </div>

    <div class="hiasan hiasan-3">
        ♡
    </div>

    <div class="hiasan hiasan-4">
        🎀
    </div>


    <!-- ================= CONTENT ================= -->

    <div class="container">

        <!-- HEADER -->

        <div class="header-card">

            <div class="header-content">

                <div class="header-left">

                    <div class="icon-box">
                        👨‍🏫
                    </div>

                    <div>

                        <h1 class="title">
                            ♡ Data Guru
                        </h1>

                        <p class="subtitle">
                            Daftar guru kesayangan ✨
                        </p>

                    </div>

                </div>


                <a href="tambah.php" class="btn-tambah">
                    🎀 + Tambah Data
                </a>

            </div>

        </div>


        <!-- TABLE -->

        <div class="table-card">

            <div class="table-title">
                👨‍🏫 Daftar Data Guru
            </div>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                NIP
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Alamat
                            </th>

                            <th style="text-align:center;">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php

                        $query = mysqli_query($koneksi, "SELECT * FROM guru");

                        while ($data = mysqli_fetch_array($query)) {

                        ?>

                            <tr>

                                <!-- NIP -->

                                <td>
                                    <?php echo $data['nip']; ?>
                                </td>


                                <!-- NAMA -->

                                <td>

                                    <div class="nama-box">

                                        <div class="data-icon">
                                            👨‍🏫
                                        </div>

                                        <span class="nama">
                                            <?php echo $data['nama']; ?>
                                        </span>

                                    </div>

                                </td>


                                <!-- ALAMAT -->

                                <td>

                                    <div class="alamat-box">

                                        <div class="data-icon">
                                            🏠
                                        </div>

                                        <span>
                                            <?php echo $data['alamat']; ?>
                                        </span>

                                    </div>

                                </td>


                                <!-- AKSI -->

                                <td class="aksi">

                                    <a
                                        href="edit.php?nip=<?php echo $data['nip']; ?>"
                                        class="btn-edit">
                                        ✏️ Edit
                                    </a>

                                    <a
                                        href="hapus.php?nip=<?php echo $data['nip']; ?>"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn-hapus">
                                        🗑️ Hapus
                                    </a>

                                </td>

                            </tr>

                        <?php

                        }

                        ?>

                    </tbody>

                </table>

            </div>

        </div>


        <!-- FOOTER -->

        <div class="footer">
            ♡ Sistem Informasi Sekolah ♡
        </div>

    </div>

</body>

</html>