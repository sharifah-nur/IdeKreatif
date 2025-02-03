<?php
session_start();

$name = $_SESSION["name"];
$role = $_SESSION["role"];
//ambil notifikasi jika ada, kemudian hapus dari sesi
$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    unset($_SESSION['notification']);
}
if (empty($_SESSION["username"]) || empty($_SESSION["role"])) {
    $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Silahkan login terlebih dahulu!'
    ];
    header('Location: ./auth/login/php');
    exit();
}