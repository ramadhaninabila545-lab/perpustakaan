<?php
require 'koneksi.php';

// 1. PROSES SIMPAN DATA BARU
if (isset($_POST['submit'])) {
    $nim   = trim($_POST['nim']);
    $nama  = trim($_POST['nama']);
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $no_hp = !empty($_POST['no_hp']) ? trim($_POST['no_hp']) : null;

    // Cek duplikat NIM
    $cek = $koneksi->prepare("SELECT id_anggota FROM anggota WHERE nim = ?");
    $cek->bind_param("s", $nim);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows > 0) {
        echo "<script>alert('NIM sudah terdaftar. Gunakan NIM lain.'); window.location='form_anggota.php';</script>";
        exit;
    }

    $stmt = $koneksi->prepare("INSERT INTO anggota (nim, nama, email, no_hp) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nim, $nama, $email, $no_hp);

    if ($stmt->execute()) {
        header("Location: anggota.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
}

// 2. PROSES UBAH DATA (Sesuai petunjuk gambar: cek duplikat mengecualikan id sendiri)
if (isset($_POST['update'])) {
    $id_anggota = (int) $_POST['id_anggota'];
    $nim        = trim($_POST['nim']);
    $nama       = trim($_POST['nama']);
    $email      = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $no_hp      = !empty($_POST['no_hp']) ? trim($_POST['no_hp']) : null;

    // Cek duplikat NIM saat update (kecuali miliknya sendiri)
    $cek = $koneksi->prepare("SELECT id_anggota FROM anggota WHERE nim = ? AND id_anggota != ?");
    $cek->bind_param("si", $nim, $id_anggota);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows > 0) {
        echo "<script>alert('NIM sudah ada'); window.location='edit_anggota.php?id=$id_anggota';</script>";
        exit;
    }

    $stmt = $koneksi->prepare("UPDATE anggota SET nim = ?, nama = ?, email = ?, no_hp = ? WHERE id_anggota = ?");
    $stmt->bind_param("ssssi", $nim, $nama, $email, $no_hp, $id_anggota);

    if ($stmt->execute()) {
        header("Location: anggota.php");
        exit;
    } else {
        echo "Gagal memperbarui data: " . $koneksi->error;
    }
}


header("Location: anggota.php");
exit;
?>