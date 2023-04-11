<main id="main" class="main">

  <div class="pagetitle">
    <h1>Detail Peserta</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
        <li class="breadcrumb-item active">Peserta</li>
        <li class="breadcrumb-item active">detail</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Top Selling -->
      <div class="col-12">
        <div class="card top-selling overflow-auto p-3">
          <span class="card-title">Biodata Peserta</span>
          <table class="table table-stripped">
            <tr>
              <td>Nama Lengkap</td>
              <td>:</td>
              <td><?= $member->nama_lengkap ?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td><?= $member->jenis_kelamin ?></td>
            </tr>
            <tr>
              <td>Kota Domisili</td>
              <td>:</td>
              <td><?= $member->kota_tinggal ?></td>
            </tr>
            <tr>
              <td>Alamat Member</td>
              <td>:</td>
              <td><?= $member->alamat_member ?></td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir</td>
              <td>:</td>
              <td><?= $member->pendidikan ?></td>
            </tr>

            <tr>
              <td>Pas Foto</td>
              <td>:</td>
              <td><?= $member->pasfoto ?? "Belum Upload Foto" ?></td>
            </tr>

            <tr>
              <td>Deskripsi Member</td>
              <td>:</td>
              <td><?= $member->deskripsi_member ?></td>
            </tr>
            <tr>
              <td>Keahlian Member</td>
              <td>:</td>
              <td><?= $member->keahlian_member ?></td>
            </tr>
          </table>

          <span class="card-title">Riwayat Pendidikan</span>
          <div class="row">
            <div class="col-md-4">
              <table class="table table-stripped">
                <tr>
                  <td>Jenjang</td>
                  <td>:</td>
                  <td><?= $pendidikan->pendidikan ?? "Tidak Tertera" ?></td>
                </tr>

                <tr>
                  <td>Nama Institusi</td>
                  <td>:</td>
                  <td><?= $pendidikan->sekolah ?? "Tidak Tertera" ?></td>
                </tr>

                <tr>
                  <td>Jurusan</td>
                  <td>:</td>
                  <td><?= $pendidikan->jurusan ?? "Tidak Tertera" ?></td>
                </tr>

                <tr>
                  <td>Nilai Akhir</td>
                  <td>:</td>
                  <td><?= $pendidikan->ipk ?? "Tidak Tertera" ?></td>
                </tr>
              </table>

            </div>

          </div>


        </div>

        <div class="text-end card top-selling p-3">
          <a class="btn btn-sm btn-primary m-1" href="<?= base_url('admin/member/edit/' . $member->user_id) ?>"><i class="bi bi-person-fill-gear"></i> Edit Profil</a>
          <div class="d-flex flex-row">
            <a class="btn btn-sm btn-warning m-1 w-50" href="<?= base_url('admin/member/ban/' . $member->user_id) ?>"><i class="bi bi-person-fill-exclamation"></i> Ban Member</a>
            <a class="btn btn-sm btn-danger m-1 w-50" href="<?= base_url('admin/member/delete/' . $member->user_id) ?>"><i class="bi bi-person-dash-fill"></i> Hapus Member</a>
          </div>
        </div>
      </div><!-- End Top Selling -->
    </div>
  </section>

</main><!-- End #main -->
<?= $this->section('customScript') ?>
<?= $this->endSection() ?>