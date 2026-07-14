<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-primary text-white rounded-top-4">
                    <h3 class="mb-0">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Laporan Barang
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

                    <form action="<?= base_url('barang/simpan') ?>"
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
                                    value="<?= old('judul') ?>"
                                    placeholder="Contoh : Laptop ASUS Hilang">

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
                                    value="<?= old('nama_barang') ?>"
                                    placeholder="Contoh : ASUS Vivobook 14">

                            </div>

                            <!-- Kategori -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Kategori
                                </label>

                                <select
                                    name="kategori_id"
                                    class="form-select">

                                    <option value="">
                                        -- Pilih Kategori --
                                    </option>

                                    <?php foreach ($kategori as $k) : ?>

                                        <option
                                            value="<?= $k['id']; ?>"
                                            <?= old('kategori_id') == $k['id'] ? 'selected' : '' ?>>

                                            <?= esc($k['nama_kategori']); ?>

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

                                    <option value="hilang"
                                        <?= old('jenis') == 'hilang' ? 'selected' : '' ?>>

                                        Barang Hilang

                                    </option>

                                    <option value="ditemukan"
                                        <?= old('jenis') == 'ditemukan' ? 'selected' : '' ?>>

                                        Barang Ditemukan

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
                                    value="<?= old('lokasi') ?>"
                                    placeholder="Contoh : Gedung A Lantai 2">

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
                                    value="<?= old('tanggal_kejadian') ?>">

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
                                    value="<?= old('kontak') ?>"
                                    placeholder="08xxxxxxxxxx">

                            </div>

                            <!-- Foto -->

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Upload Foto Barang

                                </label>

                                <input
                                    type="file"
                                    name="foto_utama"
                                    class="form-control"
                                    accept="image/*">

                            </div>

                            <!-- Deskripsi -->

                            <div class="col-12 mb-4">

                                <label class="form-label">

                                    Deskripsi

                                </label>

                                <textarea
                                    name="deskripsi"
                                    class="form-control"
                                    rows="5"
                                    placeholder="Jelaskan ciri-ciri barang..."><?= old('deskripsi') ?></textarea>

                            </div>

                        </div>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="<?= base_url('barang') ?>"
                               class="btn btn-secondary">

                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary">

                                <i class="bi bi-save"></i>

                                Simpan Laporan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>