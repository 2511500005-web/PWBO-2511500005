<?php

require_once __DIR__ . '/Jurusan_model.php';

class MahasiswaAkademik_model extends Model {
    protected static $tabel = 'mahasiswa_akademik';
    protected static $fillable = ['jurusan_id', 'nim', 'nama', 'angkatan', 'semester', 'alamat'];
    protected static $unik = ['nim'];
    protected static $foreign = ['jurusan_id' => 'Jurusan_model'];

    public function jurusan() {
        return $this->belongsTo('Jurusan_model', 'jurusan_id');
    }

    public static function factory($jumlah = 1) {
        require_once __DIR__ . '/../database/factories/MahasiswaAkademikFactory.php';
        return (new MahasiswaAkademikFactory())->count($jumlah);
    }
}