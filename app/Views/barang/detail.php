<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="container py-5">


<div class="row g-4">



<!-- FOTO BARANG -->

<div class="col-lg-5">


<div class="card shadow border-0 rounded-4">


<?php if(!empty($barang['foto_utama'])): ?>


<img

src="<?= base_url('uploads/barang/'.$barang['foto_utama']) ?>"

class="img-fluid rounded-4"

style="width:100%;height:400px;object-fit:cover;">



<?php else: ?>


<div

class="d-flex align-items-center justify-content-center bg-secondary text-white"

style="height:400px;">


Tidak ada foto


</div>



<?php endif; ?>


</div>



</div>







<!-- DETAIL BARANG -->


<div class="col-lg-7">


<div class="card shadow border-0 rounded-4">


<div class="card-body p-4">





<span class="badge bg-primary mb-3">


<?= esc($barang['nama_kategori'] ?? 'Tanpa kategori') ?>


</span>






<h2 class="fw-bold">


<?= esc($barang['judul'] ?? '-') ?>


</h2>



<hr>





<table class="table">


<tr>

<th width="180">

Nama Barang

</th>


<td>

<?= esc($barang['nama_barang'] ?? '-') ?>

</td>


</tr>






<tr>

<th>

Jenis

</th>


<td>


<?php if(($barang['jenis'] ?? '') == 'hilang'): ?>


<span class="badge bg-danger">

Barang Hilang

</span>


<?php else: ?>


<span class="badge bg-success">

Barang Ditemukan

</span>


<?php endif; ?>


</td>


</tr>







<tr>

<th>

Status

</th>


<td>


<?php if(($barang['status'] ?? '')=='sudah_kembali'): ?>


<span class="badge bg-success">

Sudah Kembali

</span>


<?php else: ?>


<span class="badge bg-warning text-dark">

Belum Ditemukan

</span>


<?php endif; ?>


</td>


</tr>







<tr>

<th>

Lokasi

</th>


<td>

<?= esc($barang['lokasi'] ?? '-') ?>

</td>


</tr>






<tr>

<th>

Tanggal

</th>


<td>


<?php if(!empty($barang['tanggal_kejadian'])): ?>


<?= date(
'd F Y',
strtotime($barang['tanggal_kejadian'])
) ?>


<?php else: ?>


-

<?php endif; ?>


</td>


</tr>






<tr>

<th>

Pelapor

</th>


<td>

<?= esc($barang['nama'] ?? '-') ?>


</td>


</tr>



</table>








<h5 class="fw-bold">

Deskripsi

</h5>


<p>

<?= nl2br(
esc($barang['deskripsi'] ?? '-')
) ?>


</p>






<!-- QR CODE -->

<?php if(!empty($barang['qr_code'])): ?>


<hr>


<div class="text-center mt-4">


<h5 class="fw-bold">

QR Code Barang

</h5>



<img

src="<?= base_url('uploads/qr/'.$barang['qr_code']) ?>"

width="220"

class="img-thumbnail my-3">





<p class="text-muted">

Scan QR untuk melihat detail barang

</p>




<a

href="<?= base_url('uploads/qr/'.$barang['qr_code']) ?>"

download

class="btn btn-outline-primary">


<i class="bi bi-download"></i>

Download QR


</a>


</div>



<?php endif; ?>








<!-- BUTTON -->


<div class="mt-4 d-flex gap-2 flex-wrap">





<?php if(!empty($barang['kontak'])): ?>


<a

href="https://wa.me/62<?= ltrim($barang['kontak'],'0') ?>"

target="_blank"

class="btn btn-success">


<i class="bi bi-whatsapp"></i>

Hubungi Pelapor


</a>


<?php endif; ?>






<?php if(($barang['jenis'] ?? '')=='ditemukan'): ?>


<a

href="<?= base_url('claim/buat/'.$barang['id']) ?>"

class="btn btn-primary">


<i class="bi bi-hand-index"></i>

Ajukan Klaim


</a>


<?php endif; ?>







<a

href="<?= base_url('barang') ?>"

class="btn btn-secondary">


Kembali


</a>







<?php if(

session()->get('role')=='admin'

||

session()->get('id')==($barang['user_id'] ?? null)

): ?>



<a

href="<?= base_url('barang/edit/'.$barang['id']) ?>"

class="btn btn-warning">


Edit


</a>






<a

href="<?= base_url('barang/hapus/'.$barang['id']) ?>"

onclick="return confirm('Yakin ingin menghapus data ini?')"

class="btn btn-danger">


Hapus


</a>



<?php endif; ?>






</div>






</div>


</div>


</div>




</div>


<?= $this->endSection() ?>