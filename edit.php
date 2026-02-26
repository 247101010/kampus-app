<?php
require 'connection.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE mahasiswa SET nim=?, nama=?, jurusan=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$npm, $nama, $jurusan, $id]);

    header("Location: index.php");
}
?>

<html>

<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <a href="index.php" class="add-link">Kembali</a>
        <br><br>


<form method="POST">
    NPM: <input type="text" name="nim" value="<?= $data['nim'] ?>"><br><br>
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>
    Jurusan: <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>"><br><br>
    <button type="submit">Update</button>
</form>
    </div>
    </body>
    </html>