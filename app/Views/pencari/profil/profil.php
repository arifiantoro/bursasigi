<main class="p-3">
    <div class="card-title h3" style="color:#FF6600">
        <h2>Form Biodata Member</h2>
    </div>
    <form method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <span>Biodata Profil Untuk Mengenalkan Diri Anda Ke Perusahaan</span>

        <div class="form-floating ">
            <input type="text" name="nik" class="form-control " id="nik" placeholder="NIK" value="<?= dekripsi($profil->NIK) ?>">
            <label for="nik">NIK</label>
        </div>

        <div class="row py-2">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="firstname" placeholder="Nama Depan">
                    <label for="floatingName">Nama Depan</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating ">
                    <input type="text" name="lastname" class="form-control " id="lastname" placeholder="Your Name">
                    <label for="floatingName">Nama Belakang</label>
                </div>
            </div>
        </div>

        <div class="form-floating my-2">
            <input type="date" name="tanggalLahir" class="form-control " id="ttl" placeholder="Tanggal Lahir" value="<?= $profil->tanggal_lahir ?>">
            <label for="ttl">Tanggal Lahir</label>
        </div>

        <span class="mt-2 h6">&nbsp;Jenis Kelamin Member</span> <br>
        <div class="d-flex flex-row my-2">
            <div class="form-check mx-2 my-2">
                <input class="form-check-input" type="radio" name="ijk" id="ijk1">
                <label class="form-check-label h6" for="ijk1">
                    Laki - Laki
                </label>
            </div>
            <div class="form-check mx-2 my-2">
                <input class="form-check-input" type="radio" name="ijk" id="ijk2">
                <label class="form-check-label h6" for="ijk2">
                    Perempuan
                </label>
            </div>
        </div>

        <div class="form-floating mt-2">
            <input type="text" name="kota" class="form-control " id="kota" placeholder="Kota Domisili" value="<?= dekripsi($profil->kota_tinggal) ?>">
            <label for="kota">Kota Domisili</label>
        </div>

        <div class="py-2">
            <div class="form-floating">
                <textarea id="alamat" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"><?= dekripsi($profil->alamat_member) ?></textarea>
                <label for="floatingTextarea">Alamat Member</label>
            </div>
        </div>

        <div class="py-2">
            <div class="form-floating">
                <select class="form-select" placeholder="selection" id="pendidikan">
                    <option value="" disabled selected>Pendidikan </option>
                    <?php foreach ($pendidikan as $p => $pendidikan) : ?>
                        <option value="<?= $pendidikan->id ?>"><?= $pendidikan->nama_pendidikan ?></option>
                    <?php endforeach ?>
                </select>
                <label for="floatingTextarea">Pendidikan Terakhir</label>
            </div>
        </div>

        <div class="py-2">
            <label for="Deskripsi">Deskripsi Member</label>
            <div id="editDeskripsi"><?= dekripsi($profil->deskripsi_member) ?></div>
        </div>

        <div class="py-2 mt-1">
            <label for="Keahlian">Keahlian Member</label>
            <div id="editKeahlian"><?= dekripsi($profil->keahlian_member) ?></div>
        </div>
        <button type="button" onclick="saving()" class="my-2 w-20 btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
    </form>
    </div>

</main>
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
        placeholder: 'Detail Lowongan Pekerjaan',
        theme: 'snow' // or 'bubble'
    });
</script>

<script>
    var quill = new Quill('#editKeahlian', {
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
    function saving() {
        let csrfTokenElement = document.querySelector('[name=X-CSRF-TOKEN]');
        let token = csrfTokenElement ? csrfTokenElement.getAttribute('content') : null;

        var jenis;
        var deskripsi = document.getElementById('editDeskripsi').children[0].innerHTML;
        var tentang = document.getElementById('editKeahlian').children[0].innerHTML;

        console.log(deskripsi);

        $.ajax({
            url: '<?= base_url('/profile/editPeserta') ?>',
            method: 'POST',
            data: {
                csrf_test_name: token,
                nik: document.getElementById('nik').value,
                ttl: document.getElementById('ttl').value,
                kota_domisili: document.getElementById('kota').value,
                deskripsis: deskripsi,
                keahlian: tentang,
            },
            success: function(response) {
                console.log(response)
                swal.fire(
                    'Berhasil',
                    'Profil Telah Diubah',
                    'success'
                )
                location.href = '<?= base_url('/member') ?>'
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

</div>
</div>