<?php

class Migrator {
    public static function folder() {
        return __DIR__ . '/../database/migrations';
    }

    public static function semua() {
        $file = glob(self::folder() . '/*.php');
        sort($file);
        return $file;
    }

    private static function sudah() {
        $data = Schema::ambil();
        return isset($data['_migrations']) ? $data['_migrations'] : [];
    }

    private static function simpanSudah($daftar) {
        $data = Schema::ambil();
        $data['_migrations'] = array_values($daftar);
        Schema::simpan($data);
    }

    private static function namaDari($daftar) {
        return array_map(function ($m) {
            return $m['nama'];
        }, $daftar);
    }

    public static function migrate() {
        $daftar = self::sudah();
        $sudahAda = self::namaDari($daftar);
        $batch = $daftar ? max(array_column($daftar, 'batch')) + 1 : 1;
        $jumlah = 0;

        foreach (self::semua() as $file) {
            $nama = basename($file, '.php');
            if (in_array($nama, $sudahAda)) {
                continue;
            }
            $migrasi = require $file;
            $migrasi->up();
            $daftar[] = ['nama' => $nama, 'batch' => $batch];
            self::simpanSudah($daftar);
            $sudahAda[] = $nama;
            echo "Migrated: $nama\n";
            $jumlah++;
        }

        if ($jumlah === 0) {
            echo "Nothing to migrate.\n";
        }
    }

    public static function rollback() {
        $daftar = self::sudah();
        if (!$daftar) {
            echo "Nothing to rollback.\n";
            return;
        }

        $batchTerakhir = max(array_column($daftar, 'batch'));
        $akanDibatalkan = [];
        foreach ($daftar as $m) {
            if ($m['batch'] === $batchTerakhir) {
                $akanDibatalkan[] = $m['nama'];
            }
        }
        rsort($akanDibatalkan);

        foreach ($akanDibatalkan as $nama) {
            $migrasi = require self::folder() . '/' . $nama . '.php';
            $migrasi->down();
            echo "Rolled back: $nama\n";
        }

        $sisa = array_filter($daftar, function ($m) use ($batchTerakhir) {
            return $m['batch'] !== $batchTerakhir;
        });
        self::simpanSudah($sisa);
    }

    public static function fresh() {
        $data = Schema::ambil();
        $tabel = isset($data['_schema']) ? array_keys($data['_schema']) : [];
        foreach ($tabel as $t) {
            Schema::dropIfExists($t);
        }

        $data = Schema::ambil();
        unset($data['_migrations']);
        Schema::simpan($data);

        echo "Tabel migration dihapus.\n";
        self::migrate();
    }

    public static function status() {
        $sudahAda = self::namaDari(self::sudah());
        foreach (self::semua() as $file) {
            $nama = basename($file, '.php');
            echo (in_array($nama, $sudahAda) ? 'Ran     ' : 'Pending ') . $nama . "\n";
        }
    }
}