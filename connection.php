<?php
$host = '192.168.1.74'; // IP XAMPP
$dbname = 'kampus';
$username = 'kampususer';
$password = '12345';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}
