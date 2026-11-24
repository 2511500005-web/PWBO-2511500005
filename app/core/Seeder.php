<?php

abstract class Seeder {
    public function call($kelas) {
        require_once __DIR__ . '/../database/seeders/' . $kelas . '.php';
        $seeder = new $kelas();
        $seeder->run();
    }
}