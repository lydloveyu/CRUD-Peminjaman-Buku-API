<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <style>
        /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", sans-serif;
}

body {
    background: #f4f5f7;
    padding: 30px;
    color: #333;
}

/* Container */
.container {
    max-width: 500px;
    margin: auto;
    background: #fff;
    padding: 25px 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* Judul */
h2 {
    text-align: center;
    margin-bottom: 25px;
    font-weight: 600;
    color: #2c2c2c;
}

/* Tombol kembali */
.back {
    background: #777;
    color: #fff;
    padding: 10px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    display: inline-block;
    margin-bottom: 20px;
    transition: 0.2s;
}

.back:hover {
    background: #555;
}

/* Form */
.form-box {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-box input {
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 15px;
}

.form-box input:focus {
    border-color: #3A7AFE;
    box-shadow: 0 0 6px rgba(58,122,254,0.3);
    outline: none;
}

/* Tombol utama */
.btn {
    border: none;
    cursor: pointer;
    padding: 12px 18px;
    border-radius: 8px;
    font-size: 16px;
    transition: 0.2s;
}

.primary {
    background: #3A7AFE;
    color: #fff;
}

.primary:hover {
    background: #1e5ad7;
}

/* Responsive */
@media(max-width: 600px) {
    .container {
        padding: 20px;
    }

    input, .btn {
        font-size: 14px;
    }
}

    </style>
</head>
<body>

<div class="container">

    <h2>Tambah Buku</h2>

    <a href="index.php" class="btn back">Kembali</a>

    <form method="POST" class="form-box">

        <input type="text" name="judul" placeholder="Judul Buku" required>
        <input type="text" name="penulis" placeholder="Penulis" required>
        <input type="number" name="tahun" placeholder="Tahun" required>
        <input type="number" name="stok" placeholder="Stok" required>

        <button name="simpan" class="btn primary">Simpan</button>
    </form>

</div>

</body>
</html>

<?php
if(isset($_POST['simpan'])){
    mysqli_query($koneksi, "INSERT INTO buku VALUES('', '$_POST[judul]', '$_POST[penulis]', '$_POST[tahun]', '$_POST[stok]')");
    echo "<script>alert('Buku berhasil ditambahkan');window.location='index.php';</script>";
}
?>
