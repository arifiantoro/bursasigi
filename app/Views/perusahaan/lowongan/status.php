<main id="main" class="main">

    <div class="pagetitle">
        <h1>Status Lowongan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/perusahaan') ?>">Administrator</a></li>
                <li class="breadcrumb-item active">Status Lowongan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <div class="card-title">Status Lowongan </div>
                        <table class="table table-stripped my-1" id="tablelow">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>No</th>
                                    <!-- <th>Nama Lowongan</th> -->
                                    <th>Posisi</th>
                                    <th>Status</th>
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
    var table = $('#tablelow').DataTable({
        responsive: true,
        "processing": true,
        "ajax": {
            'url': '<?= base_url('/perusahaan/status/get') ?>',
            'dataSrc': ''
        },
        'columns': [{
                "data": "no"
            },
            // {
            //     "data": "id_perusahaan"
            // },
            {
                "data": "posisi"
            },
            {
                "data": "tanggal_ditutup",
                "render": function(data) {
                    var today = new Date();
                    var tanggal_ditutup = new Date(data);
                    if (tanggal_ditutup <= today) {
                        return '<a class="btn btn-sm btn-danger disabled" href="<?= base_url('/perusahaan') ?>/' + data + '"><i class="bi bi-person-fill"></i> Ditutup</a>';
                    } else {
                        return '<a class="btn btn-sm btn-primary disabled" href="<?= base_url('/perusahaan') ?>/' + data + '"><i class="bi bi-person-fill"></i> Dibuka</a>';
                    }
                }
            },
            {
                data: 'id_perusahaan',
                "render": function(data) {
                    let cetak = `
                                      <a class="btn btn-sm btn-primary m-1 disabled" href="<?= base_url('admin/perusahaan/edit') ?>/` + data + `"><i class="bi bi-person-fill-gear"></i> Edit Lowongan</a>
                                     
                                      <a class="btn btn-sm btn-danger m-1 disabled" href="<?= base_url('admin/perusahaan/delete') ?>/` + data + `"><i class="bi bi-person-dash-fill"></i> Hapus Lowongan</a>
                                    `;
                    return cetak;
                }
            },
        ]
    });
    console.log(table);
</script>
<?= $this->endSection() ?>