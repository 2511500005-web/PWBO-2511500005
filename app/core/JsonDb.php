<?php

class JsonDb {
    private function baca() {
        if (!is_file(DATA_FILE)) {
            return [];
        }

        $isi = file_get_contents(DATA_FILE);
        $isi = preg_replace('/^\xEF\xBB\xBF/', '', $isi);
        $data = json_decode($isi, true);

        if (!is_array($data)) {
            die('File data.json rusak. Periksa isi file app/database/data.json.');
        }
        return $data;
    }

    private function tulis($data) {
        $isi = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents(DATA_FILE, $isi, LOCK_EX);
    }

    public function semua($tabel) {
        $data = $this->baca();
        return isset($data[$tabel]) ? $data[$tabel] : [];
    }

    public function cari($tabel, $id) {
        foreach ($this->semua($tabel) as $baris) {
            if ((string) $baris['id'] === (string) $id) {
                return $baris;
            }
        }
        return false;
    }

    public function tambah($tabel, $baris, $unik = []) {
        $data = $this->baca();
        $list = isset($data[$tabel]) ? $data[$tabel] : [];

        if ($this->adaKembar($list, $baris, $unik, null)) {
            return 0;
        }

        $idBaru = 1;
        foreach ($list as $item) {
            if ((int) $item['id'] >= $idBaru) {
                $idBaru = (int) $item['id'] + 1;
            }
        }

        $baris['id'] = $idBaru;
        $list[] = $baris;
        $data[$tabel] = $list;
        $this->tulis($data);
        return $idBaru;
    }

    public function ubah($tabel, $id, $baris, $unik = []) {
        $data = $this->baca();
        $list = isset($data[$tabel]) ? $data[$tabel] : [];

        if ($this->adaKembar($list, $baris, $unik, $id)) {
            return 0;
        }

        foreach ($list as $i => $item) {
            if ((string) $item['id'] === (string) $id) {
                $list[$i] = array_merge($item, $baris);
                $list[$i]['id'] = $item['id'];
                $data[$tabel] = $list;
                $this->tulis($data);
                return 1;
            }
        }
        return 0;
    }

    public function hapus($tabel, $id) {
        $data = $this->baca();
        $list = isset($data[$tabel]) ? $data[$tabel] : [];

        $sisa = [];
        $dihapus = 0;
        foreach ($list as $item) {
            if ((string) $item['id'] === (string) $id) {
                $dihapus++;
                continue;
            }
            $sisa[] = $item;
        }

        if ($dihapus > 0) {
            $data[$tabel] = $sisa;
            $this->tulis($data);
        }
        return $dihapus;
    }

    private function adaKembar($list, $baris, $unik, $idKecuali) {
        foreach ($list as $item) {
            if ($idKecuali !== null && (string) $item['id'] === (string) $idKecuali) {
                continue;
            }
            foreach ($unik as $field) {
                if (isset($baris[$field]) && isset($item[$field]) && (string) $item[$field] === (string) $baris[$field]) {
                    return true;
                }
            }
        }
        return false;
    }
}
