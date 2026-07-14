<?= $this->extend('layouts/template') ?>


<?= $this->section('content') ?>



<div class="container py-5">



<div class="row justify-content-center">


<div class="col-lg-7">



<div class="card shadow border-0">



<div class="card-header bg-success text-white">


<h4 class="mb-0">

    📦 Ajukan Klaim Barang

</h4>


</div>





<div class="card-body">





<form

action="<?= base_url('claim/simpan') ?>"

method="post"

enctype="multipart/form-data">





<?= csrf_field() ?>





<input

type="hidden"

name="barang_id"

value="<?= esc($barang['id']) ?>"

>







<h5>


<?= esc(
    $barang['judul']
    ??
    $barang['nama_barang']
    ??
    'Barang'
) ?>


</h5>





<hr>







<div class="mb-3">



<label class="form-label">


Alasan Kepemilikan


</label>





<textarea


name="alasan"


class="form-control"


rows="5"


required


placeholder="Jelaskan mengapa barang tersebut milik Anda">


</textarea>



</div>









<div class="mb-4">



<label class="form-label">


Upload Bukti Pendukung


</label>





<input


type="file"


name="bukti"


class="form-control"


accept="image/*"


required>


<small class="text-muted">

Upload foto kartu identitas, bukti pembelian, atau bukti kepemilikan.

</small>



</div>







<button


class="btn btn-success w-100">


<i class="bi bi-send"></i>


Kirim Klaim



</button>






</form>






</div>



</div>



</div>


</div>



</div>




<?= $this->endSection() ?>