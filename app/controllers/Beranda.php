<?php

class Beranda extends Controller {
    public function index() {
        $data['judul'] = 'Beranda';
        $this->view('templates/header', $data);
        $this->view('beranda/index', $data);
        $this->view('templates/footer', $data);
    }
}