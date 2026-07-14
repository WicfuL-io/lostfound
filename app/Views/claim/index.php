<?= $this->extend('layouts/template') ?>


<?= $this->section('content') ?>


<div class="container py-5">


    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            📋 Verifikasi Klaim Barang
        </h2>

    </div>



    <div class="row g-4">



    <?php if(!empty($claims)): ?>



        <?php foreach($claims as $c): ?>


        <div class="col-lg-6">



            <div class="card shadow border-0 h-100">


                <div class="card-body">



                    <h4 class="mb-3">

                        <?= esc($c['judul'] ?? 'Barang Tidak Ditemukan') ?>

                    </h4>




                    <p>

                        <strong>
                            Pengaju :
                        </strong>

                        <?= esc($c['nama'] ?? 'User Tidak Diketahui') ?>

                    </p>




                    <p>

                        <strong>
                            Alasan :
                        </strong>

                        <br>

                        <?= nl2br(
                            esc($c['alasan'] ?? '-')
                        ) ?>


                    </p>





                    <?php if(!empty($c['bukti'])): ?>


                    <a

                    href="<?= base_url('uploads/claim/'.$c['bukti']) ?>"

                    target="_blank"

                    class="btn btn-outline-primary btn-sm mb-3">


                        <i class="bi bi-image"></i>

                        Lihat Bukti


                    </a>


                    <?php endif; ?>






                    <hr>




                    <p>

                        Status :

                        <?php if($c['status']=="pending"): ?>


                            <span class="badge bg-warning text-dark">

                                Menunggu

                            </span>




                        <?php elseif($c['status']=="diterima"): ?>


                            <span class="badge bg-success">

                                Diterima

                            </span>




                        <?php else: ?>


                            <span class="badge bg-danger">

                                Ditolak

                            </span>



                        <?php endif; ?>


                    </p>






                    <?php if($c['status']=="pending"): ?>


                    <div class="mt-3">


                        <a

                        href="<?= base_url('admin/claim/terima/'.$c['id']) ?>"

                        class="btn btn-success">


                            <i class="bi bi-check-circle"></i>

                            Terima


                        </a>





                        <a

                        href="<?= base_url('admin/claim/tolak/'.$c['id']) ?>"

                        class="btn btn-danger">


                            <i class="bi bi-x-circle"></i>

                            Tolak


                        </a>


                    </div>


                    <?php endif; ?>





                </div>


            </div>


        </div>




        <?php endforeach; ?>





    <?php else: ?>



        <div class="col-12">


            <div class="alert alert-info text-center">


                Belum ada pengajuan klaim barang.


            </div>


        </div>



    <?php endif; ?>



    </div>



</div>



<?= $this->endSection() ?>