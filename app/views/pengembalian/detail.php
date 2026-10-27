<div class="row">
    <div class="col-6 mt-5">
        <?php if ($data['pk']) : $pk = $data['pk']; ?>
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($pk['NmBuku005']); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo e($pk['Kd_Kembali005']); ?></h6>
                    <p class="card-text">NIM: <?php echo e($pk['NimMhs005']); ?></p>
                    <p class="card-text">Nama: <?php echo e($pk['NmMhs005']); ?></p>
                    <p class="card-text">Jumlah buku: <?php echo e($pk['JumBuku005']); ?></p>
                    <p class="card-text">Tanggal kembali: <?php echo e($pk['TglKembali005']); ?></p>
                    <p class="card-text">Denda: <?php echo e($pk['Denda005']); ?></p>
                    <a href="<?php echo BASEURL; ?>/pengembalian/tampil" class="card-link">Kembali</a>
                </div>
            </div>
        <?php else : ?>
            <p>Data pengembalian tidak ditemukan.</p>
            <a href="<?php echo BASEURL; ?>/pengembalian/tampil" class="card-link">Kembali</a>
        <?php endif; ?>
    </div>
</div>