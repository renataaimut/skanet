<?php
include "koneksi.php";

if (isset($_GET['nis'])) {

    $nis = $_GET['nis'];

    $query = mysqli_query(
        $koneksi,
        "DELETE FROM siswa WHERE nis='$nis'"
    );

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }

} else {
    echo "NIS tidak ditemukan!";
}
?>
