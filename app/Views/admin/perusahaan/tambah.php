<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah perusahaan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
                <li class="breadcrumb-item active">perusahaan</li>
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
                        <div class="card-title">Form User perusahaan </div>
                        <form method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="form-row g-3">

                                <div class="form-floating">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                    <label for="username">Username</label>
                                </div>

                                <div class="form-floating mt-2">
                                    <input type="email" name="email" class="form-control " id="email" placeholder="Email perusahaan">
                                    <label for="email">Email perusahaan</label>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-floating ">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                            <label for="Password">Password perusahaan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating ">
                                            <input type="password" name="pass_confirm" id="passconf" class="form-control" placeholder="Re-enter Password">
                                            <label for="Password C">Confirm Password perusahaan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-title">Form Biodata Perusahaan</div>

                            <div class="form-floating my-2">
                                <input type="text" name="perusahaan" class="form-control " id="perusahaan" placeholder="Nama Perusahaan">
                                <label for="nik">Nama Perusahaan</label>
                            </div>

                            <div class="row py-2">
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
                            </div>

                            <div class="form-floating my-2">
                                <input type="text" name="perusahaan" class="form-control " id="bidang" placeholder="Nama Perusahaan">
                                <label for="bidus">Bidang Usaha</label>
                            </div>

                            <div class="form-floating my-2">
                                <input type="text" name="telppj" class="form-control " id="ttl" placeholder="Telepon Penanggung Jawab">
                                <label for="telppj">Telepon Penanggung Jawab</label>
                            </div>

                            <div class="form-floating my-2">
                                <input type="text" name="telepon" class="form-control " id="telepon" placeholder="Telepon Perusahaan">
                                <label for="telepon">Telepon Perusahaan</label>
                            </div>


                            <div class="form-floating mt-2">
                                <input type="text" name="kota" class="form-control " id="kota" placeholder="Kota Domisili">
                                <label for="kota">Kota Domisili</label>
                            </div>

                            <div class="py-2">
                                <div class="form-floating">
                                    <textarea id="alamat" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                                    <label for="floatingTextarea">Alamat perusahaan</label>
                                </div>
                            </div>

                            <div class="py-2">
                                <label for="Deskripsi">Deskripsi perusahaan</label>
                                <div id="editDeskripsi"></div>
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
        placeholder: 'Tentang Kamu',
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
            url: '<?= base_url('/admin/perusahaan/tambah/post') ?>',
            method: 'POST',
            data: {
                csrf_test_name: token,
                username: document.getElementById('username').value,
                email: document.getElementById('email').value,
                firstname: document.getElementById('firstname').value,
                lastname: document.getElementById('lastname').value,
                password: document.getElementById('password').value,
                pass_confirm: document.getElementById('passconf').value,
                nama_perusahaan: document.getElementById('perusahaan').value,
                kota: document.getElementById('kota').value,
                alamat: document.getElementById('alamat').value,
                bidangusaha: document.getElementById('bidang').value,
                deskripsis: deskripsi,
            },
            success: function(response) {
                console.log(response)
                swal.fire(
                    'Berhasil',
                    'perusahaan Baru Telah Dibuat',
                    'success'
                )
                location.href = '<?= base_url('/admin/perusahaan') ?>'
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