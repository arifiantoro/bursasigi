<?= $this->extend('statictheme/header') ?>
<?= $this->section('konten') ?>
    <div class="d-flex">
        <div class="col-md-6 nyaa3">
           <!-- <img src="<?= base_url('assets/img/pertanyaan.svg') ?>" alt="covering" class="mobilecov" style="max-width:60%;" > -->
           
        </div>
        <div class="col-md-6">
            <div class="about2" id="tentang" style="color:#FF6600 !important">
                <img src="<?= base_url('assets/img/kerjasama.svg') ?>" alt="covering" class="mobilecov" style="max-width:60%;" >
                
                <h1 class="h2">Bekerja Sama Dengan Kami ?</h1>
                <span>Kami Akan Sangat Senang Bekerja Sama Dengan Anda</span> <br>
                &nbsp;<button class="btn btn-primary mt-2" type="button" onclick="bawahin()"> Cari Tahu Lebih Lanjut<i class="fas fa-arrow-right"></i> </button>
            </div>
        </div>
    </div>


<div class="sec2 py-3 mb-2 fw-light" >
    <div id="rincian">
        <div class="text-center">
            <h2 class="h2">HUBUNGI KAMI</h2>
            <span style="color:black !important;">Mohon Untuk Menghubungi Kami Untuk Info Lebih Lanjut</span>
        </div>
        <div class="container py-3" style="color:black !important;">
                <div class="row align-items-stretch">
                    <div class="col-lg-4 col-md-6 col-sm-12 p-3 align-self-stretch text-center">
                        <div class="card shadow border-0 py-2 h-100" style="background:#F4F5F9;">
                            <div class="card-header" style="background: none; border:none;" >
                                <img src="<?= base_url('assets/img/img/c3.svg') ?>" style="height:119px; color:#FF6600;" class="p-3" >
                                <br><strong>Email Kami</strong>
                            </div>
                            
                            <div class="car-body px-3 h-100">
                                <p class="mt-1">Kami Juga Merupakan Lembaga Pelatihan & Pembinaan Yang Memiliki Izin Langsung Dari Pihak Kementrian Ketenagakerjaan.</p>
                            </div>

                            <div class="card-footer" style="background: none; border:none;">
                                <hr class="garis">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 p-3 align-self-stretch text-center">
                        <div class="card shadow border-0 py-2 h-100" style="background:#F4F5F9;">
                            <div class="card-header" style="background: none; border:none;" >
                                <img src="<?= base_url('assets/img/img/c3.svg') ?>" style="height:119px;" class="p-3" >
                                <br><strong>No WhatsApp Kami</strong>
                            </div>
                            
                            <div class="car-body px-3 h-100">
                                <p class="mt-1">Hasil Kelulusan Melalui Program Pelatihan Kami Setara Dengan Sertifikat Kelulusan Yang Dikeluarkan Kemnaker.</p>
                            </div>

                            <div class="card-footer" style="background: none; border:none;">
                               <hr class="garis">
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6 col-sm-12 p-3 align-self-stretch text-center">
                        <div class="card shadow border-0 py-2 h-100" style="background:#F4F5F9;">
                            <div class="card-header" style="background: none; border:none;" >
                                <img src="<?= base_url('assets/img/img/c1.svg') ?>" style="height:119px;" class="p-3" >
                                <br><strong>Kantor Kami</strong>
                            </div>
                            <div class="car-body px-3 h-100">
                                <p class="mt-1">Kami memiliki mentor mentor yang berpengalaman dibidangnya, untuk mencetak generasi siap kerja.</p>
                            </div>
                            <div class="card-footer" style="background: none; border:none;">
                                <hr class="garis">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</div>
</div>


<?= $this->include('statictheme/footer') ?>
<script>
    function bawahin()
    {
        console.log('Umenya')
        var rincian = document.getElementById('rincian');
        rincian.scrollIntoView({behavior: 'smooth'}, true);
    }
</script>
<?= $this->endSection() ?>
