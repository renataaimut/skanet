<?php
include "../koneksi.php";
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header("location:../logout.php");
    exit;
}

$query = mysqli_query($koneksi, "
    SELECT
        nilai.id_nilai,
        siswa.nama AS nama_siswa,
        mapel.nama_mapel,
        guru.nama AS nama_guru,
        nilai.nilai
    FROM nilai
    INNER JOIN siswa
        ON nilai.nis = siswa.nis
    INNER JOIN mapel
        ON nilai.id_mapel = mapel.id_mapel
    INNER JOIN guru
        ON nilai.nip = guru.nip
    ORDER BY nilai.id_nilai ASC
");

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Nilai</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 65px;
            background: rgba(255,255,255,0.96);
            border-bottom: 2px solid #fbcfe8;
            box-shadow: 0 3px 15px rgba(236,72,153,0.15);
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
            box-shadow: 0 8px 25px rgba(236,72,153,0.12);
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

        /* ================= BUTTON ================= */

        .button-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 11px 15px;
            border-radius: 14px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(236,72,153,0.15);
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-export {
            background: #fce7f3;
            color: #be185d;
        }

        .btn-export:hover {
            background: #fbcfe8;
        }

        .btn-cetak {
            background: #ec4899;
            color: white;
        }

        .btn-cetak:hover {
            background: #db2777;
        }

        .btn-tambah {
            background: #db2777;
            color: white;
        }

        .btn-tambah:hover {
            background: #be185d;
        }

        /* ================= TABLE ================= */

        .table-card {
            background: white;
            border: 2px solid #fce7f3;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(236,72,153,0.12);
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

        .data-box {
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
            font-size: 21px;
        }

        .nama {
            font-weight: bold;
            color: #555;
        }

        .nilai-box {
            display: inline-block;
            background: #fce7f3;
            color: #be185d;
            padding: 7px 13px;
            border-radius: 12px;
            font-weight: bold;
        }

        .aksi {
            text-align: center;
            white-space: nowrap;
        }

        .btn-edit,
        .btn-cetak-satu,
        .btn-hapus {
            display: inline-block;
            text-decoration: none;
            padding: 8px 11px;
            border-radius: 11px;
            font-weight: bold;
            font-size: 12px;
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

        .btn-cetak-satu {
            background: #fce7f3;
            color: #db2777;
            margin-left: 3px;
        }

        .btn-cetak-satu:hover {
            background: #ec4899;
            color: white;
        }

        .btn-hapus {
            background: #fce7f3;
            color: #db2777;
            margin-left: 3px;
        }

        .btn-hapus:hover {
            background: #db2777;
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

        @media (max-width: 850px) {

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

            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .button-group {
                width: 100%;
            }

            .btn {
                flex: 1;
                text-align: center;
            }
        }

    </style>

</head>


<body class="min-h-screen bg-gradient-to-br from-pink-200 via-pink-50 to-pink-300">


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

                <a href="../guru">
                    👨‍🏫 Guru
                </a>

                <a href="../mapel">
                    📚 Mapel
                </a>

                <a href="../nilai" class="active">
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


        <!-- ================= HEADER ================= -->

        <div class="header-card">

            <div class="header-content">


                <div class="header-left">

                    <div class="icon-box">
                        📝
                    </div>

                    <div>

                        <h1 class="title">
                            ♡ Data Nilai
                        </h1>

                        <p class="subtitle">
                            Daftar nilai siswa 🎀
                        </p>

                    </div>

                </div>


                <!-- ================= TOMBOL ================= -->

                <div class="button-group">

                    <!-- EXPORT -->

                    <a
                        href="export.php"
                        class="btn btn-export"
                    >
                        📊 Export Data
                    </a>


                    <!-- CETAK SEMUA -->

                    <a
                        href="cetak.php"
                        target="_blank"
                        class="btn btn-cetak"
                    >
                        🖨️ Cetak Semua
                    </a>


                    <!-- TAMBAH -->

                    <a
                        href="tambah.php"
                        class="btn btn-tambah"
                    >
                        🎀 + Tambah Data
                    </a>

                </div>

            </div>

        </div>


        <!-- ================= TABLE ================= -->

        <div class="table-card">

            <div class="table-title">
                📝 Daftar Nilai Siswa
            </div>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                Nama Siswa
                            </th>

                            <th>
                                Mata Pelajaran
                            </th>

                            <th>
                                Nama Guru
                            </th>

                            <th>
                                Nilai
                            </th>

                            <th style="text-align:center;">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php

                        $no = 1;

                        while ($data = mysqli_fetch_assoc($query)) {

                        ?>

                        <tr>


                            <!-- NO -->

                            <td>
                                <?php echo $no++; ?>
                            </td>


                            <!-- SISWA -->

                            <td>

                                <div class="data-box">

                                    <div class="data-icon">
                                        👩‍🎓
                                    </div>

                                    <span class="nama">
                                        <?php echo htmlspecialchars($data['nama_siswa']); ?>
                                    </span>

                                </div>

                            </td>


                            <!-- MAPEL -->

                            <td>

                                <div class="data-box">

                                    <div class="data-icon">
                                        📚
                                    </div>

                                    <span>
                                        <?php echo htmlspecialchars($data['nama_mapel']); ?>
                                    </span>

                                </div>

                            </td>


                            <!-- GURU -->

                            <td>

                                <div class="data-box">

                                    <div class="data-icon">
                                        🧑‍🏫
                                    </div>

                                    <span>
                                        <?php echo htmlspecialchars($data['nama_guru']); ?>
                                    </span>

                                </div>

                            </td>


                            <!-- NILAI -->

                            <td>

                                <span class="nilai-box">
                                    💗 <?php echo htmlspecialchars($data['nilai']); ?>
                                </span>

                            </td>


                            <!-- AKSI -->

                            <td class="aksi">


                                <!-- EDIT -->

                                <a
                                    href="edit.php?id_nilai=<?php echo urlencode($data['id_nilai']); ?>"
                                    class="btn-edit"
                                >
                                    ✏️ Edit
                                </a>


                                <!-- CETAK SATU -->

                                <a
                                    href="cetak_satu.php?id_nilai=<?php echo urlencode($data['id_nilai']); ?>"
                                    target="_blank"
                                    class="btn-cetak-satu"
                                >
                                    🖨️ Cetak
                                </a>


                                <!-- HAPUS -->

                                <a
                                    href="hapus.php?id_nilai=<?php echo urlencode($data['id_nilai']); ?>"
                                    onclick="return confirm('Yakin ingin menghapus data nilai ini? 💗')"
                                    class="btn-hapus"
                                >
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


        <!-- ================= FOOTER ================= -->

        <div class="footer">
            ♡ 🌸 Sistem Informasi Sekolah 🌸 ♡
        </div>


    </div>


</body>

</html>