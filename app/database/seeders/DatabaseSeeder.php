<?php

class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call('JurusanSeeder');
        $this->call('MahasiswaAkademikSeeder');
    }
}