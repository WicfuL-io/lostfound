<?= $this->extend('layouts/template') ?>


<?= $this->section('content') ?>



<div class="container py-5">



<div class="d-flex justify-content-between align-items-center mb-4">


<h3>

🔔 Notifikasi

</h3>



<span class="badge bg-primary">

<?= count($notifications ?? []) ?> Notifikasi

</span>



</div>






<div class="row">



<?php if(!empty($notifications)): ?>



<?php foreach($notifications as $n): ?>



<div class="col-lg-8 mb-3">



<div class="card shadow-sm border-0

<?= ($n['dibaca'] ?? 0) == 0 ? 'bg-light' : '' ?>

">



<div class="card-body">





<div class="d-flex justify-content-between">



<h5 class="mb-2">


<?php if(($n['dibaca'] ?? 0) == 0): ?>

<span class="badge bg-danger me-2">

Baru

</span>


<?php endif; ?>


<?= esc($n['judul'] ?? 'Notifikasi') ?>


</h5>





</div>







<p class="text-muted mb-2">


<?= esc($n['pesan'] ?? '-') ?>


</p>







<small class="text-secondary">


<i class="bi bi-clock"></i>


<?= date(
'd M Y H:i',
strtotime($n['created_at'])
) ?>


</small>







<div class="mt-3">





<?php if(($n['dibaca'] ?? 0) == 0): ?>



<a

href="<?= base_url('notification/read/'.$n['id']) ?>"

class="btn btn-primary btn-sm">


<i class="bi bi-check-circle"></i>

Tandai Dibaca


</a>



<?php else: ?>



<span class="badge bg-success">

<i class="bi bi-check"></i>

Sudah Dibaca

</span>



<?php endif; ?>






<?php if(!empty($n['url'])): ?>


<a

href="<?= base_url($n['url']) ?>"

class="btn btn-outline-secondary btn-sm">


Lihat Detail


</a>



<?php endif; ?>





</div>





</div>



</div>




</div>



<?php endforeach; ?>





<?php else: ?>



<div class="col-12">


<div class="alert alert-info text-center">


<i class="bi bi-bell"></i>


Belum ada notifikasi.


</div>


</div>



<?php endif; ?>





</div>




</div>




<?= $this->endSection() ?>