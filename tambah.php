<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$npm, $nama, $jurusan]);

    header("Location: index.php");
}
?>

<h2>Tambah Mahasiswa</h2>

<form method="POST">
    NPM: <input type="text" name="npm"><br><br>
    Nama: <input type="text" name="nama"><br><br>
    Jurusan: <input type="text" name="jurusan"><br><br>
    <button type="submit">Simpan</button>
</form>