<?php

class Blueprint {
    private $kolom = [];
    private $terakhir = -1;

    private function tambah($nama, $tipe, $opsi = []) {
        $this->kolom[] = array_merge([
            'nama' => $nama,
            'tipe' => $tipe,
            'unik' => false,
            'nullable' => false,
            'referensi' => null,
            'saat_hapus' => null,
        ], $opsi);
        $this->terakhir = count($this->kolom) - 1;
        return $this;
    }

    public function id() {
        return $this->tambah('id', 'bigint', ['primary' => true, 'auto_increment' => true]);
    }

    public function string($nama, $panjang = 255) {
        return $this->tambah($nama, 'varchar', ['panjang' => $panjang]);
    }

    public function integer($nama) {
        return $this->tambah($nama, 'integer');
    }

    public function year($nama) {
        return $this->tambah($nama, 'year');
    }

    public function text($nama) {
        return $this->tambah($nama, 'text');
    }

    public function timestamps() {
        $this->tambah('created_at', 'timestamp');
        return $this->tambah('updated_at', 'timestamp');
    }

    public function foreignId($nama) {
        return $this->tambah($nama, 'bigint', ['foreign' => true]);
    }

    public function constrained($tabel) {
        $this->kolom[$this->terakhir]['referensi'] = $tabel;
        return $this;
    }

    public function restrictOnDelete() {
        $this->kolom[$this->terakhir]['saat_hapus'] = 'restrict';
        return $this;
    }

    public function unique() {
        $this->kolom[$this->terakhir]['unik'] = true;
        return $this;
    }

    public function nullable() {
        $this->kolom[$this->terakhir]['nullable'] = true;
        return $this;
    }

    public function kolom() {
        return $this->kolom;
    }
}

class Schema {
    public static function ambil() {
        if (!is_file(DATA_FILE)) {
            return [];
        }
        $isi = preg_replace('/^\xEF\xBB\xBF/', '', file_get_contents(DATA_FILE));
        $data = json_decode($isi, true);
        if (!is_array($data)) {
            die('File data.json rusak. Periksa isi file app/database/data.json.');
        }
        return $data;
    }

    public static function simpan($data) {
        file_put_contents(DATA_FILE, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
    }

    public static function create($tabel, $callback) {
        $blueprint = new Blueprint();
        $callback($blueprint);

        $data = self::ambil();
        $data['_schema'][$tabel] = $blueprint->kolom();
        if (!isset($data[$tabel])) {
            $data[$tabel] = [];
        }
        self::simpan($data);
    }

    public static function dropIfExists($tabel) {
        $data = self::ambil();
        unset($data[$tabel], $data['_schema'][$tabel]);
        self::simpan($data);
    }
}