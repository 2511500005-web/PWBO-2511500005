<div class="row">
    <div class="col-6 mt-5">
        <?php if ($data['mk']) : $mk = $data['mk']; ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($mk['nama']); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo e($mk['kode']); ?></h6>
                    <p class="card-text">SKS: <?php echo e($mk['sks']); ?></p>
                    <a href="<?php echo BASEURL; ?>/matakuliah/tampil" class="card-link">Kembali</a>
                </div>
            </div>
        <?php else : ?>
            <p>Data mata kuliah tidak ditemukan.</p>
            <a href="<?php echo BASEURL; ?>/matakuliah/tampil" class="card-link">Kembali</a>
        <?php endif; ?>
    </div>
</div>
