<?php
include 'config.php';

$id_buku = $_POST['id_buku'];
$nama = $_POST['nama'];

// Ambil tanggal dari input (YYYY-MM-DD)
$tanggal_input = $_POST['tanggal_pinjam'];

// Tambahkan jam otomatis
$tanggal_pinjam = $tanggal_input . " " . date("H:i:s");

// Insert
mysqli_query($koneksi, "
    INSERT INTO peminjaman (nama, id_buku, tanggal, status)
    VALUES ('$nama', '$id_buku', '$tanggal_pinjam', 'dipinjam')
");

// Kurangi stok
mysqli_query($koneksi, "UPDATE buku SET stok = stok - 1 WHERE id = '$id_buku'");

header("Location: peminjaman.php");
exit;
?>
