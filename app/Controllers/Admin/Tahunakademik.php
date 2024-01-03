<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TahunakademikModel;

class TahunAkademik extends BaseController
{
    protected $model;
    function __construct()
    {
        $this->model =new TahunakademikModel();
    }
    public function index()
    {
        checklogin();
        $data  = $this->model->getTahunAkademik();
        $total = $this->model->total();
        if ($this->request->getMethod() === 'post')
        {
            $data = [ 
                'tahun_akademik'     => $this->request->getPost('tahunakademik'),
                'semester'          => $this->request->getPost('semester'),
                'periode'          => $this->request->getPost('periode'),
                'tanggal_mulai'     => date('Y-m-d', strtotime($this->request->getPost('tanggal_mulai'))),
                'tanggal_selesai'   => date('Y-m-d', strtotime($this->request->getPost('tanggal_selesai'))),
            ];
            $this->model->tambah($data);
            $this->session->setFlashdata('sukses', 'Data telah ditambah');
            return redirect()->to(base_url('admin/tahunakademik'));
        }
        $data = [
            "title"         =>"Tahun Akademik : (".$total.")",
            'tahunakademik' =>$data,
            'content'       =>'admin/tahunakademik/index'
        ];
       return view('admin/layout/wrapper', $data);
    } 
    public function edit($id_tahun_akademik){
        checklogin();
        $data  = $this->model->detai($id_tahun_akademik);
        $total = $this->model->total();
        if ($this->request->getMethod() === 'post')
        {
            $data = [ 
                'tahun_akademik'     => $this->request->getPost('tahunakademik'),
                'semester'          => $this->request->getPost('semester'),
                'periode'          => $this->request->getPost('periode'),
                'tanggal_mulai'     => date('Y-m-d', strtotime($this->request->getPost('tanggal_mulai'))),
                'tanggal_selesai'   => date('Y-m-d', strtotime($this->request->getPost('tanggal_selesai'))),
            ];
            $this->model->tambah($data);
            $this->session->setFlashdata('sukses', 'Data telah di Update');
            return redirect()->to(base_url('admin/tahunakademik'));
        }
        $data = [
            "title"         =>"Tahun Akademik : (".$total.")",
            'ta' =>$data,
            'content'       =>'admin/tahunakademik/index'
        ];
       return view('admin/layout/wrapper', $data);
    }
    public function delete($id_tahun_akademik)
    {
        checklogin();
        $data    = ['id_tahun_akademik' => $id_tahun_akademik];
        $this->model->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');
        return redirect()->to(base_url('admin/tahunakademik'));
    }
}