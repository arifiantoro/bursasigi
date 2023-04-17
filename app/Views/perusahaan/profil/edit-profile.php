<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data Perusahaan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/perusahaan') ?>">Perusahaan</a></li>
                <li class="breadcrumb-item active">edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">

                        <form method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>


                            <div class="card-title">Form Biodata Perusahaan</div>

                            <!-- <div class="row py-2">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="firstname" placeholder="Nama Depan">
                                        <label for="floatingName">Nama Depan Penanggung Jawab</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating ">
                                        <input type="text" name="lastname" class="form-control " id="lastname" placeholder="Your Name">
                                        <label for="floatingName">Nama Belakang Penanggung Jawab</label>
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-floating">
                                <input type="text" name="perusahaan" class="form-control " id="perusahaan" placeholder="Nama Perusahaan" value="<?= dekripsi($perusahaan->nama_perusahaan) ?>">
                                <label for="nama">Nama Perusahaan</label>
                            </div>

                            <div class="py-2">
                                <div class="form-floating ">
                                    <input type="text" name="perusahaan" class="form-control " id="bidang" placeholder="Bidang Usaha" value="<?= dekripsi($perusahaan->bidang_usaha) ?>">
                                    <label for="bidang">Bidang Usaha</label>
                                </div>
                            </div>


                            <div class="form-floating mt-2">
                                <input type="text" name="kota" class="form-control " id="kota" placeholder="Kota Domisili" value="<?= dekripsi($perusahaan->kota) ?>">
                                <label for="kota">Kota Domisili</label>
                            </div>

                            <div class="form-floating mt-2">
                                <input type="text" name="telepon" class="form-control " id="telepon" placeholder="Telepon" value="<?= $perusahaan->telepon ?>">
                                <label for="telepon">Telepon</label>
                            </div>

                            <div class="py-2">
                                <div class="form-floating">
                                    <textarea id="alamat" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"> <?= dekripsi($perusahaan->alamat_perusahaan) ?></textarea>
                                    <label for="floatingTextarea">Alamat perusahaan</label>

                                </div>
                            </div>

                            <div class="py-2">
                                <label for="Deskripsi">Deskripsi perusahaan</label>
                                <div id="editDeskripsi"><?= dekripsi($perusahaan->deskripsi_usaha) ?></div>
                            </div>

                            <button type="button" onclick="saving()" class="my-2 w-20 btn btn-primary"><i class="bi bi-save"></i> Edit</button>
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
    var quill = new Quill('#editDeskripsi', {
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
        placeholder: 'Tentang Perusahaan',
        theme: 'snow' // or 'bubble'
    });
</script>

<script>
    function saving() {
        let token = document.querySelector('[name=X-CSRF-TOKEN]').getAttribute('content');
        var jenis;
        var deskripsi = document.getElementById('editDeskripsi').children[0].innerHTML;
        // var tentang = document.getElementById('editKeahlian').children[0].innerHTML;

        // console.log(deskripsi);

        $.ajax({
            url: '<?= base_url('/perusahaan/profil/update') ?>',
            method: 'POST',
            data: {
                csrf_test_name: token,
                nama_perusahaan: document.getElementById('perusahaan').value,
                kota: document.getElementById('kota').value,
                alamat: document.getElementById('alamat').value,
                bidangusaha: document.getElementById('bidang').value,
                telepon: document.getElementById('telepon').value,
                deskripsis: deskripsi,
            },
            success: function(response) {
                console.log(response)
                swal.fire(
                    'Berhasil',
                    'Data Telah Diupdate',
                    'success'
                )
                location.href = '<?= base_url('/perusahaan/view') ?>'
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