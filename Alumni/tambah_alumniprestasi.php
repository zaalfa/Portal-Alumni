<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Alumni</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <header>
        <div class="container">
            <div class="brand">Portal Alumni</div>
            <nav>
                <ul>
                    <li><a href="admin_dashboard.php">Beranda</a></li>
                    <li><a href="#alumni">Informasi Alumni</a></li>
                    <li><a href="#lowongan">Lowongan Kerja</a></li>
                    <li><a href="#berita">Berita Alumni</a></li>
                    <li><a href="tambah_infoalumni.php">Tambah Data</a></li> <!-- Ganti link ke halaman tambah data -->
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <br>
        <br>
        <h2>Tambah Data Alumni</h2>
        <form action="proses_tambahprestasi.php" method="post" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="foto">Foto:</label>
            <input type="text" id="url_foto" name="url_foto" required> 

            <label for="fakultas">Fakultas:</label>
            <input type="text" id="fakultas" name="fakultas" required>

            <label for="pekerjaan">Pekerjaan Saat Ini:</label>
            <input type="text" id="pekerjaan" name="pekerjaan" required>

            <label for="url_linkedin">URL LinkedIn:</label>
            <input type="text" id="url_linkedin" name="url_linkedin">

            <button type="submit">Tambah Data</button>
        </form>
    </div>
</body>
</html>
