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
$nama_perusahaan = $_POST['nama_perusahaan'];
$url_poster = $_POST['url_poster'];
$url_loker = $_POST['url_loker']; // Menambahkan penanganan input untuk URL Lowongan

// Lakukan proses input lowongan pekerjaan ke database
$query = "INSERT INTO lowongan_pekerjaan (perusahaan, url_poster, url_loker) VALUES ('$nama_perusahaan', '$url_poster', '$url_loker')";
$result = mysqli_query($conn, $query);

if ($result) {
    // Jika proses input berhasil, tampilkan popup berhasil dan arahkan kembali ke halaman admin_dashboard.php
    echo '<script>';
    echo 'alert("Data lowongan pekerjaan berhasil ditambahkan.");';
    echo 'window.location.href = "admin_dashboard.php";'; // Redirect ke halaman admin_dashboard.php
    echo '</script>';
    exit;
} else {
    // Jika proses input gagal, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
