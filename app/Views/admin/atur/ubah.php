<main id="main" class="main">
    
    <div class="card-title p-3">
        <h1 class="h4 fw-bold" style="line-height:0pt;">Ubah Password</h1>
        <span>Halaman Khusus Untuk Mengubah Password Anda</span>
    </div>

    <div class="card card-shadow bg-white py-3">
        <div class="card-title px-3">
            Input Password Lama & Masukan Password Baru Anda:
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/atur/ubah-post') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                 <input type="hidden" name="email" value="<?= user()->email ?>">
                <div class="form-floating">
                    <input type="password" name="password" class="form-control " id="oldPass" placeholder="Password Lama" required>
                    <label for="oldPass">Password Lama</label>
                </div>
                
                <div class="mt-2">
                    <div class="form-floating">
                        <input type="password" name="newPass" class="form-control" id="newPass" placeholder="Password Baru" required>
                        <label for="newPass">Password Baru</label>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="form-floating">
                        <input type="password" name="newPass2" class="form-control" id="newPass" placeholder="Ketikan Ulang Password Baru" required>
                        <label for="newPass">Ketikan Ulang Password Baru</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-cloud"></i> Ubah Password</button>
            </form>
        </div>
    </div>
</main>

<?= $this->section('customScript') ?>
    <script>
        $('#tablekan').DataTable();
    </script>
    <?php if(!empty($_SESSION['error'])): ?>
        <script>
            swal.fire(
                'Error',
                '<?= $_SESSION['error'] ?>',
                'error'
            );
        </script>
    <?php endif ?>

    <?php if(!empty($_SESSION['pesan'])): ?>
        <script>
            swal.fire(
                'Berhasil',
                '<?= $_SESSION['pesan'] ?>',
                'success'
            );
        </script>
    <?php endif ?>
<?= $this->endSection() ?>