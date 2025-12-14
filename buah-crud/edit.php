<?php
include "koneksi.php";

$id = $_GET['id'];

// Cek apakah ID ada di database
$data = mysqli_query($conn, "SELECT * FROM buah WHERE id = $id");
$buah = mysqli_fetch_assoc($data);

// Jika data tidak ditemukan
if (!$buah) {
    die("Data buah tidak ditemukan.");
}

// Jika tombol update ditekan
if (isset($_POST['submit'])) {

    // Ambil input
    $nama  = $_POST['nama_buah'];
    $stok  = $_POST['stok'];
    $harga = $_POST['harga'];

    // Update data
    mysqli_query($conn, "
        UPDATE buah SET 
            nama_buah = '$nama',
            stok       = '$stok',
            harga      = '$harga'
        WHERE id = $id
    ");

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container form-card">
    <h1>Edit Buah</h1>

    <form method="POST">

        <label>Nama Buah</label>
        <input 
            type="text" 
            name="nama_buah" 
            value="<?= $buah['nama_buah']; ?>" 
            required
        >

        <label>Stok</label>
        <input 
            type="text" 
            name="stok" 
            value="<?= $buah['stok']; ?>" 
            required
        >

        <label>Harga</label>
        <input 
            type="number" 
            name="harga" 
            value="<?= $buah['harga']; ?>" 
            required
        >

        <button type="submit" name="submit" class="btn">Update</button>

    </form>
</div>

</body>
</html>
