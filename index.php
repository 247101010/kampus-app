<?php
require 'connection.php';
$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
</head>

<body>

    <h2>Daftar Mahasiswa</h2>
    <a href="tambah.php">Tambah Data</a>
    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1;
        foreach ($data as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['npm']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['jurusan']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>