<?php

abstract class Factory {
    protected $model;
    protected $faker;
    protected $jumlah = 1;

    public function __construct() {
        $this->faker = new Faker();
    }

    public function count($jumlah) {
        $this->jumlah = $jumlah;
        return $this;
    }

    abstract public function definition();

    public function create() {
        $kelas = $this->model;
        $hasil = [];
        for ($i = 0; $i < $this->jumlah; $i++) {
            $hasil[] = $kelas::create($this->definition());
        }
        return $hasil;
    }
}