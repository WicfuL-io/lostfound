<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-3" id="mainNavbar">

    <div class="container">


        <!-- LOGO -->
        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="<?= base_url('/') ?>">


            <div class="logo-box me-2">

                <i class="bi bi-box-seam-fill"></i>

            </div>


            <div>

                <div class="logo-title">
                    Lost & Found
                </div>

                <small class="text-muted">
                    Kampus
                </small>

            </div>


        </a>




        <!-- MOBILE BUTTON -->

        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">


            <span class="navbar-toggler-icon"></span>


        </button>





        <div class="collapse navbar-collapse" id="navbarMenu">



            <!-- MENU -->

            <ul class="navbar-nav mx-auto">


                <li class="nav-item">

                    <a class="nav-link"
                       href="<?= base_url('/') ?>">

                        Home

                    </a>

                </li>



                <li class="nav-item">

                    <a class="nav-link"
                       href="<?= base_url('barang?jenis=hilang') ?>">

                        Barang Hilang

                    </a>

                </li>




                <li class="nav-item">

                    <a class="nav-link"
                       href="<?= base_url('barang?jenis=ditemukan') ?>">

                        Barang Ditemukan

                    </a>

                </li>




                <li class="nav-item">

                    <a class="nav-link"
                       href="<?= base_url('kategori') ?>">

                        Kategori

                    </a>

                </li>




                <li class="nav-item">

                    <a class="nav-link"
                       href="<?= base_url('tentang') ?>">

                        Tentang

                    </a>

                </li>


            </ul>





            <!-- SEARCH -->

            <form 
                action="<?= base_url('barang') ?>"
                method="get"
                class="d-flex me-3">


                <div class="search-box">


                    <i class="bi bi-search"></i>


                    <input

                        type="text"

                        name="keyword"

                        class="form-control"

                        placeholder="Cari barang..."

                    >


                </div>


            </form>







<?php if(session()->get('id')): ?>


            <!-- USER LOGIN -->


            <div class="dropdown">


                <button

                    class="btn btn-light dropdown-toggle"

                    data-bs-toggle="dropdown">


                    <i class="bi bi-person-circle"></i>


                    <?= esc(session('nama')) ?>


                </button>



                <ul class="dropdown-menu dropdown-menu-end">


                    <li>

                        <a class="dropdown-item"
                           href="<?= base_url('dashboard') ?>">


                            <i class="bi bi-speedometer2"></i>

                            Dashboard


                        </a>

                    </li>




                    <li>

                        <a class="dropdown-item"
                           href="<?= base_url('profile') ?>">


                            <i class="bi bi-person"></i>

                            Profil


                        </a>

                    </li>





                    <li>


                        <a class="dropdown-item"
                           href="<?= base_url('claim/saya') ?>">


                            <i class="bi bi-file-check"></i>

                            Klaim Saya


                        </a>


                    </li>






                    <li>

                        <a class="dropdown-item"
                           href="<?= base_url('notification') ?>">


                            <i class="bi bi-bell"></i>

                            Notifikasi


                        </a>


                    </li>





                    <li>
                        <hr class="dropdown-divider">
                    </li>





                    <li>

                        <a class="dropdown-item text-danger"
                           href="<?= base_url('logout') ?>">


                            <i class="bi bi-box-arrow-right"></i>

                            Logout


                        </a>


                    </li>



                </ul>


            </div>






<?php else: ?>



            <!-- BELUM LOGIN -->


            <div class="d-flex gap-2">


                <a href="<?= base_url('login') ?>"
                   class="btn btn-outline-primary px-4">


                    Login


                </a>




                <a href="<?= base_url('register') ?>"
                   class="btn btn-primary px-4">


                    Register


                </a>


            </div>



<?php endif; ?>



        </div>

    </div>

</nav>