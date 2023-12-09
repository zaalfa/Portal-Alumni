<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
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
    <section id="edit-berita">
        <div class="container">
            <br>
            <h2>Edit Berita</h2>
            <form action="proses_editberita.php" method="post" enctype="multipart/form-data">
    
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" required>

                <label for="link_gambar">Gambar:</label>
                <input type="text" id="link_gambar" name="link_gambar" required>

                <label for="link_berita">Link Berita:</label>
                <input type="text" id="link_berita" name="link_berita" required>

                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </section>
</body>
</html>
