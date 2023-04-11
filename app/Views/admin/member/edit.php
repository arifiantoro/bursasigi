<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Member</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
          <li class="breadcrumb-item active">Member</li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                        <div class="card-title">Form Biodata Member</div>
                            
                            <div class="form-floating ">
                                    <input type="text" name="nik" class="form-control " id="nik" placeholder="NIK" value="<?= $member->NIK ?>">
                                    <label for="nik">NIK</label>
                            </div>
                            
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="firstname" placeholder="Nama Depan" value="<?= $member->firstname ?>">
                                        <label for="floatingName">Nama Depan</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating ">
                                        <input type="text" name="lastname" class="form-control " id="lastname" placeholder="Your Name" value="<?= $member->lastname ?>">
                                        <label for="floatingName">Nama Belakang</label>
                                    </div>
                                </div>
                            </div>

                                <div class="form-floating my-2">
                                <input type="date" name="tanggalLahir" class="form-control " id="ttl" placeholder="Tanggal Lahir" value="<?= $member->tanggal_lahir ?>">
                                <label for="ttl">Tanggal Lahir</label>
                            </div>

                            <span class="mt-2 h6">&nbsp;Jenis Kelamin Member</span> <br>
                            <div class="d-flex flex-row my-2">
                                <div class="form-check mx-2 my-2">
                                    <input class="form-check-input" type="radio" name="ijk" id="ijk1" <?php if($member->jenis_kelamin == 'Laki - Laki' ){ echo "checked"; } ?>
                                    <label class="form-check-label h6" for="ijk1">
                                        Laki - Laki
                                    </label>
                                </div>
                                <div class="form-check mx-2 my-2">
                                    <input class="form-check-input" type="radio" name="ijk" id="ijk2" <?php if($member->jenis_kelamin == 'Perempuan' ){ echo "checked"; } ?>
                                    <label class="form-check-label h6" for="ijk2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>

                            <div class="form-floating mt-2">
                                        <input type="text" name="kota" class="form-control " id="kota" placeholder="Kota Domisili" value="<?= $member->kota_tinggal ?>" >
                                        <label for="kota">Kota Domisili</label>
                            </div>
                            
                            <div class="py-2">
                                <div class="form-floating">
                                    <textarea id="alamat" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"><?= $member->alamat ?></textarea>
                                    <label for="floatingTextarea">Alamat Member</label>
                                </div>
                            </div>

                            <div class="py-2">
                                <div class="form-floating">
                                    <select class="form-select" placeholder="selection" id="pendidikan">
                                        <option value="" disabled>Pendidikan </option>
                                        <?php foreach($pendidikan as $p => $pendidikan): ?>
                                            <?php if($pendidikan->id == $member->pendidikan_id): ?>
                                                <option value="<?= $pendidikan->id ?>" selected><?= $pendidikan->nama_pendidikan ?></option>
                                            <?php else: ?>
                                                <option value="<?= $pendidikan->id ?>"><?= $pendidikan->nama_pendidikan ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                    <label for="floatingTextarea">Pendidikan Terakhir</label>
                                </div>
                            </div>

                            <div class="py-2">
                                <label for="Deskripsi">Deskripsi Member</label>
                                <div id="editDeskripsi"></div>
                            </div>

                            <div class="py-2 mt-1">
                                <label for="Keahlian">Keahlian Member</label>
                                <div id="editKeahlian"></div>
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
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['image', 'code-block'], [{ 'list': 'ordered'}, { 'list': 'bullet' }]
            ]
        },
        placeholder: 'Tentang Kamu',
        theme: 'snow'  // or 'bubble'
    });

    var keahlian = new Quill('#editKeahlian', {
        modules: {
            toolbar: [
                [{header: [1,2,false]}],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block'], [{ 'list': 'ordered'}, { 'list': 'bullet' }]
            ]
        },
        placeholder: 'Keahlian Mu',
        theme: 'snow'
    });

    
    desk = quill.clipboard.convert('<?= $member->deskripsi_member ?>')
    quill.setContents(desk, 'silent')

    kea = keahlian.clipboard.convert('<?= $member->keahlian_member ?>')
    keahlian.setContents(kea, 'silent')
  </script>

  <script>
        function saving()
        {
            let token = document.querySelector('[name=X-CSRF-TOKEN]').getAttribute('content');
            var jenis;
            var deskripsi = document.getElementById('editDeskripsi').children[0].innerHTML;
            var tentang = document.getElementById('editKeahlian').children[0].innerHTML;
            if(document.getElementById('ijk1').checked == true){
                var jenis = 'Laki - Laki';
            }else{
                var jenis = 'Peremuan';
            }
            // console.log(deskripsi);
           
            $.ajax({
                url: '<?= base_url('/admin/member/edit/put') ?>',
                method: 'POST',
                data: {
                    csrf_test_name : token,
                    id: '<?= $member->user_id ?>',
                    firstname: document.getElementById('firstname').value,
                    lastname: document.getElementById('lastname').value,
                    nik: document.getElementById('nik').value,
                    tanggallahir: document.getElementById('ttl').value,
                    kota: document.getElementById('kota').value,
                    alamat: document.getElementById('alamat').value,
                    pendidikan: document.getElementById('pendidikan').value,
                    jenisK: jenis,
                    deskripsis: deskripsi,
                    keahlians: tentang,
                },
                success: function(response){
                        console.log(response)
                        swal.fire(
                            'Berhasil',
                            'Member Baru Telah Dibuat',
                            'success'
                        )
                        location.href = '<?= base_url('/admin/member') ?>'
                },

                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
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