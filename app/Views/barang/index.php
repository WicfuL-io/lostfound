<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>


<div class="container py-5">


    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            Daftar Barang
        </h2>


        <a href="<?= base_url('barang/tambah') ?>" 
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah Laporan

        </a>


    </div>




    <!-- FILTER SEARCH -->

    <form method="get" class="card shadow p-4 mb-5">


        <div class="row g-3">


            <div class="col-md-4">


                <input

                    type="text"

                    name="keyword"

                    class="form-control"

                    placeholder="Cari barang..."

                    value="<?= esc(request()->getGet('keyword') ?? '') ?>">



            </div>




            <div class="col-md-2">


                <select

                    name="jenis"

                    class="form-select">


                    <option value="">
                        Semua Jenis
                    </option>


                    <option 
                        value="hilang"
                        <?= request()->getGet('jenis') == 'hilang' ? 'selected' : '' ?>>

                        Barang Hilang

                    </option>


                    <option 
                        value="ditemukan"
                        <?= request()->getGet('jenis') == 'ditemukan' ? 'selected' : '' ?>>

                        Barang Ditemukan

                    </option>


                </select>


            </div>





            <div class="col-md-2">


                <select

                    name="status"

                    class="form-select">



                    <option value="">
                        Semua Status
                    </option>



                    <option
                        value="belum_ditemukan"
                        <?= request()->getGet('status') == 'belum_ditemukan' ? 'selected' : '' ?>>

                        Belum Ditemukan

                    </option>



                    <option
                        value="sudah_kembali"
                        <?= request()->getGet('status') == 'sudah_kembali' ? 'selected' : '' ?>>

                        Sudah Kembali

                    </option>



                </select>


            </div>





            <div class="col-md-2">


                <select

                    name="kategori"

                    class="form-select">


                    <option value="">
                        Semua Kategori
                    </option>



                    <?php foreach($kategori as $k): ?>


                        <option

                            value="<?= $k['id'] ?>"

                            <?= request()->getGet('kategori') == $k['id'] ? 'selected' : '' ?> >


                            <?= esc($k['nama_kategori']) ?>


                        </option>



                    <?php endforeach; ?>


                </select>


            </div>





            <div class="col-md-2">


                <button class="btn btn-primary w-100">


                    <i class="bi bi-search"></i>

                    Cari


                </button>


            </div>



        </div>


    </form>







    <!-- DATA BARANG -->


    <div class="row">



        <?php if(empty($barang)): ?>


            <div class="col-12">


                <div class="alert alert-warning">


                    Belum ada data barang.


                </div>


            </div>



        <?php endif; ?>






        <?php foreach($barang as $b): ?>



        <div class="col-lg-4 col-md-6 mb-4">


            <div class="card shadow-sm border-0 h-100">



                <?php if(!empty($b['foto_utama'])): ?>


                <img

                    src="<?= base_url('uploads/barang/'.$b['foto_utama']) ?>"

                    class="card-img-top"

                    style="height:250px;object-fit:cover;">


                <?php else: ?>


                <div class="bg-secondary text-white d-flex align-items-center justify-content-center"

                     style="height:250px;">


                    Tidak ada foto


                </div>


                <?php endif; ?>






                <div class="card-body">



                    <span class="badge bg-secondary mb-2">


                        <?= esc($b['nama_kategori'] ?? '-') ?>


                    </span>





                    <h5>


                        <?= esc($b['judul']) ?>


                    </h5>





                    <p class="text-muted">


                        <?= esc($b['nama_barang']) ?>


                    </p>





                    <p>


                        <i class="bi bi-geo-alt"></i>


                        <?= esc($b['lokasi']) ?>


                    </p>





                    <p>


                        <i class="bi bi-calendar"></i>


                        <?= esc($b['tanggal_kejadian']) ?>


                    </p>







                    <?php if($b['jenis'] == 'hilang'): ?>


                        <span class="badge bg-danger">


                            Barang Hilang


                        </span>



                    <?php else: ?>


                        <span class="badge bg-success">


                            Barang Ditemukan


                        </span>



                    <?php endif; ?>




                </div>







                <div class="card-footer bg-white border-0">


                    <a

                        href="<?= base_url('barang/detail/'.$b['id']) ?>"

                        class="btn btn-outline-primary w-100">


                        Lihat Detail


                    </a>



                </div>




            </div>


        </div>



        <?php endforeach; ?>




    </div>



</div>



<?= $this->endSection() ?>