<?php

namespace App\Controllers\Admin;

use App\Models\Kategori_dosen_model;


class Kategori_dosen extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_kategori_dosen = new Kategori_dosen_model();
        $kategori_dosen   = $m_kategori_dosen->listing();
        $total            = $m_kategori_dosen->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori_dosen' => 'required|min_length[3]|is_unique[kategori_dosen.nama_kategori_dosen]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_kategori_dosen'), '-', true);
            $data = ['id_user'        => $this->session->get('id_user'),
                'nama_kategori_dosen' => $this->request->getPost('nama_kategori_dosen'),
                'slug_kategori_dosen' => $slug,
                'urutan'              => $this->request->getPost('urutan'),
            ];
            $m_kategori_dosen->save($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/kategori_dosen'));
        }
        $data = ['title'     => 'Kategori dosen: ' . $total['total'],
            'kategori_dosen' => $kategori_dosen,
            'content'        => 'admin/kategori_dosen/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_kategori_dosen)
    {
        checklogin();
        $m_kategori_dosen = new Kategori_dosen_model();
        $kategori_dosen   = $m_kategori_dosen->detail($id_kategori_dosen);
        $total            = $m_kategori_dosen->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori_dosen' => 'required|min_length[3]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_kategori_dosen'), '-', true);
            $data = ['id_user'        => $this->session->get('id_user'),
                'nama_kategori_dosen' => $this->request->getPost('nama_kategori_dosen'),
                'slug_kategori_dosen' => $slug,
                'urutan'              => $this->request->getPost('urutan'),
            ];
            $m_kategori_dosen->update($id_kategori_dosen, $data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah diedit');

            return redirect()->to(base_url('admin/kategori_dosen'));
        }
        $data = ['title'     => 'Edit Kategori dosen: ' . $kategori_dosen['nama_kategori_dosen'],
            'kategori_dosen' => $kategori_dosen,
            'content'        => 'admin/kategori_dosen/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_kategori_dosen)
    {
        checklogin();
        $m_kategori_dosen = new Kategori_dosen_model();
        $data             = ['id_kategori_dosen' => $id_kategori_dosen];
        $m_kategori_dosen->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/kategori_dosen'));
    }
}