<main class="p-3">
    <div class="card-title h3" style="color:#FF6600">
        <h2>Lengkapi Biodata</h2>
    </div>
    <form method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <span>Biodata Profil Untuk Mengenalkan Diri Ke Perusahaan</span>

        <div class="form-floating ">
            <input type="text" name="nik" class="form-control " id="nik" placeholder="NIK" value="">
            <label for="nik">NIK</label>
        </div>

        <!-- <div class="row py-2">
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
        </div> -->

        <div class="form-floating my-2">
            <input type="date" name="tanggalLahir" class="form-control " id="tanggallahir" placeholder="Tanggal Lahir" value="">
            <label for="ttl">Tanggal Lahir</label>
        </div>

        <span class="mt-2 h6">&nbsp;Jenis Kelamin</span> <br>
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

        <div class="form-floating my-2">
            <input type="text" name="telppen" class="form-control " id="telppen" placeholder="Telepon Perusahaan">
            <label for="telppen">Telepon</label>
        </div>

        <div class="form-floating mt-2">
            <input type="text" name="kota" class="form-control " id="kota" placeholder="Kota Domisili" value="">
            <label for="kota">Kota Domisili</label>
        </div>

        <div class="py-2">
            <div class="form-floating">
                <textarea id="alamat" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                <label for="floatingTextarea">Alamat</label>
            </div>
        </div>

        <div class="py-2">
            <div class="form-floating">
                <select class="form-select" placeholder="selection" id="pendidikan">
                    <option value="" disabled selected>Pendidikan </option>
                    <?php foreach ($pendidikan as $p => $pendidikan) : ?>
                        <option value=""><?= $pendidikan->nama_pendidikan ?></option>
                    <?php endforeach ?>
                </select>
                <label for="floatingTextarea">Pendidikan Terakhir</label>
            </div>
        </div>

        <div class="py-2">
            <label for="Deskripsi">Deskripsi</label>
            <div id="editDeskripsi"></div>
        </div>

        <div class="py-2 mt-1">
            <label for="Keahlian">Keahlian</label>
            <div id="editKeahlian"></div>
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
        placeholder: 'Deskripsi diri',
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
        placeholder: 'Keahlian Peserta',
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
        if (document.getElementById('ijk1').checked == true) {
            var jenis = 'Laki - Laki';
        } else {
            var jenis = 'Perempuan';
        }

        // console.log(deskripsi);

        $.ajax({
            url: '<?= base_url('/Member/profile/addPeserta') ?>',
            method: 'POST',
            data: {
                csrf_test_name: token,
                // id: document.getElementById('id').value,
                // firstname: document.getElementById('firstname').value,
                // lastname: document.getElementById('lastname').value,
                nik: document.getElementById('nik').value,
                tanggallahir: document.getElementById('tanggallahir').value,
                kota: document.getElementById('kota').value,
                telppen: document.getElementById('telppen').value,
                alamat: document.getElementById('alamat').value,
                jenisK: jenis,
                deskripsis: deskripsi,
                keahlian: tentang,
                pendidikan: document.getElementById('pendidikan').value,
            },
            success: function(response) {
                console.log(response)
                if (response == 200) {
                    swal.fire(
                        'Berhasil',
                        'Profil Telah Diperbarui',
                        'success'
                    )
                } else {
                    swal.fire(
                        'Gagal Melakukan Process',
                        'Error: ' + response,
                        'error'
                    )
                }
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