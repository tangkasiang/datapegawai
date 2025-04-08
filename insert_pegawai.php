<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda jika berbeda
$password = ""; // Ganti dengan password MySQL Anda jika ada
$dbname = "pegawai";

// Membuat Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa Koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$alamat = $_POST['alamat'];
$gaji = $_POST['gaji'];

// Menambahkan Data Pegawai
$sql = "INSERT INTO data_pegawai (nama, email, jabatan, alamat, gaji) VALUES ('$nama', '$email', '$jabatan', '$alamat', $gaji)";

if ($conn->query($sql) === TRUE) {
    echo "Pegawai berhasil ditambahkan. <a href='index.php'>Kembali ke daftar pegawai</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>