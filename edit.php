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
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <a href="index.php" class="add-link">Batal & Kembali</a>

        <form method="POST">
            <label>NPM</label>
            <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']) ?>" required>
            
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
            
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']) ?>" required>
            
            <button type="submit">Update Data</button>
        </form>
    </div>
</body>
</html>