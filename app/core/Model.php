<?php

abstract class Model {
    protected static $tabel;
    protected static $fillable = [];
    protected static $unik = [];
    protected static $foreign = [];
    protected static $timestamps = true;

    protected $attributes = [];

    public function __construct(array $attributes = []) {
        $this->attributes = $attributes;
    }

    public static function table() {
        return static::$tabel;
    }

    protected static function db() {
        return new JsonDb;
    }

    protected static function hydrate(array $rows) {
        $hasil = [];
        foreach ($rows as $row) {
            $hasil[] = new static($row);
        }
        return $hasil;
    }

    public static function all() {
        return static::hydrate(static::db()->semua(static::$tabel));
    }

    public static function find($id) {
        $row = static::db()->cari(static::$tabel, $id);
        return $row ? new static($row) : null;
    }

    public static function findOrFail($id) {
        $model = static::find($id);
        if ($model === null) {
            throw new Exception(static::class . ' dengan id ' . $id . ' tidak ditemukan.');
        }
        return $model;
    }

    public static function where($kolom, $nilai) {
        $hasil = [];
        foreach (static::all() as $model) {
            if ((string) $model->$kolom === (string) $nilai) {
                $hasil[] = $model;
            }
        }
        return $hasil;
    }

    public static function first() {
        $semua = static::all();
        return $semua ? $semua[0] : null;
    }

    public static function count() {
        return count(static::db()->semua(static::$tabel));
    }

    public static function paginate($perHalaman = 10, $halaman = 1) {
        $semua = static::all();
        $total = count($semua);
        $totalHalaman = max(1, (int) ceil($total / $perHalaman));
        $halaman = max(1, min((int) $halaman, $totalHalaman));

        return [
            'data' => array_slice($semua, ($halaman - 1) * $perHalaman, $perHalaman),
            'halaman' => $halaman,
            'total_halaman' => $totalHalaman,
            'total' => $total,
        ];
    }

    public static function create(array $data) {
        $model = new static();
        $model->fill($data);
        $model->save();
        return $model;
    }

    public static function destroy($ids) {
        $ids = is_array($ids) ? $ids : [$ids];
        $jumlah = 0;

        foreach ($ids as $id) {
            $model = static::find($id);
            if ($model === null) {
                continue;
            }
            $model->cekRestrict();
            $jumlah += static::db()->hapus(static::$tabel, $id);
        }
        return $jumlah;
    }

    public function fill(array $data) {
        foreach ($data as $kunci => $nilai) {
            if (in_array($kunci, static::$fillable)) {
                $this->attributes[$kunci] = $nilai;
            }
        }
        return $this;
    }

    public function save() {
        $this->cekForeignKey();
        $db = static::db();
        $waktu = date('Y-m-d H:i:s');

        if (isset($this->attributes['id'])) {
            if (static::$timestamps) {
                $this->attributes['updated_at'] = $waktu;
            }
            $ubah = $db->ubah(static::$tabel, $this->attributes['id'], $this->attributes, static::$unik);
            if ($ubah === 0) {
                throw new Exception('Data gagal diubah. Nilai unik mungkin sudah dipakai.');
            }
            return true;
        }

        if (static::$timestamps) {
            $this->attributes['created_at'] = $waktu;
            $this->attributes['updated_at'] = $waktu;
        }

        $id = $db->tambah(static::$tabel, $this->attributes, static::$unik);
        if ($id === 0) {
            throw new Exception('Data kembar: ' . implode(', ', static::$unik) . ' sudah terdaftar.');
        }
        $this->attributes['id'] = $id;
        return true;
    }

    public function update(array $data) {
        $this->fill($data);
        return $this->save();
    }

    public function delete() {
        return static::destroy($this->attributes['id']) > 0;
    }

    public function hasMany($kelas, $kunciAsing) {
        return $kelas::where($kunciAsing, $this->attributes['id']);
    }

    public function belongsTo($kelas, $kunciLokal) {
        if (!isset($this->attributes[$kunciLokal])) {
            return null;
        }
        return $kelas::find($this->attributes[$kunciLokal]);
    }

    protected function cekForeignKey() {
        foreach (static::$foreign as $kolom => $kelas) {
            if (!isset($this->attributes[$kolom])) {
                continue;
            }
            if ($kelas::find($this->attributes[$kolom]) === null) {
                throw new Exception('Foreign key constraint fails: ' . $kolom . ' = ' . $this->attributes[$kolom] . ' tidak ada di tabel ' . $kelas::table());
            }
        }
    }

    protected function cekRestrict() {
    }

    public function toArray() {
        return $this->attributes;
    }

    public function __get($kunci) {
        if (method_exists($this, $kunci)) {
            return $this->{$kunci}();
        }
        return isset($this->attributes[$kunci]) ? $this->attributes[$kunci] : null;
    }

    public function __set($kunci, $nilai) {
        $this->attributes[$kunci] = $nilai;
    }

    public function __isset($kunci) {
        return isset($this->attributes[$kunci]);
    }
}