<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman <?php echo e(isset($data['judul']) ? $data['judul'] : ''); ?></title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/style.css">
</head>
<body data-baseurl="<?php echo BASEURL; ?>">

<?php
$url = isset($_GET['url']) ? $_GET['url'] : '';
$segmen = explode('/', $url);
$controllerAktif = $segmen[0];
$isHome = ($controllerAktif === '' || $controllerAktif === 'home');
$isMahasiswa = ($controllerAktif === 'mahasiswa');
$isMatakuliah = ($controllerAktif === 'matakuliah');
$isAbout = ($controllerAktif === 'about');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-kuning">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BASEURL; ?>">PWBO Lanjutan</a>

        <button class="navbar-toggler" type="button" id="navbarToggler"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link<?php echo $isHome ? ' active' : ''; ?>" href="<?php echo BASEURL; ?>">Home<?php echo $isHome ? ' <span class="sr-only">(current)</span>' : ''; ?></a>
                <a class="nav-link<?php echo $isMahasiswa ? ' active' : ''; ?>" href="<?php echo BASEURL; ?>/mahasiswa">Mahasiswa<?php echo $isMahasiswa ? ' <span class="sr-only">(current)</span>' : ''; ?></a>
                <a class="nav-link<?php echo $isMatakuliah ? ' active' : ''; ?>" href="<?php echo BASEURL; ?>/matakuliah/tampil">Mata Kuliah<?php echo $isMatakuliah ? ' <span class="sr-only">(current)</span>' : ''; ?></a>
                <a class="nav-link<?php echo $isAbout ? ' active' : ''; ?>" href="<?php echo BASEURL; ?>/about">About<?php echo $isAbout ? ' <span class="sr-only">(current)</span>' : ''; ?></a>
            </div>
        </div>
    </div>
</nav>

<main class="container main-content">
