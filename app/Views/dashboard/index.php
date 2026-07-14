<?= $this->extend('layouts/template') ?>


<?= $this->section('content') ?>


<div class="container py-5">


<h2 class="mb-2">

Halo,
<?= esc(session('nama')) ?>

👋

</h2>


<p class="text-muted">

Selamat datang di Lost & Found Kampus

</p>



<div class="row mt-4">


<div class="col-md-3 mb-3">

<div class="card shadow border-0">

<div class="card-body">

<h2>
<?= $laporanSaya ?>
</h2>

<p>
📦 Laporan Saya
</p>


</div>

</div>

</div>




<div class="col-md-3 mb-3">

<div class="card shadow border-0">

<div class="card-body">

<h2>

<?= $barangHilang ?>

</h2>


<p>

🔴 Barang Hilang

</p>


</div>

</div>

</div>





<div class="col-md-3 mb-3">

<div class="card shadow border-0">

<div class="card-body">

<h2>

<?= $barangDitemukan ?>

</h2>


<p>

🟢 Barang Ditemukan

</p>


</div>

</div>

</div>





<div class="col-md-3 mb-3">

<div class="card shadow border-0">

<div class="card-body">

<h2>

<?= $klaimSaya ?>

</h2>


<p>

📋 Klaim Saya

</p>


</div>

</div>

</div>



</div>




<hr class="my-5">



<h4>

Laporan Terbaru Saya

</h4>



<div class="row mt-3">


<?php foreach($barangTerbaru as $b): ?>


<div class="col-md-4 mb-3">


<div class="card shadow-sm">


<img

src="<?= base_url('uploads/barang/'.$b['foto_utama']) ?>"

class="card-img-top"

style="height:200px;object-fit:cover">


<div class="card-body">


<h5>

<?= esc($b['judul']) ?>

</h5>


<p>

<?= esc($b['lokasi']) ?>

</p>


<a

href="<?= base_url('barang/detail/'.$b['id']) ?>"

class="btn btn-primary btn-sm">

Detail

</a>


</div>


</div>


</div>


<?php endforeach; ?>


</div>


</div>



<?= $this->endSection() ?>