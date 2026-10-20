<?php

class About extends Controller {
    public function index($nama = 'Dono', $pekerjaan = 'Pelawak') {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['judul'] = 'About Me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer', $data);
    }

    public function page() {
        $data['judul'] = 'My Pages';
        $this->view('templates/header', $data);
        $this->view('about/page', $data);
        $this->view('templates/footer', $data);
    }
}
