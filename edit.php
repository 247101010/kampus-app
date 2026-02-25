<?php
require 'connection.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE mahasiswa SET npm=?, nama=?, jurusan=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$npm, $nama, $jurusan, $id]);

    header("Location: index.php");
}
?>

<form method="POST">
    NPM: <input type="text" name="npm" value="<?= $data['npm'] ?>"><br><br>
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>
    Jurusan: <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>"><br><br>
    <button type="submit">Update</button>
</form>