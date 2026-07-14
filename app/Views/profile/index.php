<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">👤 Profil Saya</h4>
                </div>

                <div class="card-body">

                    <form action="<?= base_url('profile/update') ?>" method="post" enctype="multipart/form-data">

                        <?= csrf_field() ?>

                        <div class="text-center mb-4">

                            <?php if (!empty($user['foto'])) : ?>

                                <img
                                    src="<?= base_url('uploads/profile/' . $user['foto']) ?>"
                                    class="rounded-circle shadow"
                                    width="130"
                                    height="130"
                                    style="object-fit: cover;">

                            <?php else : ?>

                                <img
                                    src="https://ui-avatars.com/api/?name=<?= urlencode($user['nama'] ?? 'User') ?>&background=0D6EFD&color=fff&size=256"
                                    class="rounded-circle shadow"
                                    width="130"
                                    height="130">

                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Profil</label>
                            <input
                                type="file"
                                name="foto"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                value="<?= esc($user['nama'] ?? '') ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input
                                type="text"
                                name="nim"
                                class="form-control"
                                value="<?= esc($user['nim'] ?? '') ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fakultas</label>
                            <input
                                type="text"
                                name="fakultas"
                                class="form-control"
                                value="<?= esc($user['fakultas'] ?? '') ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Program Studi</label>
                            <input
                                type="text"
                                name="prodi"
                                class="form-control"
                                value="<?= esc($user['prodi'] ?? '') ?>">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">WhatsApp</label>
                            <input
                                type="text"
                                name="no_hp"
                                class="form-control"
                                value="<?= esc($user['no_hp'] ?? '') ?>">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            💾 Simpan Profil
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>