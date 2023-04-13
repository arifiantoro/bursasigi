<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Peserta</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
                <li class="breadcrumb-item active">Peserta</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <div class="card-title">Form User Peserta </div>
                        <form method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-row g-3">

                                <div class="form-floating">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                    <label for="username">Username</label>
                                </div>

                                <div class="form-floating mt-2">
                                    <input type="email" name="nik" class="form-control " id="email" placeholder="Email Member">
                                    <label for="email">Email Peserta</label>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-floating ">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                            <label for="Password">Password Peserta</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating ">
                                            <input type="password" name="pass_confirm" id="passconf" class="form-control" placeholder="Re-enter Password">
                                            <label for="Password C">Confirm Password Peserta</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-title">Form Biodata Peserta</div>

                            <div class="form-floating ">
                                <input type="text" name="nik" class="form-control " id="nik" placeholder="NIK">
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
                                <input type="date" name="tanggalLahir" class="form-control " id="ttl" placeholder="Tanggal Lahir">
                                <label for="ttl">Tanggal Lahir</label>
                            </div>

                            <span class="mt-2 h6">&nbsp;Jenis Kelamin Peserta</span> <br>
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
                                <input type="text" name="kota" class="form-control " id="kota" placeholder="Kota Domisili">
                                <label for="kota">Kota Domisili</label>
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" name="pekerjaan_dicari" class="form-control " id="pekerjaan_dicari" placeholder="Pekerjaan Dicari" value="">
                                <label for="pekerjaan_dicari">Pekerjaan Dicari</label>
                            </div>

                            <div class="py-2">
                                <div class="form-floating">
                                    <textarea id="alamat" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                                    <label for="floatingTextarea">Alamat Peserta</label>
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
                                <label for="Deskripsi">Deskripsi Peserta</label>
                                <div id="editDeskripsi"></div>
                            </div>

                            <div class="py-2 mt-1">
                                <label for="Keahlian">Keahlian Peserta</label>
                                <div id="editKeahlian"></div>
                            </div>
                            <div class="py-2">
                                <label for="floatingTextarea">Pas Foto</label>
                                <input type="file" name="pasfoto" class="form-control " id="pasfoto" accept="image/jpeg,image/png" value="">
                            </div>
                            <div class="mt-2">
                                <label for="tags">Tags</label>
                                <input type="text" name="tags" class="form-control " id="tags" placeholder="Tags">
                            </div>
                            <button type="button" onclick="saving()" class="my-2 w-20 btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
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
        placeholder: 'Tentang Peserta',
        theme: 'snow' // or 'bubble'
    });

    var keahlian = new Quill('#editKeahlian', {
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
        theme: 'snow'
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
        var deskripsi = document.getElementById('editDeskripsi').children[0].innerHTML;
        var tentang = document.getElementById('editKeahlian').children[0].innerHTML;
        if (document.getElementById('ijk1').checked == true) {
            var jenis = 'Laki - Laki';
        } else {
            var jenis = 'Peremuan';
        }
        // console.log(deskripsi);

        $.ajax({
            url: '<?= base_url('/admin/member/tambah/post') ?>',
            method: 'POST',
            data: {
                csrf_test_name: token,
                username: document.getElementById('username').value,
                email: document.getElementById('email').value,
                firstname: document.getElementById('firstname').value,
                lastname: document.getElementById('lastname').value,
                password: document.getElementById('password').value,
                pass_confirm: document.getElementById('passconf').value,
                nik: document.getElementById('nik').value,
                tanggallahir: document.getElementById('ttl').value,
                kota: document.getElementById('kota').value,
                alamat: document.getElementById('alamat').value,
                pendidikan: document.getElementById('pendidikan').value,
                jenisK: jenis,
                deskripsis: deskripsi,
                keahlians: tentang,
            },

            success: function(response) {
                console.log(response)
                if (response == 200) {
                    swal.fire(
                        'Berhasil',
                        'Member Baru Telah Dibuat',
                        'success'
                    )
                } else {
                    swal.fire(
                        'Gagal Melakukan Process',
                        'Error: ' + response,
                        'error'
                    )
                }
                location.href = '<?= base_url('/admin/member') ?>'
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