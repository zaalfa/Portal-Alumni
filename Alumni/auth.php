<?php
session_start();

function isLoggedAdmin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

function authenticateAdmin($username, $password) {
    // Contoh sederhana untuk otentikasi
    $adminUser = [
        'username' => 'admin',
        'password' => password_hash('adminpass', PASSWORD_DEFAULT),
        'role' => 'admin',
    ];

    if ($username === $adminUser['username'] && password_verify($password, $adminUser['password'])) {
        $_SESSION['user'] = $adminUser;
        return true;
    }

    return false;
}

function logout() {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    logout();
}
?>
