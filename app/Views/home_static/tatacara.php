<?= $this->extend('statictheme/header') ?>
<?= $this->section('konten') ?>
    <div class="d-flex">
        <div class="col-md-6 nyaa2">
           <!-- <img src="<?= base_url('assets/img/pertanyaan.svg') ?>" alt="covering" class="mobilecov" style="max-width:60%;" > -->
           
        </div>
        <div class="col-md-6">
            <div class="about2" id="tentang" style="color:#FF6600 !important">
                <img src="<?= base_url('assets/img/pertanyaan.svg') ?>" alt="covering" class="mobilecov" style="max-width:60%;" >
                
                <h1 class="h2">Ingin Pasang LoKer di Bursa Kerja Tapi Tidak Tahu Caraya ?</h1>
                &nbsp;<button class="btn btn-primary" type="button" onclick="bawahin()">Cari Tahu Disini <i class="fas fa-arrow-right"></i> </button>
            </div>
        </div>
    </div>
</div>

<div class="sec2 py-3 mb-2 fw-light" >
    <div id="rincian" class="container container-fluid">
        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, hic minus! Inventore repudiandae dolore magni rerum alias praesentium necessitatibus sit quae? Necessitatibus cupiditate fugit quasi voluptatibus a voluptates ab earum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas eum accusantium voluptate? Quos hic eius repellendus, deserunt officiis tempore perspiciatis dignissimos beatae quas, ad sapiente quaerat voluptatum ipsam eos vero? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus quis cupiditate beatae iste harum, blanditiis molestias praesentium numquam est, earum obcaecati laborum labore deleniti dolorem? Dignissimos eos laudantium libero ea? Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore perspiciatis expedita illum minima assumenda, porro a blanditiis sapiente itaque eum magnam, aliquid, animi voluptas deserunt accusantium in minus facilis? Totam!</p>
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
