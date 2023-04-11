<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Jadwal Psikotest</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
          <li class="breadcrumb-item">Jadwal Psikotest</li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto p-3" id="formBody">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="card-title">Tambah Jadwal Psikotest</h2>
                    </div>
                    <div class="col-md-4 text-end">
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/jadwaltest') ?>"><i class="bi bi-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                
                <form action="<?=  base_url('admin/jadwaltest/post') ?>" method="post">
                    <?= csrf_field() ?>
                    <label for="pencari">Pencari Kerja</label>
                    <select name="iPencari" id="pencari" class="form-select"></select>
                    
                    <label for="Jadwalnya" class="mt-3">Buat Jadwal Psikotest</label>
                    <input type="date" name="iJadwal" id="jadwal" class="form-control">
                    
                    <button type="submit" class="btn btn-primary btn-sm mt-3" >Buat Jadwal Psikotest</button>
                </form>
                </div>
            </div>
        </div><!-- End Top Selling -->
    </section>

  </main><!-- End #main -->
  <?= $this->section('customScript') ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
       $('#pencari').select2({
            placeholder: 'Pilih Member' ,
            // dropdownParent: $('#main'),
            ajax: {
                delay: 250,
                url: '<?= base_url('admin/jadwaltest/peserta') ?>',
                dataType : "json",
                processResults: function (data) {
                // console.log(data)
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data.results
                };
                }
            },
            cache: true
        })
    </script>
  <?= $this->endSection() ?>