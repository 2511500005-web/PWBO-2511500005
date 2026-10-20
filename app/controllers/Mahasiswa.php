<?php

class Mahasiswa extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id) {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/mahasiswa');
        }

        $data = [
            'nim'     => $this->ambilPost('nim'),
            'nama'    => $this->ambilPost('nama'),
            'email'   => $this->ambilPost('email'),
            'jurusan' => $this->ambilPost('jurusan'),
        ];

        if ($data['nim'] === '' || $data['nama'] === '') {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            $this->redirect('/mahasiswa');
        }

        $idBaru = $this->model('Mahasiswa_model')->tambahDataMahasiswa($data);

        if ($idBaru > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        }
        $this->redirect('/mahasiswa');
    }

    public function getUbah() {
        $id = $this->ambilPost('id');
        $mhs = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        header('Content-Type: application/json');
        echo json_encode($mhs);
        exit;
    }

    public function ubah() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/mahasiswa');
        }

        $data = [
            'id'      => $this->ambilPost('id'),
            'nim'     => $this->ambilPost('nim'),
            'nama'    => $this->ambilPost('nama'),
            'email'   => $this->ambilPost('email'),
            'jurusan' => $this->ambilPost('jurusan'),
        ];

        if ($data['id'] === '' || $data['nim'] === '' || $data['nama'] === '') {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            $this->redirect('/mahasiswa');
        }

        $jumlah = $this->model('Mahasiswa_model')->ubahDataMahasiswa($data);

        if ($jumlah > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        $this->redirect('/mahasiswa');
    }

    public function hapus($id) {
        $jumlah = $this->model('Mahasiswa_model')->hapusDataMahasiswa($id);

        if ($jumlah > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        $this->redirect('/mahasiswa');
    }

    private function ambilPost($kunci) {
        return isset($_POST[$kunci]) ? trim($_POST[$kunci]) : '';
    }

    private function redirect($path) {
        header('Location: ' . BASEURL . $path);
        exit;
    }
}
