<div class="row">
    <div class="col-6">
        <?php Flasher::flash(); ?>

        <a href="<?php echo BASEURL; ?>/matakuliah/tambah" class="btn btn-primary">Tambah Mata Kuliah</a>

        <h3 class="mt-4">Daftar Mata Kuliah</h3>
        <ul class="list-group">
            <?php foreach ($data['mk'] as $mk) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e($mk['nama']); ?>
                    <span>
                        <a href="<?php echo BASEURL; ?>/matakuliah/detail/<?php echo e($mk['id']); ?>" class="badge badge-primary badge-pill">detail</a>
                        <a href="<?php echo BASEURL; ?>/matakuliah/hapus/<?php echo e($mk['id']); ?>" class="badge badge-danger badge-pill ml-1" onclick="return confirm('Yakin?');">hapus</a>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
