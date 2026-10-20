<?php

class Matakuliah extends Controller {
    public function index() {
        $this->tampil();
    }

    public function tampil() {
        $data['judul'] = 'Daftar Mata Kuliah';
        $data['mk'] = $this->model('Matakuliah_model')->getAllMatakuliah();
        $this->view('templates/header', $data);
        $this->view('matakuliah/tampil', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id) {
        $data['judul'] = 'Detail Mata Kuliah';
        $data['mk'] = $this->model('Matakuliah_model')->getMatakuliahById($id);
        $this->view('templates/header', $data);
        $this->view('matakuliah/detail', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'kode' => $this->ambilPost('kode'),
                'nama' => $this->ambilPost('nama'),
                'sks'  => (int) $this->ambilPost('sks'),
            ];

            if ($data['kode'] === '' || $data['nama'] === '' || $data['sks'] < 1) {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                $this->redirect('/matakuliah/tampil');
            }

            $idBaru = $this->model('Matakuliah_model')->tambahMatakuliah($data);

            if ($idBaru > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            }
            $this->redirect('/matakuliah/tampil');
        }

        $data['judul'] = 'Tambah Mata Kuliah';
        $this->view('templates/header', $data);
        $this->view('matakuliah/tambah', $data);
        $this->view('templates/footer', $data);
    }

    public function hapus($id) {
        $jumlah = $this->model('Matakuliah_model')->hapusMatakuliah($id);

        if ($jumlah > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        $this->redirect('/matakuliah/tampil');
    }

    private function ambilPost($kunci) {
        return isset($_POST[$kunci]) ? trim($_POST[$kunci]) : '';
    }

    private function redirect($path) {
        header('Location: ' . BASEURL . $path);
        exit;
    }
}
