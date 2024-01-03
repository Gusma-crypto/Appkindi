<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JabatanModel;

class Jabatan extends BaseController
{
    protected $model;
    function __construct(){
        helper("url","form");
        $this->model = new JabatanModel();
    }
    public function index()
    {
        $jabatan = $this->model->orderBy('nama_jabatan','DESC')->findAll();
        if ($this->request->getMethod() === 'post')
        {
            $data = [ 
                'nama_jabatan' => $this->request->getPost('nama_jabatan')
            ];
            $this->model->save($data);
            $this->session->setFlashdata('sukses', 'Data telah ditambah');
            return redirect()->to(base_url('admin/jabatan'));
        }
        $data =[
            "title"=>"Jabatan",
            'jabatan'=>$jabatan,
            'content'=>'admin/jabatan/index'
        ];
       return view('admin/layout/wrapper', $data);
    }
    public function delete($id_jabatan)
    {
        checklogin();
        $data    = ['id_jabatan' => $id_jabatan];
        $this->model->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');
        return redirect()->to(base_url('admin/jabatan'));
    }

}
