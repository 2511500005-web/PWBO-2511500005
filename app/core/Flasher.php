<?php

class Flasher {
    public static function setFlash($pesan, $aksi, $tipe) {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'tipe'  => $tipe,
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            $pesan = htmlspecialchars($_SESSION['flash']['pesan'], ENT_QUOTES, 'UTF-8');
            $aksi  = htmlspecialchars($_SESSION['flash']['aksi'], ENT_QUOTES, 'UTF-8');
            $tipe  = htmlspecialchars($_SESSION['flash']['tipe'], ENT_QUOTES, 'UTF-8');

            echo '<div class="alert alert-' . $tipe . ' alert-dismissible" role="alert">
                    Data <strong>' . $pesan . '</strong> ' . $aksi . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';

            unset($_SESSION['flash']);
        }
    }
}
