<?php

class Faker {
    private $unik = false;
    private static $terpakai = [];
    private static $namaDepan = ['Andi', 'Budi', 'Citra', 'Dedi', 'Eka', 'Fajar', 'Gita', 'Hadi', 'Indah', 'Joko', 'Kartika', 'Lina', 'Made', 'Nina', 'Oka', 'Putra', 'Rina', 'Sari', 'Tono', 'Wati'];
    private static $namaBelakang = ['Saputra', 'Santoso', 'Lestari', 'Kurniawan', 'Wijaya', 'Pratama', 'Hidayat', 'Nugroho', 'Setiawan', 'Utami', 'Rahayu', 'Siregar'];
    private static $jalan = ['Jl. Merdeka', 'Jl. Sudirman', 'Jl. Ahmad Yani', 'Jl. Diponegoro', 'Jl. Gatot Subroto', 'Jl. Imam Bonjol', 'Jl. Pahlawan'];
    private static $kota = ['Batam', 'Tanjungpinang', 'Medan', 'Pekanbaru', 'Jakarta', 'Bandung', 'Surabaya'];

    public function unique() {
        $this->unik = true;
        return $this;
    }

    public function name() {
        return self::$namaDepan[array_rand(self::$namaDepan)] . ' ' . self::$namaBelakang[array_rand(self::$namaBelakang)];
    }

    public function address() {
        return self::$jalan[array_rand(self::$jalan)] . ' No. ' . mt_rand(1, 200) . ', ' . self::$kota[array_rand(self::$kota)];
    }

    public function numberBetween($min, $max) {
        return mt_rand($min, $max);
    }

    public function numerify($pola) {
        do {
            $hasil = preg_replace_callback('/#/', function () {
                return mt_rand(0, 9);
            }, $pola);
        } while ($this->unik && isset(self::$terpakai[$hasil]));

        if ($this->unik) {
            self::$terpakai[$hasil] = true;
        }
        $this->unik = false;
        return $hasil;
    }
}