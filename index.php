<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('background.jpg'); /* Ganti dengan nama file gambar Anda */
            background-size: cover; /* Menyesuaikan ukuran gambar */
            background-position: center; /* Mengatur posisi gambar */
            color: white; /* Mengubah warna teks agar kontras dengan latar belakang */
        }
        .container {
            background-color: rgba(26, 25, 25, 0.5); /* Memberikan latar belakang transparan pada kontainer */
            padding: 20px; /* Memberikan padding pada kontainer */
            border-radius: 10px; /* Membuat sudut kontainer melengkung */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Sistem Manajemen Pegawai</h1>
        <form action="insert_pegawai.php" method="POST" class="mt-4">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="gaji">Gaji</label>
                <input type="number" class="form-control" id="gaji" name="gaji" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Pegawai</button>
        </form>

        <h2 class="mt-5">Daftar Pegawai</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $conn = new mysqli("localhost", "root", "", "pegawai");
            if ($conn->connect_error) {
                echo "<tr><td colspan='7' class='text-danger'>Koneksi gagal: " . $conn->connect_error . "</td></tr>";
            } else {
                $result = $conn->query("SELECT * FROM data_pegawai");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['jabatan']}</td>
                            <td>{$row['alamat']}</td>
                            <td>{$row['gaji']}</td>
                            <td><a href='delete_pegawai.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>
                                <a href='update_pegawai.php?id={$row['id']}' class='btn btn-warning'>Update</a></td>
                          </tr>";
                }
                $conn->close();
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>