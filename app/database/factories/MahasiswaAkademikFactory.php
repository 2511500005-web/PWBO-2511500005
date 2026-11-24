<?php

require_once __DIR__ . '/../../models/Jurusan_model.php';

class MahasiswaAkademikFactory extends Factory {
    protected $model = 'MahasiswaAkademik_model';

    public function definition() {
        $jurusan = Jurusan_model::all();

        return [
            'jurusan_id' => $jurusan[array_rand($jurusan)]->id,
            'nim' => $this->faker->unique()->numerify('240####'),
            'nama' => $this->faker->name(),
            'angkatan' => $this->faker->numberBetween(2022, 2025),
            'semester' => $this->faker->numberBetween(1, 8),
            'alamat' => $this->faker->address(),
        ];
    }
}