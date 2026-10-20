<?php

class Mahasiswa_model {
    private $tabel = 'mahasiswa';
    private $db;

    public function __construct() {
        $this->db = new JsonDb;
    }

    public function getAllMahasiswa() {
        return $this->db->semua($this->tabel);
    }

    public function getMahasiswaById($id) {
        return $this->db->cari($this->tabel, $id);
    }

    public function tambahDataMahasiswa($data) {
        return $this->db->tambah($this->tabel, [
            'nim'     => $data['nim'],
            'nama'    => $data['nama'],
            'email'   => $data['email'],
            'jurusan' => $data['jurusan'],
        ], ['nim']);
    }

    public function ubahDataMahasiswa($data) {
        return $this->db->ubah($this->tabel, $data['id'], [
            'nim'     => $data['nim'],
            'nama'    => $data['nama'],
            'email'   => $data['email'],
            'jurusan' => $data['jurusan'],
        ], ['nim']);
    }

    public function hapusDataMahasiswa($id) {
        return $this->db->hapus($this->tabel, $id);
    }
}
