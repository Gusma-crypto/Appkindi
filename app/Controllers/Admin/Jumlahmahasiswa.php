<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JumlahmahasiswaModel;
use App\Models\TahunakademikModel;

class Jumlahmahasiswa extends BaseController
{
    protected $model;
    protected $m_tahunakademik;
    function __construct()
    {
        helper('url','form');
        $this->model = new JumlahmahasiswaModel();
        $this->m_tahunakademik=new TahunakademikModel();

    }
    public function index()
    {
        $jumlahmahasiswa = $this->model->getJumlahMahasiswa();
        $tahunakademik   =  $this->m_tahunakademik->getTahunAkademik();
        $total           = $this->model->total();
        $count           = $this->model->getCount();
        if($this->request->getMethod()==='post'){
           
                $data = [ 
                    'id_tahun_akademik' => $this->request->getPost('id_tahun_akademik'),
                    'jumlah_masuk' => $this->request->getPost('jumlah_masuk'),
                    'jumlah_keluar' => $this->request->getPost('jumlah_keluar'),
                ];
                $this->model->save($data);
                $this->session->setFlashdata('sukses', 'Data telah ditambah');
                return redirect()->to(base_url('admin/jumlahmahasiswa'));

        }
        $data =[
            'title'          =>'Jumlah Mahasiswa || '.$total.'',
            'jumlahmahasiswa'=>$jumlahmahasiswa,
            'count'          =>$count,
            'tahunakademik'  => $tahunakademik,
            'content'=>'admin/jumlahmahasiswa/index',
        ];

        return view('admin/layout/wrapper', $data);
        
    }
    public function delete($id_jumlah_mahasiswa)
    {
        checklogin();
        $data    = ['id_jumlah_mahasiswa' => $id_jumlah_mahasiswa];
        $this->model->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');
        return redirect()->to(base_url('admin/jumlahmahasiswa'));
    }
}