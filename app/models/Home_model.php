<?php

class Home_model {
    //contoh sederhana model tanpa database, datanya langsung ditulis di dalam class
    private $profil = [
        'nama' => 'Melvyn'
    ];

    public function getNama()
    {
        return $this->profil['nama'];
    }
}
