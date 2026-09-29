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

    //ambil 1 data mahasiswa berdasarkan nim
    public function getMahasiswaByNim($nim)
    {
        $mhs = $this->getAllMahasiswa();
        foreach($mhs as $item){
            if($item['nim'] == $nim){
                return $item;
            }
        }
        return null;
    }

    //tambah data mahasiswa baru ke file JSON (contoh method CRUD sederhana)
    public function addMahasiswa($data)
    {
        $mhs = $this->getAllMahasiswa();
        $mhs[] = $data;
        file_put_contents($this->file, json_encode($mhs, JSON_PRETTY_PRINT));
        return true;
    }
}
