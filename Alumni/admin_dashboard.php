<?php
require_once 'auth.php';

if (!isLoggedAdmin()) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['success']) && $_GET['success'] == 'true') {
    echo '<script>';
    echo 'alert("Data berhasil ditambahkan.");';
    echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal Alumni Universitas Brawijaya</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js initialization script here
        // ...

        // Ensure the data is available before creating the chart
        document.addEventListener('DOMContentLoaded', function () {
            // Fetch data and create chart here
            fetch("data_alumni.php")
                .then((response) => response.json())
                .then((data) => {
                    var ctx = document.getElementById("myDonutChart").getContext("2d");

                    var donutChart = new Chart(ctx, {
                        type: "doughnut",
                        data: {
                            labels: ["Vokasi", "Sarjana", "Magister", "Spesialis", "Doctor"],
                            datasets: [
                                {
                                    data: [
                                        data.Vokasi,
                                        data.Sarjana,
                                        data.Magister,
                                        data.Spesialis,
                                        data.Doctor,
                                    ],
                                    backgroundColor: [
                                        "rgba(245, 40, 145, 0.8)",
                                        "rgba(138, 0, 178, 0.8)",
                                        "rgba(255, 218, 0, 0.8)",
                                        "rgba(106, 156, 0, 0.8)",
                                        "rgba(0, 135, 255, 0.8)",
                                    ],
                                },
                            ],
                        },
                        options: {
                          legend: {
                            position: 'right', // Menentukan posisi legenda
                          },
                        },
                    });
                });
        });
    </script>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="brand">Portal Alumni</div>
        <nav>
          <ul>
            <li><a href="#home">Beranda</a></li>
            <li><a href="#alumni">Informasi Alumni</a></li>
            <li><a href="#lowongan">Lowongan Kerja</a></li>
            <li><a href="#berita">Berita Alumni</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="login">
        <?php if (isLoggedAdmin()): ?>
            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
        <?php else: ?>
            <a href="login.php">Admin? Login</a>
        <?php endif; ?>
    </div>

    <div class="banner-top">
        <img src="Frame 1.png" alt="Banner">
    </div>

<section id="home">
  <div class="container">
    <!-- Informasi Alumni -->
    <div class="informasi-alumni-header">
      <h2>Informasi Alumni</h2>
      <?php if (isLoggedAdmin()): ?>
        <a href="tambah_infoalumni.php" class="tombol-tambah">Tambah Data</a>
      <?php endif; ?>
    </div>
    <div class="chartContainer">
        <canvas id="myDonutChart"></canvas>
    </div>
</section>

<section id="prestasi">
    <div class="container">
        <div class="informasi-alumni-header">
            <h2>Prestasi Alumni</h2>
            <?php if (isLoggedAdmin()): ?>
                <a href="tambah_alumniprestasi.php" class="tombol-tambah">Tambah Data</a>
            <?php endif; ?>
        </div>
<div class="container">
    <?php
    // Koneksi ke database
    $host = "localhost";
    $username = "root";
    $password = "rahasia";
    $database = "portal_alumni";

    $conn = mysqli_connect($host, $username, $password, $database);

    // Cek koneksi
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Query untuk mengambil data dari tabel alumni_info
    $query_prestasi = "SELECT * FROM alumni_info";
    $result_prestasi = mysqli_query($conn, $query_prestasi);

    // Memeriksa apakah query berhasil dijalankan
    if ($result_prestasi) {
        echo "<div class='row'>";
        while ($row_prestasi = mysqli_fetch_assoc($result_prestasi)) {
            echo "<div class='col-md-4'>";
            echo "<div class='prestasi-item'>";
            echo "<div class='gambar-prestasi'>";
            echo "<img src='" . $row_prestasi['url_foto'] . "' alt='" . $row_prestasi['nama'] . "'/>";
            echo "</div>";
            echo "<div class='info-prestasi'>";
            echo "<h3>" . $row_prestasi['nama'] . "</h3>";
            echo "<p>Fakultas: " . $row_prestasi['fakultas'] . "</p>";
            echo "<p>Pekerjaan Saat Ini: " . $row_prestasi['pekerjaan'] . "</p>";
            echo "<p>LinkedIn: <a href='" . $row_prestasi['url_linkedin'] . "' target='_blank'>Profil LinkedIn</a></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "Error: " . $query_prestasi . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
    ?>
</div>
    </div>
</section>

    <section id="lowongan">
      <div class="container">
        <div class="informasi-alumni-header">
      <h2>Lowongan Kerja</h2>
      <?php if (isLoggedAdmin()): ?>
        <a href="tambah_lowongan.php" class="tombol-tambah">Edit Lowongan</a>
        <?php endif; ?>
    </div>
    <div class="row">
        <?php
        // Koneksi ke database
        $host = "localhost";
        $username = "root";
        $password = "rahasia";
        $database = "portal_alumni";

        $conn = mysqli_connect($host, $username, $password, $database);

        // Cek koneksi
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        // Query untuk mengambil data dari tabel lowongan_pekerjaan
        $query_lowongan = "SELECT * FROM lowongan_pekerjaan";
        $result_lowongan = mysqli_query($conn, $query_lowongan);

        // Memeriksa apakah query berhasil dijalankan
        if ($result_lowongan) {
            // Menampilkan data lowongan dalam bentuk daftar
            while ($row_lowongan = mysqli_fetch_assoc($result_lowongan)) {
                echo "<div class='col-md-4'>";
                echo "<div class='lowongan-item'>";
                echo "<h3>" . $row_lowongan['Perusahaan'] . "</h3>";
                echo "<img class='img-fluid' src='" . $row_lowongan['url_poster'] . "' alt='" . $row_lowongan['Perusahaan'] . "'/>";
                echo "<p><a href='" . $row_lowongan['url_loker'] . "' target='_blank'>Lihat Selengkapnya</a></p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "Error: " . $query_lowongan . "<br>" . mysqli_error($conn);
        }

        // Tutup koneksi
        mysqli_close($conn);
        ?>
        </div>
    </section>

    <section id="berita">
      <div class="container">
        <div class="informasi-alumni-header">
        <h2>Berita Terkait Alumni</h2>
        <!-- Tambahkan konten berita terkait alumni di sini -->
        <?php if (isLoggedAdmin()): ?>
          <a href="tambah_berita.php" class="tombol-tambah"
            >Edit Berita</a
          >
        <?php endif; ?>
      </div>
      <?php
            // Koneksi ke database
            $host = "localhost";
            $username = "root";
            $password = "rahasia";
            $database = "portal_alumni";

            $conn = mysqli_connect($host, $username, $password, $database);

            // Cek koneksi
            if (!$conn) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

            // Query untuk mengambil data dari tabel berita_alumni
            $query_berita = "SELECT * FROM berita_alumni";
            $result_berita = mysqli_query($conn, $query_berita);

            // Memeriksa apakah query berhasil dijalankan
            if ($result_berita) {
                // Menampilkan data berita dalam bentuk daftar
                while ($row_berita = mysqli_fetch_assoc($result_berita)) {
                    echo "<div class='berita-item'>";
                    echo "<div class='gambar-berita'>";
                    echo "<img src='" . $row_berita['url_gambar'] . "' alt='" . $row_berita['judul'] . "'/>";
                    echo "</div>";
                    echo "<div class='info-berita'>";
                    echo "<h3>" . $row_berita['judul'] . "</h3>";
                    echo "<p><a href='" . $row_berita['url_berita'] . "' target='_blank'>Baca Selengkapnya</a></p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Error: " . $query_berita . "<br>" . mysqli_error($conn);
            }

            // Tutup koneksi
            mysqli_close($conn);
            ?>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>&copy; 2023 Portal Alumni Universitas Brawijaya</p>
        <a href="https://layanankarir.ub.ac.id/" target="_blank"
          >Layanan Karir Universitas Brawijaya</a
        >
      </div>
    </footer>
  </body>
</html>
