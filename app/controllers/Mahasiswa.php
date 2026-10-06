<?php

class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    //method ini dipanggil saat form "Tambah Data Mahasiswa" di-submit
    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'nama'    => htmlspecialchars($_POST['nama']),
                'nim'     => htmlspecialchars($_POST['nim']),
                'email'   => htmlspecialchars($_POST['email']),
                'jurusan' => htmlspecialchars($_POST['jurusan']),
            ];

            $this->model('Mahasiswa_model')->addMahasiswa($data);
        }

        //setelah data ditambahkan, kembali lagi ke halaman daftar mahasiswa
        header('Location: '.BASEURL.'/mahasiswa');
        exit;
    }

    //method ini dipanggil saat tombol "Hapus" diklik
    public function delete($id)
    {
        $this->model('Mahasiswa_model')->deleteMahasiswa($id);

        //setelah data dihapus, kembali lagi ke halaman daftar mahasiswa
        header('Location: '.BASEURL.'/mahasiswa');
        exit;
    }
}
