<main id="main" class="main">

    <div class="card-title p-3">
        <h1 class="h4 fw-bold" style="line-height:0pt;">Info Loker</h1>
        <span>Infromasi Lowongan Kerja Yang di Posting Oleh Perusahaan</span>
    </div>

    <div class="card card-shadow bg-white py-3">
        <div class="card-title px-3">
            Lowongan Saat Ini:
        </div>
        <div class="card-body">
            <table class="table table-stripped" id="tablelow">
                <thead class="table-header table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Bagian Yang Dibutuhkan</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>

<?= $this->section('customScript') ?>
<script>
    var table = $('#tablelow').DataTable({
        responsive: true,
        "processing": true,
        "ajax": {
            'url': '<?= base_url('admin/permintaanl/get') ?>',
            'dataSrc': ''
        },
        'columns': [{
                "data": "no"
            },

            {
                "data": "nama_perusahaan"
            },
            {
                "data": "posisi"

            },
            {
                "data": "tanggal_ditutup",
                "render": function(data) {
                    var today = new Date();
                    var tanggal_ditutup = new Date(data);
                    if (tanggal_ditutup <= today) {
                        return '<a class="btn btn-sm btn-danger disabled" href="<?= base_url('#') ?>/' + data + '"><i class="bi bi-person-fill"></i> Ditutup</a>';
                    } else {
                        return '<a class="btn btn-sm btn-primary" href="<?= base_url('/perusahaan') ?>/' + data + '"><i class="bi bi-person-fill"></i> Dibuka</a>';
                    }
                }
            },
            {
                data: 'id_low',
                "render": function(data) {
                    return '<a class="btn btn-sm btn-primary" href="<?= base_url('admin/lowongan/detail') ?>/' + data + '"><i class="bi bi-eye"></i> Lihat Kandidat</a>'
                }
            },
        ]
    });
    console.log(table);
</script>
<?= $this->endSection() ?>