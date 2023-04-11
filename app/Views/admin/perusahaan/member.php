<main id="main" class="main">

    <div class="pagetitle">
      <h1>Laman Perusahaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
          <li class="breadcrumb-item active">perusahaan</li>
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
                        <h5 class="card-title">Perusahaan: </h5>
                    </div>
                    <div class="col-4 text-end">
                        <button class="btn btn-sm btn-primary" onclick="location.href='<?= base_url('admin/perusahaan/tambah') ?>'"><i class="bi bi-person-plus-fill"></i> Tambar perusahaan Baru</button>
                    </div>
                </div>
                   <table class="table table-stripped my-1" id="tablekan" >
                    <thead class="bg-dark text-white">
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Penanggung Jawab</th>
                        <th>Profil Perusahaan</th>
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
      var table =  $('#tablekan').DataTable({
          responsive: true, 
          "processing": true,
          "ajax": {
              'url': '<?= base_url('admin/perusahaan/get') ?>',
              'dataSrc': ''
          },
          'columns': [
                {"data": "no"},
                {"data": "username"},
                {"data": "nama_lengkap"},
                {
                    data: 'user_id',
                    "render": function (data) {
                        return '<a class="btn btn-sm btn-primary" href="<?= base_url('admin/perusahaan/detail') ?>/'+data+'"><i class="bi bi-person-fill"></i> Lihat Detail Perusahaan</a>'      
                    }
                },
                {
                    data: 'user_id',
                    "render": function (data) {
                        let cetak = `
                                      <a class="btn btn-sm btn-primary m-1" href="<?= base_url('admin/perusahaan/edit') ?>/`+data+`"><i class="bi bi-person-fill-gear"></i> Edit Profil</a>
                                      <a class="btn btn-sm btn-warning m-1 disabled" href="<?= base_url('admin/perusahaan/ban') ?>/`+data+`"><i class="bi bi-person-fill-exclamation"></i> Ban perusahaan</a> 
                                      <a class="btn btn-sm btn-danger m-1 disabled" href="<?= base_url('admin/perusahaan/delete') ?>/`+data+`"><i class="bi bi-person-dash-fill"></i> Hapus perusahaan</a>
                                    `;
                        return cetak;
                    }
                },
          ]
      });
    </script>
  <?= $this->endSection() ?>