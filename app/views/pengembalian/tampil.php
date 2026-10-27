<?php Flasher::flash(); ?>

<a href="<?php echo BASEURL; ?>/pengembalian/tambah" class="btn btn-primary">Tambah Pengembalian Buku</a>

<h3 class="mt-4">Daftar Pengembalian Buku</h3>

<div class="table-responsive">
    <table class="tabel">
        <thead>
            <tr>
                <th>Kode</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Buku</th>
                <th>Jumlah</th>
                <th>Tgl Kembali</th>
                <th>Denda</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data['pk'])) : ?>
                <tr>
                    <td colspan="8">Belum ada data pengembalian.</td>
                </tr>
            <?php endif; ?>

            <?php foreach ($data['pk'] as $pk) : ?>
                <tr>
                    <td><?php echo e($pk['Kd_Kembali005']); ?></td>
                    <td><?php echo e($pk['NimMhs005']); ?></td>
                    <td><?php echo e($pk['NmMhs005']); ?></td>
                    <td><?php echo e($pk['NmBuku005']); ?></td>
                    <td><?php echo e($pk['JumBuku005']); ?></td>
                    <td><?php echo e($pk['TglKembali005']); ?></td>
                    <td><?php echo e($pk['Denda005']); ?></td>
                    <td>
                        <a href="<?php echo BASEURL; ?>/pengembalian/detail/<?php echo e($pk['id']); ?>" class="badge badge-primary badge-pill">detail</a>
                        <a href="<?php echo BASEURL; ?>/pengembalian/ubah/<?php echo e($pk['id']); ?>" class="badge badge-success badge-pill ml-1">ubah</a>
                        <a href="<?php echo BASEURL; ?>/pengembalian/hapus/<?php echo e($pk['id']); ?>" class="badge badge-danger badge-pill ml-1" onclick="return confirm('Yakin?');">hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>