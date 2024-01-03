<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\Buku_model;
use App\Models\Kategori_buku_model;

class Buku extends BaseController
{
    protected $m_buku;
    protected $session;
    function __construct(){
        helper('url','form');
        $this->m_buku=new Buku_model();
        $this->session= \Config\Services::session();
    }
    public function index()
    {
        checkDosen();
        $id = $this->session->get('id_dosen');
        $buku = $this->m_buku->getBuku($id);
        $data =[
            "title"=>"Buku",
            'buku'=>$buku,
            'content'=>'dosen/buku/index'
        ];
       return view('dosen/layout/wrapper', $data);
     
    }
    public function unduh($id_buku)
    {
        checkDosen(); // Uncomment if checklogin is a valid function
        $m_kategori_buku = new Kategori_buku_model();
        $m_buku          = new Buku_model();
        $kategori_buku   = $m_kategori_buku->listing();
        $buku            = $m_buku->unduhBukuDosen($id_buku);
        $buku_fix = $buku['file'];
        $file_path = FCPATH . '../assets/upload/file/' . $buku_fix;
        if (file_exists($file_path)) {
             // Set appropriate headers
            $this->response->setHeader('Content-Type', mime_content_type($file_path));
            $this->response->setHeader('Content-Disposition', 'attachment; filename="' . $buku_fix . '"');
            // Send the file for download
            return $this->response->download($file_path, null);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}