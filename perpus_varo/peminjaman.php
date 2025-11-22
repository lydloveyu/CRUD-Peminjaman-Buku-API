<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", sans-serif;
}

body {
    background: #f5f6f8;
    padding: 30px;
    color: #333;
}

/* Container */
.container {
    max-width: 900px;
    margin: auto;
    background: #fff;
    padding: 25px 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* Judul */
h2, h3 {
    text-align: center;
    margin-bottom: 20px;
    font-weight: 600;
    color: #2c2c2c;
}

/* Tombol */
.btn {
    display: inline-block;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 15px;
    transition: 0.2s;
    cursor: pointer;
}

.primary { background: #3A7AFE; color: #fff; }
.primary:hover { background: #1f5de0; }
.secondary { background: #777; color: #fff; }
.secondary:hover { background: #555; }
.success { background: #2ECC71; color: #fff; }
.success:hover { background: #26a85c; }

/* Form */
.form-box {
    margin-top: 20px;
    margin-bottom: 35px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-box select,
.form-box input {
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 15px;
}

/* WRAPPER TABEL */
.table-wrapper {
    width: 100%;
    overflow-x: auto;
    margin-top: 15px;
}

/* Tabel */
table.tabel-pinjam {
    width: 100%;
    border-collapse: collapse;
}

.tabel-pinjam th, .tabel-pinjam td {
    padding: 12px;
    border-bottom: 1px solid #e6e6e6;
    font-size: 15px;
}

.tabel-pinjam th {
    background: #fafafa;
    font-weight: 600;
}

.tabel-pinjam tr:nth-child(even) {
    background: #f9f9f9;
}

.tabel-pinjam tr:hover {
    background: #eef4ff;
}

/* Responsive */
@media(max-width: 600px) {
    .form-box select,
    .form-box input,
    .btn {
        font-size: 14px;
    }

    .tabel-pinjam td a.btn {
        display: block;
        width: 100%;
        margin-bottom: 6px;
    }

    table.tabel-pinjam, th, td {
        font-size: 13px;
    }
}
    </style>
</head>
<body>

<div class="container">

    <h2>Peminjaman Buku</h2>

    <a href="index.php" class="btn secondary">Kembali</a>

    <form method="POST" action="proses_peminjaman.php" class="form-box">

        <select name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php
            $buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE stok > 0");
            while($bk = mysqli_fetch_assoc($buku)){
                echo "<option value='{$bk['id']}'>{$bk['judul']} (Stok: {$bk['stok']})</option>";
            }
            ?>
        </select>

        <input type="text" name="nama" placeholder="Nama Peminjam" required>
        <input type="date" name="tanggal_pinjam" required>

        <button class="btn primary">Pinjam</button>
    </form>

    <h3>Daftar Peminjaman</h3>

    <div class="table-wrapper">
        <table class="tabel-pinjam">
            <tr>
                <th>Buku</th>
                <th>Peminjam</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php
            $data = mysqli_query($koneksi,
                "SELECT peminjaman.*, buku.judul 
                 FROM peminjaman 
                 JOIN buku ON buku.id = peminjaman.id_buku
                 ORDER BY peminjaman.id DESC"
            );

            while($d = mysqli_fetch_assoc($data)){
            ?>
            <tr>
                <td><?= $d['judul'] ?></td>
                <td><?= $d['nama'] ?></td>
                <td><?= $d['tanggal'] ?></td>
                <td><?= $d['tanggal_kembali'] ? $d['tanggal_kembali'] : '-' ?></td>
                <td><?= $d['status'] ?></td>
                <td>
                    <?php if($d['status'] == 'dipinjam'){ ?>
                        <a href="pengembalian.php?id=<?= $d['id']; ?>" class="btn success">
                            Kembalikan
                        </a>
                    <?php } else { ?>
                        -
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>

        </table>
    </div>

</div>

</body>
</html>
