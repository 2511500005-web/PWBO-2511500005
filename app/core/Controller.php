<?php

class Controller { 
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
