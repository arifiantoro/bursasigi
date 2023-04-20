<main id="main" class="main">

  <div class="pagetitle">
    <h1>Laman Peserta</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
        <li class="breadcrumb-item active">Peserta</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Top Selling -->
      <div class="col-12">
        <div class="card top-selling overflow-auto">

          <div class="card-body pb-0">
            <div class="row align-items-center justify-content-center">
              <div class="col-8">
                <h5 class="card-title">Peserta: </h5>
              </div>
              <div class="col-4 text-end">
                <button class="btn btn-sm btn-primary" onclick="location.href='<?= base_url('admin/member/tambah') ?>'"><i class="bi bi-person-plus-fill"></i> Tambah Anggota Baru</button>
              </div>
            </div>
            <table class="table table-stripped my-1" id="tablekan">
              <thead class="bg-dark text-white">
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Profil Lengkap</th>
                  <th>Pengaturan</th>
                </tr>
              </thead>
            </table>

          </div>

        </div>
      </div><!-- End Top Selling -->

    </div>

    </div>
  </section>

</main><!-- End #main -->
<?= $this->section('customScript') ?>
<script>
  var table = $('#tablekan').DataTable({
    responsive: true,
    "processing": true,
    "ajax": {
      'url': '<?= base_url('admin/member/get') ?>',
      'dataSrc': ''
    },
    'columns': [{
        "data": "no"
      },
      {
        "data": "username"
      },
      {
        "data": "nama_lengkap"
      },
      {
        "data": "email"
      },
      {
        data: 'user_id',
        "render": function(data) {
          return '<a class="btn btn-sm btn-primary" href="<?= base_url('admin/member/detail') ?>/' + data + '"><i class="bi bi-person-fill"></i> Lihat Detail Profil</a>'
        }
      },
      {
        data: 'user_id',
        "render": function(data) {
          let cetak = `
                                      <a class="btn btn-sm btn-primary m-1" href="<?= base_url('admin/member/edit') ?>/` + data + `"><i class="bi bi-person-fill-gear"></i> Edit Profil</a>
                                      <a class="btn btn-sm btn-primary m-1" href="<?= base_url('admin/member/riwayat') ?>/` + data + `"><i class="bi bi-person-fill-gear"></i> Atur Riwayat</a> </br>
                                      <a class="btn btn-sm btn-warning m-1 disabled" href="<?= base_url('admin/member/ban') ?>/` + data + `"><i class="bi bi-person-fill-exclamation"></i> Ban Member</a> 
                                      <a class="btn btn-sm btn-danger m-1 disabled" href="<?= base_url('admin/member/delete') ?>/` + data + `"><i class="bi bi-person-dash-fill"></i> Hapus Member</a>
                                    `;
          return cetak;
        }
      },
    ]
  });
</script>
<?= $this->endSection() ?>