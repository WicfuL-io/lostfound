<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-6">

<div class="form-card">

<h2 class="text-center mb-4">

Daftar Akun

</h2>

<form action="<?= base_url('/register') ?>" method="post">

<?= csrf_field() ?>

<div class="mb-3">

<label>Nama Lengkap</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= old('nama') ?>"
required>

</div>

<div class="mb-3">

<label>NIM</label>

<input
type="text"
name="nim"
class="form-control"
value="<?= old('nim') ?>"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?= old('email') ?>"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-4">

<label>Konfirmasi Password</label>

<input
type="password"
name="password_confirm"
class="form-control"
required>

</div>

<button class="btn btn-primary w-100">

Daftar

</button>

</form>

<hr>

<p class="text-center">

Sudah punya akun?

<a href="<?= base_url('/login') ?>">

Login

</a>

</p>

</div>

</div>

</div>

</div>

<?= $this->endSection() ?>