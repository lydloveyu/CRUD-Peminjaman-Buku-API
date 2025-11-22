<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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

/* Button */
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

    </style>
</head>
<body>

<div class="container">

    <h2>Edit Buku</h2>
    
    <a href="index.php" class="btn back">Kembali</a>
    <form method="POST" class="form-box">

        <input type="text" name="judul" value="<?= $data['judul'] ?>" required>
        <input type="text" name="penulis" value="<?= $data['penulis'] ?>" required>
        <input type="number" name="tahun" value="<?= $data['tahun'] ?>" required>
        <input type="number" name="stok" value="<?= $data['stok'] ?>" required>

        <button name="update" class="btn primary">Update</button>
    </form>

</div>

</body>
</html>

<?php
if(isset($_POST['update'])){
    mysqli_query($koneksi, "UPDATE buku 
                            SET judul='$_POST[judul]', 
                                penulis='$_POST[penulis]', 
                                tahun='$_POST[tahun]', 
                                stok='$_POST[stok]' 
                            WHERE id=$id");

    echo "<script>alert('Data berhasil diperbarui');window.location='index.php';</script>";
}
?>
