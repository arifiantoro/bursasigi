<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?? "Selamat Datang " . user()->username ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= csrf_meta() ?>

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('asset_admin/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= base_url('asset_admin/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
    <!-- <link href="<?= base_url('asset_admin/vendor/simple-datatables/style.css') ?>" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="<?= base_url('asset_admin/css/style.css') ?>" rel="stylesheet">

    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />

    <!-- Bootstrap CSS v5.2.1 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link href="<?= base_url('asset_admin/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="<?= base_url('asset_admin/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Nunito", sans-serif;
        }

        body {
            font-family: "Open Sans", sans-serif;
            background: #f6f9ff;
            color: #444444;
        }
    </style>
</head>

<body style="background-image: url('<?= base_url('assets/img/coverlog.jpg') ?>'); background-size: cover; height:100vh;">
    <header>
        <nav class="shadow navbar navbar-expand-sm navbar-dark px-4" style="background-color: none;">
            <a class="navbar-brand d-flex align-items-center" style="color:#FF6600" href="<?= base_url('/member') ?>">
                <img src="<?= base_url('assets/img/img/sinergi.png') ?>" alt="Logo Sinarindosinergi" style="height:60px; width:auto;" class="d-inline-block align-text-top logos">
                <div class="mx-2 mt-3" id="untitled">
                    <h1 class="h4 fw-bold" style="line-height:0pt !important">LPK SIGI</h1>
                    <small>Member Area</small>
                </div>
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a style="color:#FF6600" class="nav-link <?php if (!empty($aktif) && $aktif == 'Beranda') {
                                                                        echo 'active';
                                                                    } ?>" href="<?= base_url('/member') ?>" aria-current="page"><i class="bi bi-house-fill"></i> Beranda <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a style="color:#FF6600" class="nav-link <?php if (!empty($aktif) && $aktif == 'Status') {
                                                                        echo 'active';
                                                                    } ?>" href="<?= base_url('/member/status') ?>"><i class="bi bi-card-checklist"></i> Status LoKer</a>
                    </li>
                    <li class="nav-item">
                        <a style="color:#FF6600" class="nav-link <?php if (!empty($aktif) && $aktif == 'loker') {
                                                                        echo 'active';
                                                                    } ?>" href="<?= base_url('/member/status') ?>"><i class="bi bi-search"></i> Cari LoKer</a>
                    </li>
                </ul>
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-4" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#FF6600"><?= user()->username ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="<?= base_url('member/atur-profil') ?>">Atur Profil</a>
                            <a class="dropdown-item" href="<?= base_url('/member/ubah') ?>">Ubah Password</a>
                            <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
                        </div>
                    </li>
                </ul>

            </div>

        </nav>
    </header>
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column">
                    <div class="card bg-white borderless border-0 shadow text-center" style="height: 45vh;">
                        <img class="card-img-top ms-auto me-auto" src="<?= base_url('assets/img/img/sinergi.png') ?>" style="width:100px;" alt="Title">
                        <div class="card-body py-3">
                            <h4><?= user()->firstname . ' ' . user()->lastname ?></h4>
                            <span>Member Sejak, <?= date('d-m-Y', strtotime(user()->created_at)) ?></span>
                        </div>
                    </div>

                    <div class="shadow p-3 mt-3 rounded bg-white px-4">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a style="color:#FF6600" class="nav-link <?php if (!empty($aktif) && $aktif == 'Beranda') {
                                                                                echo 'active';
                                                                            } ?>" href="<?= base_url('/member') ?>" aria-current="page"><i class="bi bi-house-fill"></i> Beranda <span class="visually-hidden">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a style="color:#FF6600" class="nav-link <?php if (!empty($aktif) && $aktif == 'Status') {
                                                                                echo 'active';
                                                                            } ?>" href="<?= base_url('/member/atur-profil') ?>"><i class="bi bi-file-person"></i> Atur Profil</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:#FF6600" class="nav-link <?php if (!empty($aktif) && $aktif == 'Status') {
                                                                                echo 'active';
                                                                            } ?>" href="<?= base_url('/member/atur-riwayat') ?>"><i class="bi bi-file-person"></i> Atur Riwayat Pendidikan</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:#FF6600" class="nav-link <?php if (!empty($aktif) && $aktif == 'Status') {
                                                                                echo 'active';
                                                                            } ?>" href="<?= base_url('/member/atur-kompetensi') ?>"><i class="bi bi-file-person"></i> Atur Kompetensi</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:#FF6600" class="nav-link <?php if (!empty($aktif) && $aktif == 'loker') {
                                                                                echo 'active';
                                                                            } ?>" href="<?= base_url('/member/ubah') ?>"><i class="bi bi-key"></i> Ubah Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="shadow h-100 bg-white">