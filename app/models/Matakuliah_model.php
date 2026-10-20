<?php

class Matakuliah_model {
    private $tabel = 'matakuliah';
    private $db;

    public function __construct() {
        $this->db = new JsonDb;
    }

    public function getAllMatakuliah() {
        return $this->db->semua($this->tabel);
    }

    public function getMatakuliahById($id) {
        return $this->db->cari($this->tabel, $id);
    }

    public function tambahMatakuliah($data) {
        return $this->db->tambah($this->tabel, [
            'kode' => $data['kode'],
            'nama' => $data['nama'],
            'sks'  => (int) $data['sks'],
        ], ['kode']);
    }

    public function hapusMatakuliah($id) {
        return $this->db->hapus($this->tabel, $id);
    }
}
