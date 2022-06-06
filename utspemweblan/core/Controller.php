<?php

class Controller
{
    public function view($namaview, $data = '', $judul = '', $opsi = '')
    {
        // require($namaview);
        require('views/Vtemplate/template.php');
    }

    public function model($model, $data = [])
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
