<?php
include "koneksi.php";

$id_nilai = isset($_GET['id_nilai']) ? (int) $_GET['id_nilai'] : 0;

if ($id_nilai <= 0) {
    die("ID nilai tidak valid.");
}

$query = mysqli_query($koneksi, "
    SELECT
        nilai.id_nilai,
        nilai.nilai,
        siswa.nama AS nama_siswa,
        mapel.nama_mapel,
        guru.nama AS nama_guru
    FROM nilai
    JOIN siswa ON nilai.nis = siswa.nis
    JOIN mapel ON nilai.id_mapel = mapel.id_mapel
    JOIN guru ON nilai.nip = guru.nip
    WHERE nilai.id_nilai = $id_nilai
    LIMIT 1
");

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data nilai tidak ditemukan untuk ID: " . $id_nilai);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Cetak Nilai - <?php echo htmlspecialchars($data['nama_siswa']); ?>
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fff0f7;
            margin: 0;
            padding: 30px;
            color: #831843;
        }

        .toolbar {
            text-align: center;
            margin-bottom: 25px;
        }

        .toolbar button {
            border: none;
            padding: 12px 25px;
            margin: 5px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-cetak {
            background: #ec4899;
            color: white;
        }

        .btn-cetak:hover {
            background: #db2777;
        }

        .btn-tutup {
            background: #fce7f3;
            color: #be185d;
            border: 2px solid #f9a8d4 !important;
        }

        .btn-tutup:hover {
            background: #fbcfe8;
        }

        .kertas {
            width: 800px;
            max-width: 100%;
            margin: auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(236, 72, 153, 0.15);
            border: 2px solid #fbcfe8;
        }

        .kop {
            text-align: center;
            border-bottom: 3px solid #ec4899;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .kop h1 {
            margin: 0;
            color: #db2777;
            font-size: 25px;
        }

        .kop p {
            margin: 7px 0 0;
            color: #ec4899;
            font-weight: bold;
        }

        .judul {
            text-align: center;
            margin-bottom: 25px;
            color: #9d174d;
            font-size: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #f9a8d4;
            padding: 13px;
        }

        th {
            width: 35%;
            background: #fce7f3;
            color: #be185d;
            text-align: left;
        }

        td {
            color: #374151;
        }

        .nilai {
            font-size: 22px;
            font-weight: bold;
            color: #db2777;
        }

        .tanggal {
            margin-top: 30px;
            text-align: right;
            font-size: 13px;
            color: #9d174d;
        }

        @media print {

            body {
                background: white;
                padding: 0;
            }

            .toolbar {
                display: none;
            }

            .kertas {
                width: 100%;
                box-shadow: none;
                border: none;
                border-radius: 0;
                padding: 20px;
            }

        }

    </style>

</head>

<body>

    <div class="toolbar">

        <button
            class="btn-cetak"
            onclick="window.print()"
        >
            🖨️ Cetak
        </button>

        <button
            class="btn-tutup"
            onclick="window.location.href='index.php'"
        >
            ✖ Tutup
        </button>

    </div>


    <div class="kertas">

        <div class="kop">

            <h1>💗 SKANET RENATA</h1>

            <p>Sistem Informasi Nilai Siswa</p>

        </div>


        <div class="judul">
            DATA NILAI SISWA
        </div>


        <table>

            <tr>
                <th>Nama Siswa</th>

                <td>
                    <?php echo htmlspecialchars($data['nama_siswa']); ?>
                </td>
            </tr>


            <tr>
                <th>Mata Pelajaran</th>

                <td>
                    <?php echo htmlspecialchars($data['nama_mapel']); ?>
                </td>
            </tr>


            <tr>
                <th>Nama Guru</th>

                <td>
                    <?php echo htmlspecialchars($data['nama_guru']); ?>
                </td>
            </tr>


            <tr>
                <th>Nilai</th>

                <td class="nilai">
                    <?php echo htmlspecialchars($data['nilai']); ?>
                </td>
            </tr>

        </table>


        <div class="tanggal">

            Dicetak pada:
            <?php echo date('d-m-Y H:i'); ?>
            WIB

        </div>

    </div>

</body>

</html>