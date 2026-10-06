<?php

class Mahasiswa_model {
    //Model ini TIDAK memakai database (MySQL/phpMyAdmin) sama sekali.
    //Data mahasiswa disimpan secara lokal di dalam file JSON
    //yang ada di app/data/mahasiswa.json, jadi cukup modal PHP + Laragon saja.

    private $file; //path menuju file penyimpanan lokal

    public function __construct()
    {
        $this->file = '../app/data/mahasiswa.json';

        //kalau file penyimpanan belum ada, otomatis dibuatkan file kosong (array [])
        if(!file_exists($this->file)){
            file_put_contents($this->file, json_encode([]));
        }
    }

    //ambil semua data mahasiswa dari file JSON
    public function getAllMahasiswa()
    {
        $json = file_get_contents($this->file);
        return json_decode($json, true); //true supaya hasilnya berupa array asosiatif
    }

    //ambil 1 data mahasiswa berdasarkan id (dipakai untuk halaman detail)
    public function getMahasiswaById($id)
    {
        $mhs = $this->getAllMahasiswa();
        foreach($mhs as $item){
            if($item['id'] == $id){
                return $item;
            }
        }
        return null;
    }

    //tambah data mahasiswa baru ke file JSON (pertemuan 10 - Insert Data)
    public function addMahasiswa($data)
    {
        $mhs = $this->getAllMahasiswa();

        //cari id terbesar yang sudah ada, lalu +1 (pengganti AUTO_INCREMENT di MySQL)
        $maxId = 0;
        foreach($mhs as $item){
            if($item['id'] > $maxId){
                $maxId = $item['id'];
            }
        }
        $data['id'] = $maxId + 1;

        $mhs[] = $data;
        file_put_contents($this->file, json_encode($mhs, JSON_PRETTY_PRINT));
        return true;
    }

    //hapus data mahasiswa berdasarkan id (pertemuan 11 - Delete Data)
    public function deleteMahasiswa($id)
    {
        $mhs = $this->getAllMahasiswa();

        //buang item yang id-nya cocok, lalu rapikan ulang index array-nya
        $mhsBaru = array_values(array_filter($mhs, function($item) use ($id) {
            return $item['id'] != $id;
        }));

        file_put_contents($this->file, json_encode($mhsBaru, JSON_PRETTY_PRINT));
        return true;
    }
}
