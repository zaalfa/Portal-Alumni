<?php
// data_alumni.php

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

// Query untuk mengambil data dari tabel alumni
$query = "SELECT * FROM alumni";
$result = mysqli_query($conn, $query);

$data = array(
    'Vokasi' => 0,
    'Sarjana' => 0,
    'Magister' => 0,
    'Spesialis' => 0,
    'Doctor' => 0
);

// Menghitung jumlah alumni berdasarkan jenjang studi
while ($row = mysqli_fetch_assoc($result)) {
    $data['Vokasi'] += $row['vokasi'];
    $data['Sarjana'] += $row['sarjana'];
    $data['Magister'] += $row['magister'];
    $data['Spesialis'] += $row['spesialis'];
    $data['Doctor'] += $row['doctor'];
}

// Menampilkan data dalam format JSON
echo json_encode($data);

// Tutup koneksi
mysqli_close($conn);
?>
