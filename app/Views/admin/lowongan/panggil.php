<main id="main" class="main">

    <div class="card-title p-3">
        <h1 class="h4 fw-bold" style="line-height:0pt;">Pemanggilan Wawancara</h1>
        <span>Informasi Pemanggilan Diposting Oleh Perusahaan</span>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto p-3" id="formBody">


                    <form action="<?= base_url('admin/panggil/post') ?>" method="post">
                        <?= csrf_field() ?>
                        <label for="lowong">Lowongan Kerja</label>
                        <select name="iLowong" id="lowong" class="form-select"></select>

                        <label for="Jadwalnya" class="mt-3">Jadwal Wawancara</label>
                        <input type="date" name="jJadwal" id="jadwal" class="form-control">

                        <label for="lokasi" class="mt-3">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" placeholder="Lokasi Wawancara" class="form-control">

                        <label for="undangan" class="mt-3">Undangan:</label>
                        <input type="file" id="undangan" name="undangan" placeholder="" class="form-control">

                        <div class="mt-4 text-end">
                            <button class="btn btn-sm btn-primary" onclick="location.href='<?= base_url('#') ?>'"><i class="bi bi-file-earmark-text-fill"></i> Download Format Undangan Wawancara</button>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm mt-3">Buat Panggilan</button>
                    </form>
                </div>
            </div>
        </div><!-- End Top Selling -->
    </section>
</main>

<?= $this->section('customScript') ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#lowong').select2({
        placeholder: 'Pilih Lowongan',
        // dropdownParent: $('#main'),
        ajax: {
            delay: 250,
            url: '<?= base_url('admin/lowongan/panggil/post') ?>',
            dataType: "json",
            processResults: function(data) {
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