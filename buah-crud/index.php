<?php
include "koneksi.php";

// --- FITUR PENCARIAN ---
$keyword = "";
if (isset($_GET['cari'])) {
    $keyword = $_GET['cari'];
    $query = mysqli_query($conn, "SELECT * FROM buah WHERE nama_buah LIKE '%$keyword%' ");
} else {
    $query = mysqli_query($conn, "SELECT * FROM buah");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>DATA BUAH</h1>

    <!-- FORM PENCARIAN -->
    <form method="GET" class="search-container">
        <input 
            type="text" 
            name="cari" 
            class="search-input"
            placeholder="Cari nama buah..."
            value="<?= $keyword; ?>"
        >
    </form>

    <a href="tambah.php" class="btn tambah-btn">+ Tambah Buah</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Buah</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            if (mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)) { ?>
                
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama_buah']; ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td class="action">
                        <a class="edit" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                        <a class="hapus" href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>

            <?php } 
            } else { ?>
                <tr>
                    <td colspan="5" style="text-align:center; padding:16px; font-size:16px;">
                        Data tidak ditemukan
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>
