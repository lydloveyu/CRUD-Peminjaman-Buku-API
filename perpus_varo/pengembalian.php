<?php
include 'config.php';

$id = $_GET['id'];

// Ambil data peminjaman untuk tahu id_buku
$pinjam = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id='$id'")
);

$id_buku = $pinjam['id_buku'];
$tanggal_kembali = date('Y-m-d H:i:s');

// Update status dan tanggal kembali
mysqli_query($koneksi, "
    UPDATE peminjaman 
    SET status='dikembalikan', tanggal_kembali='$tanggal_kembali'
    WHERE id='$id'
");

// Tambah stok buku kembali
mysqli_query($koneksi, "
    UPDATE buku SET stok = stok + 1 WHERE id='$id_buku'
");

header("Location: peminjaman.php");
exit;
?>
