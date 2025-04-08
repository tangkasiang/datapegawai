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

// Mengambil ID dari URL
$id = $_GET['id'];

// Mengambil data pegawai berdasarkan ID
$result = $conn->query("SELECT * FROM data_pegawai WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update Pegawai</h1>
        <form action="update_pegawai_action.php?id=<?php echo $id; ?>" method="POST" class="mt-4">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $row['jabatan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gaji">Gaji</label>
                <input type="number" class="form-control" id="gaji" name="gaji" value="<?php echo $row['gaji']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Pegawai</button>
        </form>
    </div>
</body>
</html>