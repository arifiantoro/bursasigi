<!DOCTYPE html>
<html lang="en">
<?= helper(['auth']) ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPK Sinarindosinergi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>">
</head>
<body>
    <!--cover web-->
    <div class="sec1">
        <nav class="navbar navbar-light bg-none justify-content-center">
        <div class="container justify-content-center align-items-center">
            <a class="navbar-brand d-flex align-items-center" style="color:#FF6600" href="<?= base_url() ?>">
            <img src="<?= base_url('assets/img/img/sinergi.png') ?>" alt="Logo Sinarindosinergi" style="height:100px; width:auto;" class="d-inline-block align-text-top logos">
            <!-- <img src="https://sinarindosinergi.com/assets/images/Logo_sinergi.png" alt="Logo Sinarindosinergi" style="height:100px; width:auto;" class="d-inline-block align-text-top logos"> -->
            <h1 class="mx-2 fw-bold h4 mt-1" id="untitled">BURSA KERJA SIGI</h1>
            </a>
            <div class="ms-auto d-flex flex-row">
            <a href="<?= base_url() ?>" class="nav-link mobo" style="color:#FF6600;font-weight:bold;" >Beranda</a>
            <a href="#tentang" class="nav-link" data-bs-toggle="modal" data-bs-target="#cover" style="color:#FF6600;font-weight:bold;" >Tentang Kami</a>
            <!-- <a href="<?= base_url('/faq') ?>" class="nav-link " style="color:#FF6600;font-weight:bold;" >FAQ</a> -->
            
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold" style="color:#FF6600" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cari LoKer</a>
                    <div class="dropdown-menu p-2 rounded" style="border:none !important;" aria-labelledby="dropdownId">
                        <a class="dropdown-item" style="color:#FF6600" href="#">LoKer Hanya Untuk Kamu</a>
                        <a class="dropdown-item" style="color:#FF6600" href="#">Cari LoKer</a>
                    </div>
                </div>

                <div class="nav-item dropdown mobo">
                    <a class="nav-link dropdown-toggle fw-bold" style="color:#FF6600" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pasang LoKer</a>
                    <div class="dropdown-menu p-2 rounded" style="border:none !important;" aria-labelledby="dropdownId">
                        <a class="dropdown-item" style="color:#FF6600" href="<?= base_url('/tatacara') ?>">Ingin Pasang LoKer ?</a>
                        <a class="dropdown-item" style="color:#FF6600" href="<?= base_url('/kerjasama') ?>">Ingin Bekerja Sama ?</a>
                    </div>
                </div>

            <?php if(logged_in() != TRUE ): ?>
            <li class="nav-item dropdown" style="list-style-type: none;">
                    <a class="nav-link" href="<?= base_url('login') ?>" role="button" style="color:#FF6600;font-weight:bold;" >
                        Masuk 
                    </a>
            </li>
            
            <a href="<?= base_url('register') ?>" class="btn rounded text-white h3 mobo" style="background:#FF6600;"><strong>Daftar</strong></a>
            <?php else: ?>
                <?php if(in_groups('peserta') == TRUE): ?>
                <a href="<?= base_url('peserta') ?>" class="nav-link mobo" style="color:#FF6600;font-weight:bold;" >Dashboard Aplikasi</a>
                <?php else: ?>
                <a href="<?= base_url('admin') ?>" class="nav-link mobo" style="color:#FF6600;font-weight:bold;" >Dashboard Admin</a>
                <?php endif ?>
                <a href="<?= base_url('logout') ?>" class="btn rounded text-white h3" style="background:#FF6600;"><strong>Keluar</strong></a>
            <?php endif; ?>
            </div>
        </div>
        </nav>
        <?= $this->renderSection('konten') ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
</body>
</html>