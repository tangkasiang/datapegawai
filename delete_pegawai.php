<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda jika berbeda
$password = ""; // Ganti dengan password MySQL Anda jika ada
$dbname = "pegawai";

// Membuat Koneksi
$conn = new mysqli("localhost", "root", "", "pegawai");

// Memeriksa Koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil ID dari URL
$id = $_GET['id'];

// Menghapus Data Pegawai
$sql = "DELETE FROM data_pegawai WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Pegawai berhasil dihapus. <a href='index.php'>Kembali ke daftar pegawai</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>