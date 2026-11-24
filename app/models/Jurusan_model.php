<?php

class Jurusan_model extends Model {
    protected static $tabel = 'jurusan';
    protected static $fillable = ['nama_jurusan'];

    public function mahasiswas() {
        require_once __DIR__ . '/MahasiswaAkademik_model.php';
        return $this->hasMany('MahasiswaAkademik_model', 'jurusan_id');
    }

    protected function cekRestrict() {
        if (count($this->mahasiswas()) > 0) {
            throw new Exception('Jurusan tidak bisa dihapus karena masih memiliki mahasiswa.');
        }
    }
}