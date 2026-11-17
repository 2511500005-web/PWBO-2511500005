<?php

class Jurusan extends Controller {
    public function index($kode = 'Semua Jurusan') {
        $semua = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $hasil = [];

        foreach ($semua as $mhs) {
            if ($kode === 'Semua Jurusan' || stripos($mhs['jurusan'], $kode) !== false) {
                $hasil[] = $mhs;
            }
        }

        $data['judul'] = 'Filter Jurusan';
        $data['kode'] = $kode;
        $data['mhs'] = $hasil;
        $this->view('templates/header', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer', $data);
    }
}