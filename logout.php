<?php

// Konfigurasi Database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'login';

// Koneksi ke Database
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa Koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Fungsi untuk melakukan login
function login($npm, $password) {
    global $koneksi;

    // Hindari SQL Injection
    $npm = $koneksi->real_escape_string($npm);

    // Ambil data pengguna dari database
    $query = "SELECT * FROM user_login WHERE npm = '$npm'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Periksa kata sandi
        if (password_verify($password, $user['password'])) {
            return $user; // Berhasil login
        }
    }

    return false; // Gagal login
}

// Fungsi untuk melakukan registrasi
function register($nama, $npm, $password) {
    global $koneksi;

    // Hindari SQL Injection
    $nama = $koneksi->real_escape_string($nama);
    $npm = $koneksi->real_escape_string($npm);

    // Enkripsi kata sandi sebelum disimpan di database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data pengguna ke database
    $query = "INSERT INTO user_login (nama, npm, password) VALUES ('$nama', '$npm', '$hashed_password')";
    $result = $koneksi->query($query);

    return $result;
}

?>
