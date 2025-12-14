<?php
include "koneksi.php";

if (isset($_POST['submit'])) {

    $nama_buah = $_POST['nama_buah'];
    $stok      = $_POST['stok'];
    $harga     = $_POST['harga'];

    // INSERT sesuai nama kolom tabel
    mysqli_query($conn, "
        INSERT INTO buah (nama_buah, stok, harga) 
        VALUES ('$nama_buah', '$stok', '$harga')
    ");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container form-card">
    <h1>Tambah Buah</h1>

    <form method="POST">

        <label>Nama Buah</label>
        <input type="text" name="nama_buah" required>

        <label>Stok (contoh: 10 kg / 100 gr)</label>
        <input type="text" name="stok" required>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <button type="submit" name="submit" class="btn">
            Simpan
        </button>

    </form>
</div>

</body>
</html>
