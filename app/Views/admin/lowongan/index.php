<main id="main" class="main">
    
    <div class="card-title p-3">
        <h1 class="h4 fw-bold" style="line-height:0pt;">Info Loker</h1>
        <span>Infromasi Lowongan Kerja Yang di Posting Oleh Perusahaan</span>
    </div>

    <div class="card card-shadow bg-white py-3">
        <div class="card-title px-3">
            Lowongan Saat Ini:
        </div>
        <div class="card-body">
            <table class="table table-stripped" id="tablekan">
                <thead class="table-header table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Posisi</th>
                        <th>Keterisian</th>
                        <th>Detail</th>
                    </tr>
                </thead>
            </table>    
        </div>
    </div>
</main>

<?= $this->section('customScript') ?>
    <script>
        $('#tablekan').DataTable();
    </script>
<?= $this->endSection() ?>