<?php

class Pengembalian_model {
    private $tabel = '2511500005Pengembalian';
    private $db;

    public function __construct() {
        $this->db = new JsonDb;
    }

    public function getAllPengembalian() {
        return $this->db->semua($this->tabel);
    }

    public function getPengembalianById($id) {
        return $this->db->cari($this->tabel, $id);
    }

    public function tambahPengembalian($data) {
        return $this->db->tambah($this->tabel, $data, ['Kd_Kembali005']);
    }

    public function ubahPengembalian($data) {
        $id = $data['id'];
        unset($data['id']);
        return $this->db->ubah($this->tabel, $id, $data, ['Kd_Kembali005']);
    }

    public function hapusPengembalian($id) {
        return $this->db->hapus($this->tabel, $id);
    }
}