<div class="row">
    <div class="col-6">
        <h3>Tambah Mata Kuliah</h3>
        <form action="<?php echo BASEURL; ?>/matakuliah/tambah" method="post">
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" class="form-control" id="kode" name="kode" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="number" class="form-control" id="sks" name="sks" min="1" value="2" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo BASEURL; ?>/matakuliah/tampil" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
