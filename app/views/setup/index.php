<div class="row">
    <div class="col-6">
        <h3>Setup Database JSON</h3>
        <p>Jalankan satu per satu sesuai urutan:</p>
        <ol>
            <li><a href="<?php echo BASEURL; ?>/setup/migrate" class="btn btn-primary">Migrate</a></li>
            <li><a href="<?php echo BASEURL; ?>/setup/seed" class="btn btn-primary">Seed (isi data awal)</a></li>
            <li><a href="<?php echo BASEURL; ?>/setup/uji" class="btn btn-primary">Uji Coba</a></li>
            <li><a href="<?php echo BASEURL; ?>/setup/status" class="btn btn-secondary">Status</a></li>
            <li><a href="<?php echo BASEURL; ?>/setup/rollback" class="btn btn-secondary">Rollback</a></li>
            <li><a href="<?php echo BASEURL; ?>/setup/fresh" class="btn btn-danger">Fresh (hapus tabel migration lalu migrate ulang)</a></li>
        </ol>
    </div>
</div>