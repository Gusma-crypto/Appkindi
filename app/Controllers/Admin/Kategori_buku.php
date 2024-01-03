<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_buku_model;

class Kategori_buku extends BaseController
{
   // mainpage
   public function index()
   {
       checklogin();
       $m_kategori_buku = new Kategori_buku_model();
       $kategori_buku   = $m_kategori_buku->listing();
       $total           = $m_kategori_buku->total();

       // Start validasi
       if ($this->request->getMethod() === 'post' && $this->validate(
           [
               'nama_kategori_buku' => 'required|min_length[3]|is_unique[kategori_buku.nama_kategori_buku]',
           ]
       )) {
           // masuk database
           $slug = url_title($this->request->getPost('nama_kategori_buku'), '-', true);
           $data = ['id_user'           => $this->session->get('id_user'),
               'nama_kategori_buku' => $this->request->getPost('nama_kategori_buku'),
               'slug_kategori_buku' => $slug,
               'urutan'                 => $this->request->getPost('urutan'),
           ];
           $m_kategori_buku->save($data);
           // masuk database
           $this->session->setFlashdata('sukses', 'Data telah ditambah');

           return redirect()->to(base_url('admin/kategori_buku'));
       }
       $data = ['title'        => 'Kategori buku: ' . $total['total'],
           'kategori_buku' => $kategori_buku,
           'content'           => 'admin/kategori_buku/index',
       ];
       echo view('admin/layout/wrapper', $data);
   }

   // edit
   public function edit($id_kategori_buku)
   {
       checklogin();
       $m_kategori_buku = new Kategori_buku_model();
       $kategori_buku   = $m_kategori_buku->detail($id_kategori_buku);
       $total               = $m_kategori_buku->total();

       // Start validasi
       if ($this->request->getMethod() === 'post' && $this->validate(
           [
               'nama_kategori_buku' => 'required|min_length[3]',
           ]
       )) {
           // masuk database
           $slug = url_title($this->request->getPost('nama_kategori_buku'), '-', true);
           $data = ['id_user'           => $this->session->get('id_user'),
               'nama_kategori_buku' => $this->request->getPost('nama_kategori_buku'),
               'slug_kategori_buku' => $slug,
               'urutan'                 => $this->request->getPost('urutan'),
           ];
           $m_kategori_buku->update($id_kategori_buku, $data);
           // masuk database
           $this->session->setFlashdata('sukses', 'Data telah diedit');

           return redirect()->to(base_url('admin/kategori_buku'));
       }
       $data = ['title'        => 'Edit Kategori buku: ' . $kategori_buku['nama_kategori_buku'],
           'kategori_buku' => $kategori_buku,
           'content'           => 'admin/kategori_buku/edit',
       ];
       echo view('admin/layout/wrapper', $data);
   }

   // delete
   public function delete($id_kategori_buku)
   {
       checklogin();
       $m_kategori_buku = new Kategori_buku_model();
       $data                = ['id_kategori_buku' => $id_kategori_buku];
       $m_kategori_buku->delete($data);
       // masuk database
       $this->session->setFlashdata('sukses', 'Data telah dihapus');

       return redirect()->to(base_url('admin/kategori_buku'));
   }
}