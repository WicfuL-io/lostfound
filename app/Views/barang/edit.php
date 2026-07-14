<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-warning text-dark rounded-top-4">
                    <h3 class="mb-0">
                        <i class="bi bi-pencil-square"></i>
                        Edit Laporan Barang
                    </h3>
                </div>

                <div class="card-body p-4">

                    <?php if (session()->getFlashdata('errors')) : ?>

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>

                                    <li><?= esc($error) ?></li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    <?php endif; ?>

                    <form action="<?= base_url('barang/update/'.$barang['id']) ?>"
                          method="post"
                          enctype="multipart/form-data">

                        <?= csrf_field() ?>

                        <div class="row">

                            <!-- Judul -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Judul Laporan
                                </label>

                                <input
                                    type="text"
                                    name="judul"
                                    class="form-control"
                                    value="<?= old('judul', $barang['judul']) ?>"
                                    required>

                            </div>

                            <!-- Nama Barang -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Nama Barang
                                </label>

                                <input
                                    type="text"
                                    name="nama_barang"
                                    class="form-control"
                                    value="<?= old('nama_barang', $barang['nama_barang']) ?>"
                                    required>

                            </div>

                            <!-- Kategori -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Kategori
                                </label>

                                <select
                                    name="kategori_id"
                                    class="form-select"
                                    required>

                                    <option value="">-- Pilih Kategori --</option>

                                    <?php foreach ($kategori as $k) : ?>

                                        <option
                                            value="<?= $k['id'] ?>"
                                            <?= old('kategori_id', $barang['kategori_id']) == $k['id'] ? 'selected' : '' ?>>

                                            <?= esc($k['nama_kategori']) ?>

                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <!-- Jenis -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Jenis Laporan
                                </label>

                                <select
                                    name="jenis"
                                    class="form-select">

                                    <option
                                        value="hilang"
                                        <?= old('jenis', $barang['jenis']) == 'hilang' ? 'selected' : '' ?>>

                                        Barang Hilang

                                    </option>

                                    <option
                                        value="ditemukan"
                                        <?= old('jenis', $barang['jenis']) == 'ditemukan' ? 'selected' : '' ?>>

                                        Barang Ditemukan

                                    </option>

                                </select>

                            </div>

                            <!-- Status -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    class="form-select">

                                    <option
                                        value="belum_ditemukan"
                                        <?= old('status', $barang['status']) == 'belum_ditemukan' ? 'selected' : '' ?>>

                                        Belum Ditemukan

                                    </option>

                                    <option
                                        value="sudah_kembali"
                                        <?= old('status', $barang['status']) == 'sudah_kembali' ? 'selected' : '' ?>>

                                        Sudah Kembali

                                    </option>

                                </select>

                            </div>

                            <!-- Lokasi -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Lokasi Kejadian
                                </label>

                                <input
                                    type="text"
                                    name="lokasi"
                                    class="form-control"
                                    value="<?= old('lokasi', $barang['lokasi']) ?>"
                                    required>

                            </div>

                            <!-- Tanggal -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Tanggal Kejadian
                                </label>

                                <input
                                    type="date"
                                    name="tanggal_kejadian"
                                    class="form-control"
                                    value="<?= old('tanggal_kejadian', $barang['tanggal_kejadian']) ?>">

                            </div>

                            <!-- Kontak -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Nomor WhatsApp
                                </label>

                                <input
                                    type="text"
                                    name="kontak"
                                    class="form-control"
                                    value="<?= old('kontak', $barang['kontak']) ?>">

                            </div>

                            <!-- Preview Foto -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Foto Saat Ini
                                </label>

                                <br>

                                <?php if (!empty($barang['foto_utama'])) : ?>

                                    <img
                                        src="<?= base_url('uploads/barang/'.$barang['foto_utama']) ?>"
                                        id="preview"
                                        class="img-fluid rounded shadow"
                                        style="max-height:220px">

                                <?php else : ?>

                                    <img
                                        src="https://placehold.co/400x250?text=No+Image"
                                        id="preview"
                                        class="img-fluid rounded shadow">

                                <?php endif; ?>

                            </div>

                            <!-- Upload -->

                            <div class="col-md-12 mb-3">

                                <label class="form-label">
                                    Ganti Foto (Opsional)
                                </label>

                                <input
                                    type="file"
                                    name="foto_utama"
                                    class="form-control"
                                    accept="image/*"
                                    onchange="previewImage(event)">

                            </div>

                            <!-- Deskripsi -->

                            <div class="col-12 mb-4">

                                <label class="form-label">
                                    Deskripsi
                                </label>

                                <textarea
                                    name="deskripsi"
                                    class="form-control"
                                    rows="6"><?= old('deskripsi', $barang['deskripsi']) ?></textarea>

                            </div>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a
                                href="<?= base_url('barang') ?>"
                                class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>

                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning">

                                <i class="bi bi-check-circle"></i>

                                Update Data

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function previewImage(event){

    const preview = document.getElementById('preview');

    preview.src = URL.createObjectURL(event.target.files[0]);

}

</script>

<?= $this->endSection() ?>