<main id="main" class="main">

    <div class="pagetitle">
      <h1>Jadwal Psikotest</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
          <li class="breadcrumb-item active">Jadwal Psikotest</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto p-3">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="card-title">Jadwal Member Psikotest</h2>
                    </div>
                    <div class="col-md-4 text-end">
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/jadwaltest/tambah') ?>">Tambah Jadwal Psikotest Member</a>
                    </div>
                </div>
                
                 <table class="table table-stripped" id="tablekan">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jadwal Psikotest</th>
                            <th>Upload Hasil</th>
                            <th>Lainnya</th>
                        </tr>
                    </thead>
                 </table>
                </div>
            </div>
        </div><!-- End Top Selling -->
    </section>

    <!-- Modal Psikotest -->
    <div class="modal fade" id="psikotest" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">Input Hasil Psikotest</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/jadwaltest/piskopost') ?>" method="post" enctype="multipart/form-data">
              <?= csrf_field() ?>
              <input type="hidden" name="userId" id="userid">

              <label for="">Nilai Kognitif (IQ)</label>
              <input type="text" name="iKogni" id="kogni" class="form-control">
              <label for="">Nilai Emosional (ESQ)</label>
              <input type="text" name="iEmosi" id="emosi" class="form-control">
              
              <div class="mb-3">
                <label for="" class="form-label">Sertifikat Psikotest</label>
                <input type="file" class="form-control" name="lampiran" id="psikotest" placeholder="" aria-describedby="fileHelpId">
                <div id="fileHelpId" class="form-text">Lampiran</div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal Ubah Jadwal -->
    <div class="modal fade" id="jadwal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">Ubah Jadwal</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/jadwaltest/piskoput') ?>" method="post">
              <?= csrf_field() ?>
              <input type="hidden" name="userId" id="userid2">

              <label for="">Jadwal Psikotest Baru</label>
              <input type="date" name="ijadwal" id="jadwal" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    
    <!-- Optional: Place to the bottom of scripts -->
    <!-- <script>
      const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    
    </script> -->

  </main><!-- End #main -->
  <?= $this->section('customScript') ?>
     <script>
          let table = $('#tablekan').DataTable({
              responsive: true, 
              "processing": true,
              "ajax": {
                'url': '<?= base_url('admin/jadwaltest/get') ?>',
                'dataSrc': ''
               },
              "columns": [
                  {"data": "no"},
                  {"data": "nama_lengkap"},
                  {"data": "jadwal_test"},
                  {"data": "user_id",
                      "render": function (data, type, row){
                        if(row['bukti'] == "" || row['bukti'] == null || row['bukti'] == undefined ){
                          return `    <button onclick="setUser(`+data+`)" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#psikotest">
                                        Input Hasil Uji
                                      </button>`;
                        }else{
                          return `<a href="<?= base_url('admin/jadwaltest/cetak') ?>/`+row['user_id']+`" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Unduh Psikotest</a>`;
                        }
                      }
                  },
                  {"data": "user_id",
                      "render": function (data){
                        return `<button onclick="setUser(`+data+`)" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#jadwal">
                                      Ubah Jadwal Psikotest
                                    </button>`;
                      }
                  },

              ]
          });
     </script>
     <script>
        <?php if(!empty($_SESSION['pesan'])): ?>
            swal.fire(
              'Sukses',
              '<?= $_SESSION['pesan'] ?>',
              'success'
            )
        <?php endif ?>
    </script>

    <script>
      function setUser(id)
      {
        console.log(id)
          document.getElementById('userid').setAttribute('value', id);
          document.getElementById('userid2').setAttribute('value', id);
      }
    </script>
  <?= $this->endSection() ?>