<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Lowongan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/Perusahaan') ?>">Perusahaan</a></li>
                <li class="breadcrumb-item active">Tambah Lowongan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <div class="card-title">Tambah Lowongan Pekerjaan </div>
                        <form method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-floating ">
                                <input type="hidden" name="id_perusahaan" class="form-control " id="id_perusahaan" placeholder="Nama Perusahaan" value="<?= $id = user()->id; ?>">
                                <label for="id_perusahaan">Nama Perusahaan</label>
                            </div>

                            <div class="form-floating mt-2">
                                <input type="text" name="perusahaan" class="form-control " id="posisi" placeholder="Nama Perusahaan">
                                <label for="posisi">Posisi</label>
                            </div>

                            <div class="row py-2">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="tanggal_dibuka" placeholder="Tanggal Dibuka">
                                        <label for="floatingName">Tanggal Dibuka</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating ">
                                        <input type="date" class="form-control " id="tanggal_ditutup" placeholder="Tanggal Ditutup">
                                        <label for="floatingName">Tanggal Ditutup</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mt-2">
                                <input type="text" name="kota_domisili" class="form-control " id="kota_domisili" placeholder="Kota Domisili">
                                <label for="kota_domisili">Kota Domisili</label>
                            </div>

                            <div class="py-2">
                                <label for="deskripsi_lowongan">Deskripsi Lowongan</label>
                                <div id="editDeskripsiLowongan"></div>
                            </div>

                            <div class="mt-2">
                                <label for="tags">Tags</label>
                                <input type="text" name="tags" class="form-control " id="tags" placeholder="Tags">
                            </div>

                            <button type="button" onclick="saving()" class="my-2 w-20 btn btn-primary"><i class="bi bi-save"></i> Tambah</button>
                        </form>
                    </div>
                </div>
            </div><!-- End Top Selling -->

        </div>

        </div>
    </section>

</main><!-- End #main -->
<?= $this->section('customScript') ?>

<script>
    var quill = new Quill('#editDeskripsiLowongan', {
        modules: {
            toolbar: [
                [{
                    header: [1, 2, false]
                }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }]
            ]
        },
        placeholder: 'Detail Lowongan Pekerjaan',
        theme: 'snow' // or 'bubble'
    });
</script>

<script>
    var input = document.querySelector('input[name=tags]')
    var tagify = new Tagify(input, {
        dropdown: {
            maxItems: 0,
            enabled: 0
        },
        whitelist: ["a", "aa", "aaa", "b", "bb", "ccc"]
    })

    tagify.on('change', console.log)

    tagify.addTags(["Admin", "Teknisi"])
</script>

<script>
    function saving() {
        let token = document.querySelector('[name=X-CSRF-TOKEN]').getAttribute('content');
        var jenis;
        var deskripsi_lowongan = document.getElementById('editDeskripsiLowongan').children[0].innerHTML;
        // var tentang = document.getElementById('editKeahlian').children[0].innerHTML;

        // console.log(deskripsi_lowongan);

        $.ajax({
            url: '<?= base_url('perusahaan/tambahlowongan/post') ?>',
            method: 'POST',
            data: {
                csrf_test_name: token,
                id_perusahaan: document.getElementById('id_perusahaan').value,
                posisi: document.getElementById('posisi').value,
                tanggal_dibuka: document.getElementById('tanggal_dibuka').value,
                tanggal_ditutup: document.getElementById('tanggal_ditutup').value,
                kota_domisili: document.getElementById('kota_domisili').value,
                deskripsis: deskripsi_lowongan,
                tags: document.getElementById('tags').value,
            },
            success: function(response) {
                console.log(response)
                swal.fire(
                    'Berhasil',
                    'Lowongan Baru Telah Dibuat',
                    'success'
                )
                location.href = '<?= base_url('/perusahaan/tambahlowongan') ?>'
            },

            error: function(XMLHttpRequest, textStatus, errorThrown) {
                swal.fire(
                    'Gagal Melakukan Process',
                    'Error: ' + errorThrown,
                    'error'
                )
            }

        })
    }
</script>
<?= $this->endSection() ?>