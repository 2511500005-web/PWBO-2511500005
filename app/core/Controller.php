<?php

class Controller { //tolong dibedakan Controller yang kita buat disini dengan controller yang ada di folder controllers, jadi class Controller ini adalah class utama, sedangkan class-class yang nanti akan kita buat di dalam folder Controllers adalah controller yang akan di-extend ke class utama ini
    public function view($view, $data = [])
    {
        require_once '../app/views/'.$view.'.php';
    }

    public function model($model)
    {
        require_once '../app/models/'.$model.'.php'; //panggil file model
        return new $model; //instansiasi class model, supaya bisa dipakai method-method di dalamnya
    }
}
