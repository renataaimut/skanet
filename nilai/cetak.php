<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "
    SELECT
        nilai.*,
        siswa.nama AS nama_siswa,
        mapel.nama_mapel,
        guru.nama AS nama_guru
    FROM nilai
    JOIN siswa ON nilai.nis = siswa.nis
    JOIN mapel ON nilai.id_mapel = mapel.id_mapel
    JOIN guru ON nilai.nip = guru.nip
");

$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cetak Data Nilai - SKANET RENATA</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            font-family: 'Segoe UI', Arial, sans-serif;

            color: #831843;

            padding: 30px 40px;

            margin: 0;

            background: #fff7fb;

        }


        /* ================= KOP ================= */

        .kop {

            text-align: center;

            border-bottom: 3px solid #ec4899;

            padding-bottom: 14px;

            margin-bottom: 20px;

        }


        .kop h1 {

            margin: 0;

            font-size: 22px;

            letter-spacing: 1px;

            color: #db2777;

        }


        .kop p {

            margin: 4px 0 0;

            color: #ec4899;

            font-weight: 600;

        }


        /* ================= TABLE ================= */

        table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 10px;

            background: white;

            border: 2px solid #f9a8d4;

            border-radius: 15px;

            overflow: hidden;

        }


        th,
        td {

            border: 1px solid #f9a8d4;

            padding: 10px 12px;

            font-size: 14px;

            text-align: left;

        }


        th {

            background: #ec4899;

            color: white;

            text-transform: uppercase;

            font-size: 12px;

            letter-spacing: 0.5px;

        }


        tbody tr:nth-child(even) {

            background: #fff0f7;

        }


        tbody tr:hover {

            background: #fce7f3;

        }


        .nilai-badge {

            font-weight: 700;

            color: #db2777;

        }


        /* ================= INFO ================= */

        .info {

            margin-top: 18px;

            font-size: 13px;

            display: flex;

            justify-content: space-between;

            color: #be185d;

        }


        /* ================= TOOLBAR ================= */

        .toolbar {

            text-align: center;

            margin-bottom: 24px;

        }


        .toolbar button {

            background: #ec4899;

            color: white;

            border: none;

            padding: 10px 22px;

            border-radius: 14px;

            font-weight: 700;

            cursor: pointer;

            margin: 0 5px;

            font-size: 14px;

            box-shadow: 0 4px 10px rgba(236, 72, 153, 0.20);

            transition: 0.3s;

        }


        .toolbar button:hover {

            background: #db2777;

            transform: translateY(-2px);

        }


        /* ================= HIASAN ================= */

        .hiasan {

            position: fixed;

            font-size: 25px;

            opacity: 0.7;

        }


        .hiasan-1 {

            top: 20px;

            left: 20px;

        }


        .hiasan-2 {

            top: 20px;

            right: 20px;

        }


        .hiasan-3 {

            bottom: 20px;

            left: 20px;

        }


        .hiasan-4 {

            bottom: 20px;

            right: 20px;

        }


        /* ================= PRINT ================= */

        @media print {

            .toolbar {

                display: none;

            }


            .hiasan {

                display: none;

            }


            body {

                padding: 0 20px;

                background: white;

            }


            th {

                background: #ec4899 !important;

                color: white !important;

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;

            }


            tbody tr:nth-child(even) {

                background: #fff0f7 !important;

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;

            }

        }


    </style>

</head>


<body onload="window.print()">


    <!-- HIASAN -->

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


    <!-- TOOLBAR -->

    <div class="toolbar">

        <button onclick="window.print()">
            🖨️ Cetak
        </button>

       <button onclick="window.location.href='index.php'">
    ✖ Tutup
</button>
    </div>


    <!-- KOP -->

    <div class="kop">

        <h1>
            🎀 SKANET RENATA🎀
        </h1>

        <p>
            ♡ Data Nilai Siswa ♡
        </p>

    </div>


    <!-- TABLE -->

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
                    Nama Mapel
                </th>

                <th>
                    Nama Guru
                </th>

                <th>
                    Nilai
                </th>

            </tr>

        </thead>


        <tbody>

            <?php
            $no = 1;

            while ($data = mysqli_fetch_assoc($query)):
            ?>

                <tr>

                    <td>
                        <?php echo $no++; ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['nama_siswa']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['nama_mapel']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['nama_guru']); ?>
                    </td>

                    <td class="nilai-badge">
                        <?php echo htmlspecialchars($data['nilai']); ?>
                    </td>

                </tr>

            <?php endwhile; ?>

        </tbody>

    </table>


    <!-- INFO -->

    <div class="info">

        <span>
            ♡ Total data: <?php echo $total; ?> nilai
        </span>

        <span>
            Dicetak pada:
            <?php echo date('d-m-Y H:i'); ?> WIB
        </span>

    </div>


</body>

</html>