<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail Perusahaan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/perusahaan') ?>">Perusahaan</a></li>
                <li class="breadcrumb-item active">detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto p-3">
                    <span class="card-title">Data Perusahaan</span>
                    <table class="table table-stripped">
                        <tr>
                            <td>Nama Penanggungjawab</td>
                            <td>:</td>
                            <td><?= user()->firstname . " " . user()->lastname ?></td>
                        </tr>
                        <tr>
                            <td>Telepon Penanggungjawab</td>
                            <td>:</td>
                            <td><?= $perusahaan->telppj ?></td>
                        </tr>
                        <tr>
                            <td>Bidang Usaha</td>
                            <td>:</td>
                            <td><?= dekripsi($perusahaan->bidang_usaha) ?></td>
                        </tr>
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td>:</td>
                            <td><?= dekripsi($perusahaan->nama_perusahaan) ?></td>
                        </tr>

                        <tr>
                            <td>Kota Perusahaan</td>
                            <td>:</td>
                            <td><?= dekripsi($perusahaan->kota) ?></td>
                        </tr>

                        <tr>
                            <td>Alamat Perusahaan</td>
                            <td>:</td>
                            <td><?= dekripsi($perusahaan->alamat_perusahaan) ?></td>
                        </tr>

                        <tr>
                            <td>Deskripsi Perusahaan</td>
                            <td>:</td>
                            <td><?= dekripsi($perusahaan->deskripsi_usaha) ?></td>
                        </tr>

                        <tr>
                            <td>Telepon</td>
                            <td>:</td>
                            <td><?= $perusahaan->telepon ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $perusahaan->email ?></td>
                        </tr>

                        <tr>
                            <td>Logo Perusahaan</td>
                            <td>:</td>
                            <td><?= $perusahaan->pasfoto ?></td>
                        </tr>

                    </table>
                </div>
            </div>


        </div><!-- End Top Selling -->
        </div>
    </section>

</main><!-- End #main -->
<?= $this->section('customScript') ?>
<?= $this->endSection() ?>