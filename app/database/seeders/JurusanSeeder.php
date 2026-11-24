<?php

require_once __DIR__ . '/../../models/Jurusan_model.php';

class JurusanSeeder extends Seeder {
    public function run() {
        if (Jurusan_model::count() > 0) {
            return;
        }
        Jurusan_model::create(['nama_jurusan' => 'Teknik Informatika']);
        Jurusan_model::create(['nama_jurusan' => 'Sistem Informasi']);
        Jurusan_model::create(['nama_jurusan' => 'Manajemen Informatika']);
    }
}