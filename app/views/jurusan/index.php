<div class="row">
    <div class="col-6">
        <h3>Filter Jurusan: <?php echo e($data['kode']); ?></h3>

        <p>
            <a href="<?php echo BASEURL; ?>/jurusan" class="btn btn-secondary">Semua Jurusan</a>
            <a href="<?php echo BASEURL; ?>/jurusan/Informatika" class="btn btn-primary">Informatika</a>
            <a href="<?php echo BASEURL; ?>/jurusan/Sistem%20Informasi" class="btn btn-primary">Sistem Informasi</a>
        </p>

        <?php if (count($data['mhs']) > 0) : ?>
            <div class="table-responsive">
                <table class="tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['mhs'] as $i => $mhs) : ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo e($mhs['nim']); ?></td>
                                <td><?php echo e($mhs['nama']); ?></td>
                                <td><?php echo e($mhs['jurusan']); ?></td>
                                <td>
                                    <a href="<?php echo BASEURL; ?>/mahasiswa/nim/<?php echo e($mhs['nim']); ?>">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p>Belum ada data mahasiswa untuk jurusan ini.</p>
        <?php endif; ?>
    </div>
</div>