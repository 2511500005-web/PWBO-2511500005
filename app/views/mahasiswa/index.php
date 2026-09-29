<div class="container">
    <h3 class="mt-4">Daftar Mahasiswa</h3>
    <span class="badge-local"></span>

    <div class="mhs-grid">
        <?php foreach($data['mhs'] as $mhs) : ?>
            <div class="mhs-card">
                <h4><?php echo $mhs['nama']; ?></h4>
                <p><strong>NIM:</strong> <?php echo $mhs['nim']; ?></p>
                <p><strong>Email:</strong> <?php echo $mhs['email']; ?></p>
                <p><strong>Jurusan:</strong> <?php echo $mhs['jurusan']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
