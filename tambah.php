<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$npm, $nama, $jurusan]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Mahasiswa</h2>
        <a href="index.php" class="add-link">Batal & Kembali</a>

        <form method="POST">
            <label>NPM</label>
            <input type="text" name="nim" placeholder="Masukkan NPM..." required>
            
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan Nama..." required>
            
            <label>Jurusan</label>
            <input type="text" name="jurusan" placeholder="Masukkan Jurusan..." required>
            
            <button type="submit">Simpan Data</button>
        </form>
    </div>
</body>
</html>