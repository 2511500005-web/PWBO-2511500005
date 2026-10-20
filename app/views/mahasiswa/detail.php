<div class="row">
    <div class="col-6 mt-5">
        <?php if ($data['mhs']) : $mhs = $data['mhs']; ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($mhs['nama']); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo e($mhs['nim']); ?></h6>
                    <p class="card-text"><?php echo e($mhs['email']); ?></p>
                    <p class="card-text"><?php echo e($mhs['jurusan']); ?></p>
                    <a href="<?php echo BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
                </div>
            </div>
        <?php else : ?>
            <p>Data mahasiswa tidak ditemukan.</p>
            <a href="<?php echo BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
        <?php endif; ?>
    </div>
</div>
