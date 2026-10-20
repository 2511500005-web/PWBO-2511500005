<div class="row">
    <div class="col-6">
        <?php Flasher::flash(); ?>

        <!-- Tombol pemicu modal tambah data -->
        <button type="button" class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#formModal">
            Tambah Data Mahasiswa
        </button>

        <h3 class="mt-4">Daftar Mahasiswa</h3>
        <ul class="list-group">
            <?php foreach ($data['mhs'] as $mhs) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e($mhs['nama']); ?>
                    <span>
                        <a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo e($mhs['id']); ?>" class="badge badge-primary badge-pill">detail</a>
                        <a href="#" data-id="<?php echo e($mhs['id']); ?>" class="badge badge-success badge-pill ml-1 tampil-modal-ubah" data-toggle="modal" data-target="#formModal">ubah</a>
                        <a href="<?php echo BASEURL; ?>/mahasiswa/hapus/<?php echo e($mhs['id']); ?>" class="badge badge-danger badge-pill ml-1" onclick="return confirm('Yakin?');">hapus</a>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- Modal form tambah dan ubah data (isinya diatur oleh mahasiswa.js) -->
<div class="modal" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" id="formMahasiswa" action="<?php echo BASEURL; ?>/mahasiswa/tambah" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="formId" name="id">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="tombolSubmit">Tambah Data</button>
            </div>
        </form>
    </div>
</div>
