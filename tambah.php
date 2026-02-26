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

<html>

<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Tambah Mahasiswa</h2>

<form method="POST">
    NPM: <input type="text" name="nim"><br><br>
    Nama: <input type="text" name="nama"><br><br>
    Jurusan: <input type="text" name="jurusan"><br><br>
    <button type="submit">Simpan</button>
</form>

</body>
</html>