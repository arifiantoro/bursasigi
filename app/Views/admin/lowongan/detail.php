<main id="main" class="main">

    <div class="card-title p-3">
        <h1 class="h4 fw-bold" style="line-height:0pt;">Info Kandidat</h1>
        <span>Informasi Calon Kandidat</span>
    </div>

    <div class="card card-shadow bg-white py-3">
        <div class="card-title px-3">
            Kandidat Saat Ini:
        </div>
        <div class="card-body">
            <table class="table table-stripped" id="tabledet">
                <thead class="table-header table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>Kompetensi</th>
                        <th>Pendidikan</th>
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

        ]
    });
    console.log(table);
</script>
<?= $this->endSection() ?>