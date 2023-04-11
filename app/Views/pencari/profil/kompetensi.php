<main class="p-3">

    <div class="pagetitle">
        <h1>Laman Peserta</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/member') ?>">Peserta</a></li>
                <li class="breadcrumb-item active">Peserta</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Top Selling -->
            <div class="col-16">
                <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-8">
                                <h5 class="card-title">Peserta: </h5>
                            </div>
                            <div class="col-4 text-end">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalId"><i class="bi bi-person-plus-fill"></i> Tambah Kompetensi</button>
                            </div>
                        </div>
                        <table class="table table-stripped my-1" id="tablekan">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Judul Kompetensi</th>
                                    <th>Bukti</th>

                                    <th>Hapus Riwayat</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($kompe as $p => $kompetensi) : ?>
                                    <tr>
                                        <td><?= $p + 1 ?></td>
                                        <td><?= $kompetensi->jenis_kompetensi ?></td>
                                        <td><?= $kompetensi->judul_kompetensi ?></td>
                                        <td><?= $kompetensi->bukti_kompetensi ?></td>

                                        <td>
                                            <a class="btn btn-danger btn-sm" href="<?= base_url('/member/kompetensi/delete/' . $kompetensi->id) ?>"><i class="bi bi-trash"></i> Hapus Data</a>
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
                    <h5 class="modal-title" id="modalTitleId">Tambah Kompetensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="<?= base_url('/member/profile/kompetensiPost') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="iId" value="<?= $id = user()->id; ?>">

                        <label for="nama">Nama Kompetensi</label>
                        <input type="text" name="inama" id="nama" class="form-control">

                        <label for="judul">Judul Kompetensi </label>
                        <input type="text" name="ijudul" id="judul" class="form-control">

                        <label for="bukti">Bukti </label>
                        <input type="text" name="iBukti" id="bukti" class="form-control">



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