<?php

namespace App\Controllers\Dosen;


use App\Controllers\BaseController;
use App\Models\Konfigurasi_model;

class Dashboard extends BaseController
{
    protected $model;
    function __construct(){
        helper("url","form");
        $this->model = new Konfigurasi_model();
    }
    public function index()
    {
        checkDosen();
        $data =[
            "title"=>"Jabatan",
            'content'=>'dosen/dashboard/index'
        ];
       return view('dosen/layout/wrapper', $data);
    }
}