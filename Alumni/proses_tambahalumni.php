<?php
// proses_tambahalumni.php

// Koneksi ke database
$host = "localhost"; // Sesuaikan dengan host Anda
$username = "root"; // Sesuaikan dengan username database Anda
$password = "rahasia"; // Sesuaikan dengan password database Anda
$database = "portal_alumni"; // Sesuaikan dengan nama database Anda

$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil data dari formulir
$tahun_lulus = $_POST['tahun_lulus'];
$jumlah_alumni = $_POST['jumlah_alumni'];
$vokasi = $_POST['vokasi'];
$sarjana = $_POST['sarjana'];
$magister = $_POST['magister'];
$spesialis = $_POST['spesialis'];
$doctor = $_POST['doctor'];

// Query untuk menyimpan data ke tabel alumni
$query = "INSERT INTO alumni (tahun_lulus, jumlah_alumni, vokasi, sarjana, magister, spesialis, doctor) VALUES ('$tahun_lulus', '$jumlah_alumni', '$vokasi', '$sarjana', '$magister', '$spesialis', '$doctor')";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    // Menyusun script JavaScript untuk menampilkan popup
    echo '<script>';
    echo 'alert("Data berhasil ditambahkan.");';
    echo 'window.location.href = "admin_dashboard.php";'; // Redirect ke halaman admin_dashboard.php
    echo '</script>';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
