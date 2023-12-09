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

// Memproses data yang dikirimkan dari formulir tambah data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $fakultas = $_POST["fakultas"];
    $pekerjaan = $_POST["pekerjaan"];
    $url_linkedin = $_POST["url_linkedin"]; // Menambahkan field URL LinkedIn
    $url_foto = $_POST["url_foto"]; // Mengambil URL foto dari formulir

    // Check if the LinkedIn URL is a valid URL
    if (!filter_var($url_linkedin, FILTER_VALIDATE_URL)) {
        echo "Error: Invalid LinkedIn URL format";
        // Handle the error as needed (e.g., return an error message to the user)
    } else {
        // Continue with the insertion into the database
        // ...

        // Query untuk menyimpan data ke dalam tabel alumni_info
        $query_insert = "INSERT INTO alumni_info (nama, url_foto, fakultas, pekerjaan, url_linkedin) VALUES ('$nama', '$url_foto', '$fakultas', '$pekerjaan', '$url_linkedin')";

        if (mysqli_query($conn, $query_insert)) {
            header("Location: admin_dashboard.php?success=true"); // Redirect dengan parameter success
            exit();
        } else {
            echo "Error: " . $query_insert . "<br>" . mysqli_error($conn);
        }
    }

    // Query untuk menyimpan data ke dalam tabel alumni_info
    $query_insert = "INSERT INTO alumni_info (nama, url_foto, fakultas, pekerjaan, url_linkedin) VALUES ('$nama', '$url_foto', '$fakultas', '$pekerjaan', '$url_linkedin')";

    if (mysqli_query($conn, $query_insert)) {
        header("Location: admin_dashboard.php?success=true"); // Redirect dengan parameter success
        exit();
    } else {
        echo "Error: " . $query_insert . "<br>" . mysqli_error($conn);
    }
}

// Tutup koneksi
mysqli_close($conn);
?>
