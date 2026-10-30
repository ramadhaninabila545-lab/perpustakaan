<?php
$judul_halaman = $judul_halaman ?? 'Perpustakaan';
$menu_aktif = $menu_aktif ?? 'buku';
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($judul_halaman) ?> | Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg"
     style="background-color: #fbd0e2;">
    <div class="container-fluid">

        <a class="navbar-brand" href="Buku.php">
            Perpustakaan
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link <?= $menu_aktif == 'buku' ? 'active' : '' ?>"
                       href="/WEBDINAMIS/Perpustakaan/Buku.php">
                        Buku
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $menu_aktif == 'anggota' ? 'active' : '' ?>"
                       href="/WEBDINAMIS/Perpustakaan/anggota.php">
                        Anggota
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<div class="container mt-4">