<?php
require 'connection.php';
$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<html>

<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Daftar Mahasiswa</h2>
        <a href="tambah.php" class="add-link primary">+ Tambah Data Mahasiswa</a>
        <br><br>

        <table>
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
                    <td><?= htmlspecialchars($row['nim']) ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['jurusan']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

</body>

</html>