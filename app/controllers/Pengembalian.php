<?php

class Pengembalian extends Controller {
    private $kolomTeks = [
        'Kd_Kembali005' => 5,
        'NimMhs005'     => 10,
        'NmMhs005'      => 30,
        'NmBuku005'     => 20,
    ];

    private $kolomAngka = ['JumBuku005', 'TglKembali005', 'Denda005'];

    public function index() {
        $this->tampil();
    }

    public function tampil() {
        $data['judul'] = 'Pengembalian Buku';
        $data['pk'] = $this->model('Pengembalian_model')->getAllPengembalian();
        $this->view('templates/header', $data);
        $this->view('pengembalian/tampil', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id) {
        $data['judul'] = 'Detail Pengembalian Buku';
        $data['pk'] = $this->model('Pengembalian_model')->getPengembalianById($id);
        $this->view('templates/header', $data);
        $this->view('pengembalian/detail', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->ambilData();

            if (!$this->valid($data)) {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                $this->redirect('/pengembalian/tampil');
            }

            foreach ($this->kolomAngka as $kolom) {
                $data[$kolom] = (int) $data[$kolom];
            }

            $idBaru = $this->model('Pengembalian_model')->tambahPengembalian($data);

            if ($idBaru > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            }
            $this->redirect('/pengembalian/tampil');
        }

        $data['judul'] = 'Tambah Pengembalian Buku';
        $this->view('templates/header', $data);
        $this->view('pengembalian/tambah', $data);
        $this->view('templates/footer', $data);
    }

    public function ubah($id = null) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->ambilData();
            $data['id'] = $this->ambilPost('id');

            if ($data['id'] === '' || !$this->valid($data)) {
                Flasher::setFlash('gagal', 'diubah', 'danger');
                $this->redirect('/pengembalian/tampil');
            }

            foreach ($this->kolomAngka as $kolom) {
                $data[$kolom] = (int) $data[$kolom];
            }

            $jumlah = $this->model('Pengembalian_model')->ubahPengembalian($data);

            if ($jumlah > 0) {
                Flasher::setFlash('berhasil', 'diubah', 'success');
            } else {
                Flasher::setFlash('gagal', 'diubah', 'danger');
            }
            $this->redirect('/pengembalian/tampil');
        }

        $pk = $this->model('Pengembalian_model')->getPengembalianById($id);

        if (!$pk) {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            $this->redirect('/pengembalian/tampil');
        }

        $data['judul'] = 'Ubah Pengembalian Buku';
        $data['pk'] = $pk;
        $this->view('templates/header', $data);
        $this->view('pengembalian/ubah', $data);
        $this->view('templates/footer', $data);
    }

    public function hapus($id) {
        $jumlah = $this->model('Pengembalian_model')->hapusPengembalian($id);

        if ($jumlah > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        $this->redirect('/pengembalian/tampil');
    }

    private function ambilData() {
        $data = [];
        foreach ($this->kolomTeks as $kolom => $maks) {
            $data[$kolom] = $this->ambilPost($kolom);
        }
        foreach ($this->kolomAngka as $kolom) {
            $data[$kolom] = $this->ambilPost($kolom);
        }
        return $data;
    }

    private function valid($data) {
        foreach ($this->kolomTeks as $kolom => $maks) {
            if ($data[$kolom] === '' || strlen($data[$kolom]) > $maks) {
                return false;
            }
        }
        foreach ($this->kolomAngka as $kolom) {
            if ($data[$kolom] === '' || !ctype_digit($data[$kolom]) || strlen($data[$kolom]) > 3) {
                return false;
            }
        }
        return true;
    }

    private function ambilPost($kunci) {
        return isset($_POST[$kunci]) ? trim($_POST[$kunci]) : '';
    }

    private function redirect($path) {
        header('Location: ' . BASEURL . $path);
        exit;
    }
}