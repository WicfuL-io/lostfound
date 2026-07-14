<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="form-card">

                <h2 class="text-center mb-4">
                    Login
                </h2>

                <?php if(session()->getFlashdata('error')) : ?>

                    <div class="alert alert-danger">

                        <?= session()->getFlashdata('error') ?>

                    </div>

                <?php endif; ?>

                <form action="<?= base_url('/login') ?>" method="post">

                    <?= csrf_field() ?>

                    <div class="mb-3">

                        <label>Email / NIM</label>

                        <input
                            type="text"
                            name="login"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-4">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>

                    <button class="btn btn-primary w-100">

                        Login

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>