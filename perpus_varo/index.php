<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>

    <style>
/* Reset dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", sans-serif;
}

body {
    background: #f4f5f7;
    color: #333;
    padding: 30px;
}

/* Container */
.container {
    max-width: 900px;
    margin: auto;
    background: #fff;
    padding: 25px 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    overflow-x: auto; /* tabel bisa di-scroll */
}

/* Judul */
h2 {
    font-size: 26px;
    font-weight: 600;
    margin-bottom: 25px;
    color: #2b2b2b;
    text-align: center;
}

/* Tombol bagian atas */
.top-actions {
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    flex-wrap: wrap; 
    gap: 10px;   
}

/* Tombol */
.btn {
    padding: 10px 18px;
    font-size: 15px;
    text-decoration: none;
    border-radius: 8px;
    transition: 0.2s;
    display: inline-block;
    text-align: center;
}

/* Warna tombol */
.primary { background: #3A7AFE; color: #fff; }
.primary:hover { background: #1f5de0; }

.success { background: #2ECC71; color: #fff; }
.success:hover { background: #26a85c; }

.warning { background: #F1C40F; color: #fff; }
.warning:hover { background: #c9a40b; }

.danger { background: #E74C3C; color: #fff; }
.danger:hover { background: #c0392b; }

/* Tabel */
table.tabel-buku {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    min-width: 700px; /* agar tabel tidak rusak di layar kecil */
}

.tabel-buku th, .tabel-buku td {
    border-bottom: 1px solid #e0e0e0;
    padding: 12px;
    text-align: left;
    font-size: 15px;
}

.tabel-buku th {
    background: #fafafa;
    font-weight: 600;
    color: #444;
}

.tabel-buku tr:nth-child(even) {
    background: #f9f9f9;
}

.tabel-buku tr:hover {
    background: #eef4ff;
}

/* Responsive */
@media (max-width: 600px) {

    .container {
        padding: 15px;
    }

    table.tabel-buku {
        font-size: 14px;
    }

    .tabel-buku th, .tabel-buku td {
        padding: 10px;
    }

    /* tombol aksi ditumpuk */
    .tabel-buku td a.btn {
        display: block;
        margin-bottom: 5px;
        width: 100%;
        text-align: center;
    }
}
    </style>
</head>
<body>

<div class="container">
    <h2>Data Buku</h2>

    <div class="top-actions">
        <a href="tambah_buku.php" class="btn primary">Tambah Buku</a>
        <a href="peminjaman.php" class="btn success">Transaksi Peminjaman</a>
    </div>

    <table class="tabel-buku">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM buku");
        while($d = mysqli_fetch_assoc($data)){
        ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['judul'] ?></td>
            <td><?= $d['penulis'] ?></td>
            <td><?= $d['tahun'] ?></td>
            <td><?= $d['stok'] ?></td>
            <td>
                <a class="btn warning" href="edit_buku.php?id=<?= $d['id'] ?>">Edit</a>
                <a class="btn danger" href="hapus_buku.php?id=<?= $d['id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
