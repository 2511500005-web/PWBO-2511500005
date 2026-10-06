<div class="container mt-5">
    <?php if($data['mhs']) : ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['mhs']['nama']; ?></h5>
                <h6 class="card-subtitle"><?php echo $data['mhs']['nim']; ?></h6>
                <p class="card-text"><?php echo $data['mhs']['email']; ?></p>
                <p class="card-text"><?php echo $data['mhs']['jurusan']; ?></p>
                <a href="<?php echo BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
            </div>
        </div>
    <?php else : ?>
        <p>Data mahasiswa tidak ditemukan.</p>
        <a href="<?php echo BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
    <?php endif; ?>
</div>
