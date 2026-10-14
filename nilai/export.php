<?php

session_start();

include "../koneksi.php";

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header("location:../logout.php");
    exit;
}

/* =========================
   AMBIL DATA NILAI
========================= */

$query = mysqli_query($koneksi, "

    SELECT
        nilai.id_nilai,
        siswa.nama AS namasiswa,
        guru.nama AS namaguru,
        mapel.nama_mapel AS namamapel,
        nilai.nilai

    FROM nilai

    INNER JOIN siswa
        ON nilai.nis = siswa.nis

    INNER JOIN guru
        ON nilai.nip = guru.nip

    INNER JOIN mapel
        ON nilai.id_mapel = mapel.id_mapel

    ORDER BY nilai.id_nilai ASC

");

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

/* =========================
   NAMA FILE CSV
========================= */

$filename = "Data_Nilai_Siswa_" . date("Y-m-d") . ".csv";

/* =========================
   HEADER CSV
========================= */

header("Content-Type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");

/* =========================
   BUAT FILE CSV
========================= */

$output = fopen("php://output", "w");

/*
   BOM UTF-8
   Supaya nama Indonesia terbaca
   dengan baik di Excel
*/
fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

/* =========================
   HEADER KOLOM
========================= */

fputcsv($output, array(
    "No",
    "Nama Siswa",
    "Mata Pelajaran",
    "Nama Guru",
    "Nilai"
));

/* =========================
   DATA
========================= */

$no = 1;

while ($data = mysqli_fetch_assoc($query)) {

    fputcsv($output, array(
        $no++,
        $data['namasiswa'],
        $data['namamapel'],
        $data['namaguru'],
        $data['nilai']
    ));

}

/* =========================
   SELESAI
========================= */

fclose($output);

exit;

?>