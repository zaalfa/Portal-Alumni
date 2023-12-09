<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Lowongan Pekerjaan</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <header>
        <div class="container">
            <div class="brand">Portal Alumni</div>
            <nav>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="index.php">Informasi Alumni</a></li>
                    <li><a href="index.php">Lowongan Kerja</a></li>
                    <li><a href="index.php">Berita Alumni</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="login">
        <a href="logout.php">Logout</a>
    </div>
    <section id="input-lowongan">
        <div class="container">
            <br>
            <h2>Input Lowongan Pekerjaan</h2>
            <form action="proses_tambahloker.php" method="post">
                <label for="nama_perusahaan">Nama Perusahaan:</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" required>

                <label for="url_poster">Link Poster Lowongan:</label>
                <input type="text" id="url_poster" name="url_poster" required>

                <label for="url_loker">Link Lowongan:</label>
                <input type="text" id="url_loker" name="url_loker" required>

                <button type="submit">Simpan Data</button>
            </form>
        </div>
    </section>
</body>
</html>
