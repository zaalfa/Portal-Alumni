<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Informasi Alumni</title>
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
    <section id="tambah-data">
        <div class="container">
            <br>
            <h2>Tambah Data Informasi Alumni</h2>
            <form action="proses_tambahalumni.php" method="post">

            <label for="tahun_lulus">Tahun Lulus:</label>
            <input type="text" id="tahun_lulus" name="tahun_lulus" required>

            <label for="jumlah_alumni">Jumlah Alumni:</label>
            <input type="number" id="jumlah_alumni" name="jumlah_alumni" required>
            
            <label for="vokasi">Jumlah Vokasi:</label>
            <input type="number" id="vokasi" name="vokasi" required>

            <label for="sarjana">Jumlah Sarjana:</label>
            <input type="number" id="sarjana" name="sarjana" required>

            <label for="magister">Jumlah Magister:</label>
            <input type="number" id="magister" name="magister" required>

            <label for="spesialis">Jumlah Spesialis:</label>
            <input type="number" id="spesialis" name="spesialis" required>

            <label for="doctor">Jumlah Doctor:</label>
            <input type="number" id="doctor" name="doctor" required>

                <button type="submit">Tambah Data</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2023 Portal Alumni Universitas Brawijaya</p>
            <a href="https://layanankarir.ub.ac.id/" target="_blank">Layanan Karir Universitas Brawijaya</a>
        </div>
    </footer>
</body>
</html>
