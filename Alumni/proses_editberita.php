<?php
// Lakukan koneksi ke database
$host = "localhost";
$username = "root";
$password = "rahasia";
$database = "portal_alumni";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Tangkap data yang dikirimkan dari form
$judul = $_POST['judul'];
$link_gambar = $_POST['link_gambar'];
$link_berita = $_POST['link_berita'];

// Cek apakah link_berita adalah URL yang valid
if (!filter_var($link_berita, FILTER_VALIDATE_URL)) {
    echo '<script>';
    echo 'alert("Link berita tidak valid. Harap masukkan URL yang benar.");';
    echo 'window.location.href = "tambah_berita.php";'; // Redirect kembali ke halaman tambah_berita.php
    echo '</script>';
    exit;
}

// Lakukan proses update berita di database
$query = "INSERT INTO berita_alumni (judul, url_gambar, url_berita) VALUES('$judul', '$link_gambar','$link_berita')";
$result = mysqli_query($conn, $query);

if ($result) {
    // Jika proses update berhasil, tampilkan popup berhasil dan arahkan kembali ke halaman admin_dashboard.php
    echo '<script>';
    echo 'alert("Data berhasil ditambahkan.");';
    echo 'window.location.href = "admin_dashboard.php";'; // Redirect ke halaman admin_dashboard.php
    echo '</script>';
    exit;
} else {
    // Jika proses update gagal, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
