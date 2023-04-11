<main id="main" class="main">
    
    <div class="card-title p-3">
        <h1 class="h4 fw-bold" style="line-height:0pt;">Atur Profil Administrator</h1>
        <span>Halaman Mengganti Profil Administrator</span>
    </div>

    <div class="card card-shadow bg-white py-3">
        <div class="card-title px-3">
            Profil Anda:
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/atur/ubahdiri') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="firstname" class="form-control " id="Nama Depan" placeholder="Nama Depan" required>
                            <label for="oldPass">Nama Depan</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="firstname" class="form-control " id="Nama Depan" placeholder="Nama Depan" required>
                            <label for="oldPass">Nama Belakang</label>
                        </div>
                    </div>
                </div>
                <!-- <div class="mb-3">
                  <label for="" class="form-label">Choose file</label>
                  <input type="file" class="form-control" name="" id="" placeholder="" aria-describedby="fileHelpId">
                  <div id="fileHelpId" class="form-text">Help text</div>
                </div> -->

                <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-save"></i> Ubah Profil</button>
            </form>
        </div>
    </div>
</main>

<?= $this->section('customScript') ?>
    <script>
        $('#tablekan').DataTable();
    </script>
<?= $this->endSection() ?>