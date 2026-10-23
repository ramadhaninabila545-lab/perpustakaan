<?php
require 'koneksi.php';

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    $stmt = $koneksi->prepare("DELETE FROM anggota WHERE id_anggota = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: anggota.php");
exit;
?>