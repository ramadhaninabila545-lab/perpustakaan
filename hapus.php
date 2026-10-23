<?php
require 'koneksi.php';

if(isset($_GET['id'])) {
    $id = (int) $_GET['id']; // Mengamankan ID agar wajib berupa angka

    $query = $koneksi->query("DELETE FROM buku WHERE id_buku='$id'");

    header("Location: buku.php");
    exit;
}
?>