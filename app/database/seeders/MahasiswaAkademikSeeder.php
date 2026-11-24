<?php

require_once __DIR__ . '/../../models/MahasiswaAkademik_model.php';

class MahasiswaAkademikSeeder extends Seeder {
    public function run() {
        if (MahasiswaAkademik_model::count() > 0) {
            return;
        }

        MahasiswaAkademik_model::create([
            'jurusan_id' => 1,
            'nim' => '23001',
            'nama' => 'Andi Saputra',
            'angkatan' => 2023,
            'semester' => 6,
            'alamat' => 'Jl. Merdeka No. 1',
        ]);

        MahasiswaAkademik_model::factory(20)->create();
    }
}