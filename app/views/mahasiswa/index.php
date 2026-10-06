<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <button type="button" class="btn" onclick="document.getElementById('modalTambah').classList.add('show')">
                Tambah Data Mahasiswa
            </button>

            <h3 class="mt-3">Daftar Mahasiswa</h3>

            <ul class="list-group">
                <?php foreach($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo $mhs['id']; ?>" class="nama-link">
                            <?php echo $mhs['nama']; ?>
                        </a>
                        <span class="aksi-group">
                            <a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo $mhs['id']; ?>" class="badge badge-primary">
                                Detail
                            </a>
                            <a href="<?php echo BASEURL; ?>/mahasiswa/delete/<?php echo $mhs['id']; ?>"
                               class="badge badge-danger"
                               onclick="return confirm('Yakin mau menghapus data <?php echo $mhs['nama']; ?>?')">
                                Hapus
                            </a>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- ============ MODAL TAMBAH DATA (custom, tanpa Bootstrap JS) ============ -->
<div class="modal-overlay" id="modalTambah">
    <div class="modal-box">
        <div class="modal-header">
            <h5>Tambah Data Mahasiswa</h5>
            <button type="button" class="modal-close" onclick="document.getElementById('modalTambah').classList.remove('show')">&times;</button>
        </div>
        <form action="<?php echo BASEURL; ?>/mahasiswa/store" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('modalTambah').classList.remove('show')">Batal</button>
                <button type="submit" class="btn">Simpan</button>
            </div>
        </form>
    </div>
</div>
