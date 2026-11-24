<?php

class Setup extends Controller {
    public function index() {
        $data['judul'] = 'Setup Database JSON';
        $this->view('templates/header', $data);
        $this->view('setup/index', $data);
        $this->view('templates/footer', $data);
    }

    public function migrate() {
        $this->jalankan('Migrate', function () {
            Migrator::migrate();
        });
    }

    public function status() {
        $this->jalankan('Status', function () {
            Migrator::status();
        });
    }

    public function rollback() {
        $this->jalankan('Rollback', function () {
            Migrator::rollback();
        });
    }

    public function fresh() {
        $this->jalankan('Fresh', function () {
            Migrator::fresh();
        });
    }

    public function seed() {
        $this->jalankan('Seed', function () {
            $this->seeder();
        });
    }

    public function uji() {
        $this->jalankan('Uji Coba', function () {
            $this->ujiCoba();
        });
    }

    private function jalankan($judul, $callback) {
        $data['judul'] = $judul;
        $this->view('templates/header', $data);

        echo '<h3>' . e($judul) . '</h3>';
        ob_start();
        try {
            $callback();
        } catch (Throwable $e) {
            echo 'Error: ' . $e->getMessage() . "\n";
        }
        $keluaran = ob_get_clean();

        echo '<pre>' . e($keluaran) . '</pre>';
        echo '<p><a href="' . BASEURL . '/setup">Kembali ke menu setup</a></p>';
        $this->view('templates/footer', $data);
    }

    private function seeder() {
        require_once __DIR__ . '/../database/seeders/DatabaseSeeder.php';
        (new DatabaseSeeder())->run();
        echo "Seeding selesai.\n";
    }

    private function ujiCoba() {
        require_once __DIR__ . '/../models/Jurusan_model.php';
        require_once __DIR__ . '/../models/MahasiswaAkademik_model.php';

        echo 'Jumlah jurusan: ' . Jurusan_model::count() . "\n";
        echo 'Jumlah mahasiswa: ' . MahasiswaAkademik_model::count() . "\n";

        $m = MahasiswaAkademik_model::find(1);
        echo 'find(1): ' . ($m ? $m->nama : 'tidak ada') . "\n";
        echo 'Jurusan dari mahasiswa 1: ' . ($m && $m->jurusan() ? $m->jurusan()->nama_jurusan : '-') . "\n";

        $j = Jurusan_model::find(1);
        echo 'Mahasiswa pada jurusan 1: ' . ($j ? count($j->mahasiswas()) : 0) . "\n";

        $halaman = MahasiswaAkademik_model::paginate(10);
        echo 'Paginate halaman 1: ' . count($halaman['data']) . " data (total " . $halaman['total'] . ")\n";

        try {
            MahasiswaAkademik_model::create([
                'jurusan_id' => 99,
                'nim' => 'UJI99',
                'nama' => 'Tes',
                'angkatan' => 2025,
                'semester' => 1,
            ]);
            echo "Foreign key: GAGAL, seharusnya ditolak\n";
        } catch (Throwable $e) {
            echo "Foreign key: BERHASIL ditolak -> " . $e->getMessage() . "\n";
        }

        try {
            $j->delete();
            echo "Restrict: GAGAL, seharusnya ditolak\n";
        } catch (Throwable $e) {
            echo "Restrict: BERHASIL ditolak -> " . $e->getMessage() . "\n";
        }
    }
}