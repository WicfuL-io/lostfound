<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>


<!-- HERO -->
<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6" data-aos="fade-right">


                <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">
                    🎒 Sistem Lost & Found Kampus
                </span>


                <h1 class="hero-title">

                    Temukan Barangmu Dengan
                    <span>Mudah & Cepat</span>

                </h1>


                <p class="hero-text">

                    Laporkan barang yang hilang atau ditemukan.
                    Bantu mahasiswa menemukan kembali barang mereka
                    melalui sistem Lost & Found Kampus.

                </p>



                <div class="hero-btn d-flex gap-3 flex-wrap">


                    <a 
                    href="<?= base_url('login') ?>"
                    class="btn btn-primary btn-lg">

                        <i class="bi bi-box-arrow-in-right"></i>

                        Mulai Sekarang

                    </a>



                    <a 
                    href="#cara-kerja"
                    class="btn btn-outline-primary btn-lg">

                        Cara Kerja

                    </a>


                </div>


            </div>




            <div class="col-lg-6 text-center"
            data-aos="fade-left">


                <img

                src="<?= base_url('assets/images/hero.png') ?>"

                class="img-fluid hero-image"

                alt="Lost Found"


                >


            </div>


        </div>

    </div>


</section>






<!-- STATISTIK -->

<section class="section">


<div class="container">


<div class="row g-4">



<div class="col-lg-4">


<div class="stat-card">


<div class="stat-icon">

<i class="bi bi-search"></i>

</div>


<div class="stat-number">

<?= $totalHilang ?? 0 ?>

</div>


<div class="stat-title">

Barang Hilang

</div>


</div>


</div>






<div class="col-lg-4">


<div class="stat-card">


<div class="stat-icon">

<i class="bi bi-box-seam"></i>

</div>


<div class="stat-number">

<?= $totalDitemukan ?? 0 ?>

</div>


<div class="stat-title">

Barang Ditemukan

</div>


</div>


</div>







<div class="col-lg-4">


<div class="stat-card">


<div class="stat-icon">

<i class="bi bi-check-circle"></i>

</div>


<div class="stat-number">

<?= $totalKembali ?? 0 ?>

</div>


<div class="stat-title">

Barang Kembali

</div>


</div>


</div>





</div>


</div>


</section>







<!-- CARA KERJA -->

<section 
class="section bg-light"
id="cara-kerja">


<div class="container">



<div class="text-center mb-5">


<h2 class="section-title">

Cara Kerja

</h2>


<p class="section-subtitle">

Hanya membutuhkan tiga langkah sederhana.

</p>



</div>





<div class="row g-4">



<div class="col-lg-4">


<div class="feature-card">


<div class="icon-box mx-auto">

<i class="bi bi-person-plus"></i>

</div>



<h4>

Login

</h4>



<p>

Login menggunakan akun mahasiswa.

</p>



</div>


</div>







<div class="col-lg-4">


<div class="feature-card">


<div class="icon-box mx-auto">

<i class="bi bi-upload"></i>

</div>



<h4>

Buat Laporan

</h4>



<p>

Upload foto dan informasi barang.

</p>



</div>


</div>








<div class="col-lg-4">


<div class="feature-card">


<div class="icon-box mx-auto">

<i class="bi bi-check-circle"></i>

</div>



<h4>

Barang Kembali

</h4>



<p>

Pemilik menemukan kembali barangnya.

</p>



</div>


</div>





</div>



</div>


</section>









<!-- BARANG TERBARU -->


<section class="section">


<div class="container">



<div class="text-center mb-5">


<h2 class="section-title">

Barang Terbaru

</h2>



<p class="section-subtitle">

Laporan terbaru mahasiswa.

</p>



</div>







<div class="row g-4">





<?php if(!empty($barangTerbaru)): ?>




<?php foreach($barangTerbaru as $barang): ?>




<div class="col-lg-4">



<div class="item-card">





<img

src="<?= base_url('uploads/barang/'.$barang['foto_utama']); ?>"

class="item-image"

onerror="this.src='<?= base_url('assets/images/no-image.png') ?>'"

alt="barang"

>





<div class="item-body">





<span class="item-category">

<?= esc($barang['nama_kategori'] ?? 'Tanpa kategori') ?>

</span>





<h4 class="item-title">

<?= esc($barang['nama_barang']) ?>

</h4>







<p class="item-location">

<i class="bi bi-geo-alt"></i>

<?= esc($barang['lokasi']) ?>

</p>







<p class="item-date">

<i class="bi bi-calendar"></i>


<?= date(
'd M Y',
strtotime($barang['tanggal_kejadian'])
) ?>


</p>








<div class="item-footer">





<?php if($barang['status']=="Hilang"): ?>

<span class="badge badge-hilang">

Hilang

</span>



<?php elseif($barang['status']=="Ditemukan"): ?>

<span class="badge badge-kembali">

Ditemukan

</span>




<?php else: ?>

<span class="badge bg-success">

Kembali

</span>



<?php endif; ?>







<a

href="<?= base_url('barang/detail/'.$barang['id']) ?>"

class="btn-detail"

>

Detail

</a>





</div>







</div>





</div>





</div>





<?php endforeach; ?>





<?php else: ?>




<div class="col-12 text-center">


<h5>

Belum ada laporan barang

</h5>



<p>

Silahkan tambahkan laporan pertama.

</p>


</div>




<?php endif; ?>






</div>



</div>



</section>







<?= $this->endSection(); ?>