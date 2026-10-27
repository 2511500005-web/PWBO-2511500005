<div class="row">
    <div class="col-6">
        <h3>Tambah Pengembalian Buku</h3>
        <form action="<?php echo BASEURL; ?>/pengembalian/tambah" method="post">
            <div class="form-group">
                <label for="Kd_Kembali005">Kode Kembali (maks 5 karakter)</label>
                <input type="text" class="form-control" id="Kd_Kembali005" name="Kd_Kembali005" maxlength="5" required>
            </div>
            <div class="form-group">
                <label for="NimMhs005">NIM Mahasiswa (maks 10 karakter)</label>
                <input type="text" class="form-control" id="NimMhs005" name="NimMhs005" maxlength="10" required>
            </div>
            <div class="form-group">
                <label for="NmMhs005">Nama Mahasiswa (maks 30 karakter)</label>
                <input type="text" class="form-control" id="NmMhs005" name="NmMhs005" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="NmBuku005">Nama Buku (maks 20 karakter)</label>
                <input type="text" class="form-control" id="NmBuku005" name="NmBuku005" maxlength="20" required>
            </div>
            <div class="form-group">
                <label for="JumBuku005">Jumlah Buku</label>
                <input type="number" class="form-control" id="JumBuku005" name="JumBuku005" min="1" max="999" required>
            </div>
            <div class="form-group">
                <label for="TglKembali005">Tanggal Kembali</label>
                <input type="number" class="form-control" id="TglKembali005" name="TglKembali005" min="0" max="999" required>
            </div>
            <div class="form-group">
                <label for="Denda005">Denda</label>
                <input type="number" class="form-control" id="Denda005" name="Denda005" min="0" max="999" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo BASEURL; ?>/pengembalian/tampil" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>