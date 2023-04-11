<main id="main" class="main">
    <div class="pagetitle">
      <h1>Detail Perusahaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
          <li class="breadcrumb-item active">Perusahaan</li>
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
                        <td>Nama Perushaan</td>
                        <td>:</td>
                        <td><?= $perusahaan->nama_perusahaan ?></td>
                    </tr>
            
                    <tr>
                        <td>Kota Perusahaan</td>
                        <td>:</td>
                        <td><?= $perusahaan->kota ?></td>
                    </tr>
                    
                    <tr>
                        <td>Alamat Perusahaan</td>
                        <td>:</td>
                        <td><?= $perusahaan->alamat_perusahaan ?></td>
                    </tr>
                                       
                    <tr>
                        <td>Logo Perusahaan</td>
                        <td>:</td>
                        <td><?= $perusahaan->pasfoto ?? "Belum Upload Foto" ?></td>
                    </tr>
                    
                    <tr>
                        <td>Deskripsi Persuhaaan</td>
                        <td>:</td>
                        <td><?= $perusahaan->deskripsi_usaha ?></td>
                    </tr>
                    
                </table>
              </div>
            </div>

            <div class="text-end card top-selling p-3">
                    <a class="btn btn-sm btn-primary m-1" href="<?= base_url('admin/perusahaan/edit/'.$perusahaan->user_id ) ?>"><i class="bi bi-person-fill-gear"></i> Edit Profil</a>
                    <div class="d-flex flex-row">
                        <a class="btn btn-sm btn-warning m-1 w-50 disabled" href="<?= base_url('admin/perusahaan/ban/'.$perusahaan->user_id ) ?>"><i class="bi bi-person-fill-exclamation"></i> Ban perusahaan</a>
                        <a class="btn btn-sm btn-danger m-1 w-50 disabled" href="<?= base_url('admin/perusahaan/delete/'.$perusahaan->user_id ) ?>"><i class="bi bi-person-dash-fill"></i> Hapus perusahaan</a>
                    </div>
            </div>
        </div><!-- End Top Selling -->
      </div>
    </section>

  </main><!-- End #main -->
  <?= $this->section('customScript') ?>
  <?= $this->endSection() ?>