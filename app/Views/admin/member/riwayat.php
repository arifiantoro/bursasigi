<main id="main" class="main">

  <div class="pagetitle">
    <h1>Laman Peserta</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Administrator</a></li>
        <li class="breadcrumb-item active">Peserta</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Top Selling -->
      <div class="col-12">
        <div class="card top-selling overflow-auto">

          <div class="card-body pb-0">
            <div class="row align-items-center justify-content-center">
              <div class="col-8">
                <h5 class="card-title">Peserta: </h5>
              </div>
              <div class="col-4 text-end">
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalId"><i class="bi bi-person-plus-fill"></i> Tambar Riwayat Pendidikan</button>
              </div>
            </div>
            <table class="table table-stripped my-1" id="tablekan">
              <thead class="bg-dark text-white">
                <tr>
                  <th>No</th>
                  <th>Jenjang</th>
                  <th>Nama Institusi</th>
                  <th>Jurusan</th>
                  <th>IPK</th>
                  <th>Hapus Riwayat</th>
                </tr>
              </thead>

              <tbody>

                <?php foreach ($pendidikan as $p => $pendidikan) : ?>
                  <tr>
                    <td><?= $p + 1 ?></td>
                    <td><?= $pendidikan->pendidikan ?></td>
                    <td><?= $pendidikan->instansi ?></td>
                    <td><?= $pendidikan->gelar ?></td>
                    <td><?= $pendidikan->ipk ?></td>
                    <td>
                      <a class="btn btn-danger btn-sm" href="<?= base_url('admin/member/riwayat/delete/' . $pendidikan->id) ?>"><i class="bi bi-trash"></i> Hapus Data</a>
                    </td>
                  </tr>
                <?php endforeach ?>

              </tbody>

            </table>

          </div>

        </div>
      </div><!-- End Top Selling -->

    </div>

    </div>
  </section>

  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitleId">Tambah Riwayat Pendidikan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="<?= base_url('admin/member/riwayat/post') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="iId" value="<?= $id ?>">
            <label for="Pendidikan">Pendidikan</label>
            <select name="iPendidikan" id="ipendidikan" class="form-select">
              <?php foreach ($pendidik as $k => $pen) : ?>
                <option value="<?= $pen->id ?>"><?= $pen->nama_pendidikan ?></option>
              <?php endforeach ?>
            </select>

            <label for="institusi">Nama Institusi</label>
            <input type="text" name="iInstitusi" id="institut" class="form-control">

            <label for="Jurusan">Jurusan </label>
            <input type="text" name="ijurus" id="jurusan" class="form-control">

            <label for="Jurusan">IPK </label>
            <input type="text" name="iIpk" id="ipk" class="form-control">

            <label for="Jurusan">Lulus Tahun </label>
            <input type="text" name="iTahun" id="tahun" class="form-control">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</main><!-- End #main -->


<?= $this->section('customScript') ?>
<script>
  let table = $('#tablekan').DataTable();
</script>
<!-- Optional: Place to the bottom of scripts -->
<script>
  const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
</script>
<?= $this->endSection() ?>