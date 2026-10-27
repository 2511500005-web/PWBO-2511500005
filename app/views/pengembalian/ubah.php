<div class="row">
    <div class="col-6">
        <h3>Ubah Pengembalian Buku</h3>
        <form action="<?php echo BASEURL; ?>/pengembalian/ubah" method="post">
            <input type="hidden" name="id" value="<?php echo e($data['pk']['id']); ?>">
            <div class="form-group">
                <label for="Kd_Kembali005">Kode Kembali (maks 5 karakter)</label>
                <input type="text" class="form-control" id="Kd_Kembali005" name="Kd_Kembali005" maxlength="5" value="<?php echo e($data['pk']['Kd_Kembali005']); ?>" required>
            </div>
            <div class="form-group">
                <label for="NimMhs005">NIM Mahasiswa (maks 10 karakter)</label>
                <input type="text" class="form-control" id="NimMhs005" name="NimMhs005" maxlength="10" value="<?php echo e($data['pk']['NimMhs005']); ?>" required>
            </div>
            <div class="form-group">
                <label for="NmMhs005">Nama Mahasiswa (maks 30 karakter)</label>
                <input type="text" class="form-control" id="NmMhs005" name="NmMhs005" maxlength="30" value="<?php echo e($data['pk']['NmMhs005']); ?>" required>
            </div>
            <div class="form-group">
                <label for="NmBuku005">Nama Buku (maks 20 karakter)</label>
                <input type="text" class="form-control" id="NmBuku005" name="NmBuku005" maxlength="20" value="<?php echo e($data['pk']['NmBuku005']); ?>" required>
            </div>
            <div class="form-group">
                <label for="JumBuku005">Jumlah Buku</label>
                <input type="number" class="form-control" id="JumBuku005" name="JumBuku005" min="1" max="999" value="<?php echo e($data['pk']['JumBuku005']); ?>" required>
            </div>
            <div class="form-group">
                <label for="TglKembali005">Tanggal Kembali</label>
                <input type="number" class="form-control" id="TglKembali005" name="TglKembali005" min="0" max="999" value="<?php echo e($data['pk']['TglKembali005']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Denda005">Denda</label>
                <input type="number" class="form-control" id="Denda005" name="Denda005" min="0" max="999" value="<?php echo e($data['pk']['Denda005']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?php echo BASEURL; ?>/pengembalian/tampil" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>