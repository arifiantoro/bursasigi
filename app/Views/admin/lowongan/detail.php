<main id="main" class="main">

    <div class="card-title p-3">
        <h1 class="h4 fw-bold" style="line-height:0pt;">Info Kandidat</h1>
        <span>Informasi Calon Kandidat</span>
    </div>

    <div class="card card-shadow bg-white py-3">

        <div class="card-title px-3">

            <div class="row align-items-center justify-content-center">
                <div class="col-8">
                    <h5 class="card-title">Kandidat Saat Ini: </h5>
                </div>
                <div class="col-4 text-end">
                    <button class="btn btn-sm btn-primary" onclick="location.href='<?= base_url('admin/lowongan/panggil') ?>'"><i class="bi bi-people-fill"></i> Panggil Interview</button>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-stripped" id="tabledet">
                <thead class="table-header table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>Kompetensi</th>
                        <th>Pendidikan</th>
                        <th>Usia</th>
                        <th>Portofolio</th>
                        <th>Hasil Psikotes</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>

<?= $this->section('customScript') ?>
<script>
    var table = $('#tabledet').DataTable({
        responsive: true,
        "processing": true,
        "ajax": {
            'url': '<?= base_url('admin/loker/details/get/' . $id) ?>',
            'dataSrc': ''
        },
        'columns': [{
                "data": "no"
            },

            {
                "data": "firstname"
            },
            {
                "data": "pekerjaan_dicari"

            },
            {
                "data": "pendidikan",
            },
            {
                "data": "usia",
            },
            {
                data: 'id_pencari',
                "render": function(data) {
                    return '<a class="btn btn-sm btn-primary" href="<?= base_url('admin/member/detail') ?>/' + data + '"><i class="bi bi-eye"></i> Lihat</a>'
                }
            },
            {
                data: 'id_pencari',
                "render": function(data) {
                    return '<a class="btn btn-sm btn-primary" href="<?= base_url('admin/member/detail') ?>/' + data + '"><i class="bi bi-eye"></i> Lihat</a>'
                }
            },
        ]
    });
    console.log(table);
</script>
<?= $this->endSection() ?>