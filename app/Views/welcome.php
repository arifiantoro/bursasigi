<!DOCTYPE html>
<html lang="en">
<?= helper(['auth']) ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPK Sinarindosinergi Job Station</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>">
</head>

<body>
    <!--cover web-->
    <div class="sec1">
        <nav class="navbar navbar-light bg-none">
            <div class="container justify-content-center align-items-center">
                <a class="navbar-brand d-flex align-items-center" style="color:#FF6600" href="<?= base_url() ?>">
                    <img src="<?= base_url('assets/img/img/sinergi.png') ?>" alt="Logo Sinarindosinergi" style="height:100px; width:auto;" class="d-inline-block align-text-top logos">
                    <div class="mx-2 mt-4" id="untitled">
                        <h1 class="h3 fw-bold" style="line-height:0pt !important">LPK SIGI</h1>
                        <small>Job Station & Competencies</small>
                    </div>
                </a>
                <div class="ms-auto d-flex" style="font-size: 11pt;">
                    <a href="<?= base_url() ?>" class="nav-link mobo" style="color:#FF6600;font-weight:bold;">Beranda</a>
                    <a href="#tentang" class="nav-link" data-bs-toggle="modal" data-bs-target="#cover" style="color:#FF6600;font-weight:bold;">Tentang Kami</a>
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

                    <?php if (logged_in() != TRUE) : ?>
                        <li class="nav-item dropdown" style="list-style-type: none;">
                            <a class="nav-link" href="<?= base_url('login') ?>" role="button" style="color:#FF6600;font-weight:bold;">
                                Masuk
                            </a>
                        </li>

                        <div class="nav-item dropdown mobo">
                            <a class="nav-link dropdown-toggle fw-bold" style="color:#FF6600" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Daftar</a>
                            <div class="dropdown-menu p-2 rounded" style="border:none !important;" aria-labelledby="dropdownId">
                                <a class="dropdown-item" style="color:#FF6600" href="<?= base_url('register') ?>">Pencari Kerja</a>
                                <a class="dropdown-item" style="color:#FF6600" href="<?= base_url('registerper') ?>">Perusahaan</a>
                            </div>
                        </div>

                        <!-- <a href="<?= base_url('register') ?>" class="btn rounded text-white h3 mobo" style="background:#FF6600;"><strong>Pencari Kerja</strong></a> -->

                    <?php else : ?>
                        <?php if (in_groups('pencari') == TRUE) : ?>
                            <a href="<?= base_url('member') ?>" class="nav-link mobo" style="color:#FF6600;font-weight:bold;">Dashboard</a>
                        <?php elseif (in_groups('perusahaan')) : ?>
                            <a href="<?= base_url('perusahaan') ?>" class="nav-link mobo" style="color:#FF6600;font-weight:bold;">Dashboard</a>
                        <?php else : ?>
                            <a href="<?= base_url('admin') ?>" class="nav-link mobo" style="color:#FF6600;font-weight:bold;">Admin Lounge</a>
                        <?php endif ?>
                        <a href="<?= base_url('logout') ?>" class="btn rounded text-white h3" style="background:#FF6600;"><strong>Keluar</strong></a>
                    <?php endif; ?>
                </div>
            </div>
    </div>
    </nav>
    <div class="d-flex">
        <div class="col-md-6">
            <div class="about" id="tentang" style="color:#FF6600 !important">
                <!-- <h3 class="mx-2 fw-bold">LPK Sinarindosinergi</h3> -->
                <img src="<?= base_url('assets/img/img/cover.svg') ?>" alt="covering" class="mobilecov" style="max-width:60%;">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner mt-3">
                        <div class="carousel-item active h2 text-justify" data-bs-interval="3000">
                            Tingkatkan Kualitas Diri <br> dan Dapatkan Pekerjaan Impian Anda!
                        </div>
                        <div class="carousel-item h2" data-bs-interval="3000">
                            Kami Akan Membantu Anda <br> Menjawab Tantangan Pada Dunia Kerja.
                        </div>
                        <div class="carousel-item h2" data-bs-interval="3000">
                            Kemampuan Kerja Yang Spesifik <br> Akan Membantu Menghadapi Dunia Kerja.
                        </div>
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> -->
                </div>
                <?php if (logged_in() != TRUE) : ?>
                    <a href="<?= base_url('register') ?>" class="mt-2 btn btn-lg btn-outline-light d-none">Daftar Sekarang!</a>
                <?php else : ?>
                    <?php if (in_groups('peserta') == TRUE) : ?>
                        <a href="<?= base_url('peserta/') ?>" class="mt-2 btn btn-lg btn-outline-light">Masuk Aplikasi Disini!</a>
                    <?php else : ?>
                        <a href="<?= base_url('admin/') ?>" class="mt-2 btn btn-lg btn-outline-light">Masuk Dashboard Administrator !</a>
                    <?php endif ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6 nyaa">
            <!-- <img src="<?= base_url('assets/img/img/cover.svg') ?>" alt="covering" style="max-width:80%;" > -->
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <!--Mengapa Kami-->
    <div class="sec2">
        <div class="container py-3">
            <div class="row align-items-stretch">
                <div class="col-lg-4 col-md-6 col-sm-12 p-3 align-self-stretch text-center">
                    <div class="card shadow border-0 py-2 h-100" style="background:#F4F5F9;">
                        <div class="card-header" style="background: none; border:none;">
                            <img src="<?= base_url('assets/img/img/c3.svg') ?>" style="height:119px; color:#FF6600;" class="p-3">
                            <br><strong>Berizin Kemnaker</strong>
                        </div>

                        <div class="car-body px-3 h-100">
                            <p class="mt-1">Kami Juga Merupakan Lembaga Pelatihan & Pembinaan Yang Memiliki Izin Langsung Dari Pihak Kementrian Ketenagakerjaan.</p>
                        </div>

                        <div class="card-footer" style="background: none; border:none;">
                            <hr class="garis">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 p-3 align-self-stretch text-center">
                    <div class="card shadow border-0 py-2 h-100" style="background:#F4F5F9;">
                        <div class="card-header" style="background: none; border:none;">
                            <img src="<?= base_url('assets/img/img/c3.svg') ?>" style="height:119px;" class="p-3">
                            <br><strong>Bersertifikat Kemnaker</strong>
                        </div>

                        <div class="car-body px-3 h-100">
                            <p class="mt-1">Hasil Kelulusan Melalui Program Pelatihan Kami Setara Dengan Sertifikat Kelulusan Yang Dikeluarkan Kemnaker.</p>
                        </div>

                        <div class="card-footer" style="background: none; border:none;">
                            <hr class="garis">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 p-3 align-self-stretch text-center">
                    <div class="card shadow border-0 py-2 h-100" style="background:#F4F5F9;">
                        <div class="card-header" style="background: none; border:none;">
                            <img src="<?= base_url('assets/img/img/c1.svg') ?>" style="height:119px;" class="p-3">
                            <br><strong>Mentor Berpengalaman</strong>
                        </div>
                        <div class="car-body px-3 h-100">
                            <p class="mt-1">Kami memiliki mentor mentor yang berpengalaman dibidangnya, untuk mencetak generasi siap kerja.</p>
                        </div>
                        <div class="card-footer" style="background: none; border:none;">
                            <hr class="garis">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Bagian Container-->
        <div class="sec3">
            <div class="container sec3 py-5">
                <div class="card p-3 border-0 rounded" style="background:#F4F5F9;">
                    <div class="text-center">
                        <h3 class="h2">Partner Kami</h3>
                        <span class="fw-reguler">Bursa Kerja LPK SiGI Bekerja Sama Dengan Banyak Perusahaan Diantaranya</span>
                    </div>


                    <div id="carouselExampleControls" class="carousel carousel-dark slide mt-4" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">

                                <div class="card-wrapper container-sm d-flex  justify-content-around">

                                    <div class="card border-0" style="width: 18rem;align-items: center;background:none;">
                                        <img src="https://www.sinarmed.com/image/tentang-kami/sinarmed.png" class="card-img-top" alt="..." style="width: 50% !important;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Sinarmed Jaya</h5>
                                        </div>
                                    </div>
                                    <div class="card border-0" style="width: 18rem;align-items: center;background:none;">
                                        <img src="https://www.sinarmed.com/image/tentang-kami/sgs.png" class="card-img-top" alt="..." style="width: 50% !important;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Sinarindo Global Sarana</h5>
                                        </div>
                                    </div>
                                    <div class="card border-0" style="width: 18rem;align-items: center;background:none;">
                                        <img src="https://www.gspace.co.id/asset_website/img/Artboard%201%20copy%204.png" class="card-img-top" alt="..." style="width: 50% !important;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">G-Space</h5>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container-fluid p-3">
                <div class="row ">
                    <div class="col-md-8 text-center">
                        <div class="d-flex flex-row justify-content-center align-items-top">
                            <img src="<?= base_url('assets/img/img/logo.png') ?>" width="100">
                            <!-- <img src="https://kemnaker.go.id/assets/images/logo.png" alt="Logo Kemnaker" height="70px"> -->
                        </div>
                        <p class="text-white mt-1" style="font-size:10pt">&copy; <?= date('Y') ?> Sinarindo Digital, All Rights Reserved</p>
                    </div>
                    <!-- <div class="col-4 mobo"> -->
                    <!-- <div class="row"> -->
                    <!-- <div class="col-6"> -->
                    <!-- <a href="<?= base_url('beranda') ?>" class="nav-link text-white"> Beranda</a> -->
                    <!-- </div> -->
                    <!-- <div class="col-6"> -->
                    <!-- <a href="#tentang" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#cover" >Tentang Kami</a> -->
                    <!-- <a href="#tentang" class="nav-link text-white">Tentang Kami</a> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- <div class="row"> -->
                    <!-- <?php if (logged_in() != true) : ?> -->
                    <!-- <div class="col-md-6"><a href="<?= base_url('login') ?>" class="nav-link text-white">  Masuk</a></div> -->
                    <!-- <div class="col-md-6"><a href="<?= base_url('register') ?>" class="nav-link text-white"> Daftar</a></div> -->
                    <!-- <?php else : ?> -->
                    <!-- <div class="col-md-6"><a href="<?= base_url('peserta') ?>" class="nav-link text-white"> Dashboard Aplikasi</a></div> -->
                    <!-- <div class="col-md-6"><a href="<?= base_url('logout') ?>" class="nav-link text-white"> Keluar</a></div> -->
                    <!-- <?php endif; ?> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- <div class="col-2 mobo">
                    <div class="text-end">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="#" class="nav-link text-white"> Ikuti Kami</a></li>
                        <li class="nav-item"><a href="https://sinarindoglobalsinergi.com" class="nav-link text-white"> Sinarindoglobal Sinergi</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">  Instagram</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">  Facebook </a></li>
                    </ul>
                    </div>
            </div> -->
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>