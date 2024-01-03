<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Dosen_model;
use App\Models\JabatanModel;
use App\Models\Kategori_dosen_model; 

class Dosen extends BaseController 
{
    protected $m_jabatan;

    function __construct()
    {
        helper('url','form');
        $this->m_jabatan = new JabatanModel();
    }
    public function index()
    {
        checklogin();
        $m_dosen          = new Dosen_model();
        $dosen            = $m_dosen->listing();
        $total            = $m_dosen->total();
        $jabatan          = $this->m_jabatan->findAll();
        

        $data = ['title'         => 'Data dosen: ' . $total,
                'dosen'          => $dosen,
                'jabatan'        => $jabatan,
                'content'        => 'admin/dosen/index',
         ];
        echo view('admin/layout/wrapper', $data);
    }

    public function tambah(){
        checklogin();
        
        $m_dosen          = new Dosen_model();
        $dosen            = $m_dosen->listing();
        $total            = $m_dosen->total();
        $jabatan          = $this->m_jabatan->findAll();
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama' => 'required',
                'gambar' => [
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/dosen/', $namabaru);
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/dosen/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/dosen/thumbs/' . $namabaru);
                $data = [
                    'id_jabatan'        => $this->request->getPost('id_jabatan'),
                    'nik'               => $this->request->getPost('nik'),
                    'nidn'              => $this->request->getPost('nidn'), 
                    'nama'              => $this->request->getPost('nama'),
                    'email'             => $this->request->getPost('email'),
                    'username'          => $this->request->getPost('username'),
                    'password'          => sha1($this->request->getPost('password')),
                    'gambar'            => $namabaru,
                    'alamat'            => $this->request->getPost('alamat'),
                    'telepon'           => $this->request->getPost('telepon'),
                    'website'           => $this->request->getPost('website'),
                    'keahlian'          => $this->request->getPost('keahlian'),
                    'jenis_jabatan'     => $this->request->getPost('jenis_jabatan'),
                    'status_dosen'      => $this->request->getPost('status_dosen'),
                    'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir'     => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                    'id_user'           => $this->session->get('id_user'),
                ];
                $m_dosen->tambah($data);
                $this->session->setFlashdata('sukses', 'Data telah ditambah');
                return redirect()->to(base_url('admin/dosen'));
            }
            $data = [
                'id_jabatan'        => $this->request->getPost('id_jabatan'),
                'nik'               => $this->request->getPost('nik'),
                'nidn'              => $this->request->getPost('nidn'),
                'nama'              => $this->request->getPost('nama'),
                'email'             => $this->request->getPost('email'),
                'username'          => $this->request->getPost('username'),
                'password'          => sha1($this->request->getPost('password')),
                'alamat'            => $this->request->getPost('alamat'),
                'telepon'           => $this->request->getPost('telepon'),
                'website'           => $this->request->getPost('website'),
                'keahlian'          => $this->request->getPost('keahlian'),
                'jenis_jabatan'     => $this->request->getPost('jenis_jabatan'),
                'status_dosen'      => $this->request->getPost('status_dosen'),
                'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'     => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                'id_user'           => $this->session->get('id_user'),
            ];
            $m_dosen->tambah($data);
            $this->session->setFlashdata('sukses', 'Data telah ditambah');
            return redirect()->to(base_url('admin/dosen'));
        }
        
        $data = ['title'     => 'Data dosen: ' . $total,
            'dosen'          => $dosen,
            'jabatan'        => $jabatan,
            'content'        => 'admin/dosen/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }
 
    // edit
    public function edit($id_dosen)
    {
        checklogin();
        $m_dosen          = new dosen_model();
        $dosen            = $m_dosen->detail($id_dosen);
        $jabatan          = $this->m_jabatan->findAll();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama' => 'required',
                'gambar' => [
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/dosen/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/dosen/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/dosen/thumbs/' . $namabaru);
                // masuk database
                // masuk database
                    $data = [
                        'id_dosen'          => $id_dosen,
                        'id_jabatan'        => $this->request->getPost('id_jabatan'),
                        'nik'               => $this->request->getPost('nik'),
                        'nidn'              => $this->request->getPost('nidn'), 
                        'nama'              => $this->request->getPost('nama'),
                        'email'             => $this->request->getPost('email'),
                        'username'          => $this->request->getPost('username'),
                        'password'          => sha1($this->request->getPost('password')),
                        'gambar'            => $namabaru,
                        'alamat'            => $this->request->getPost('alamat'),
                        'telepon'           => $this->request->getPost('telepon'),
                        'website'           => $this->request->getPost('website'),
                        'keahlian'          => $this->request->getPost('keahlian'),
                        'jenis_jabatan'     => $this->request->getPost('jenis_jabatan'),
                        'status_dosen'      => $this->request->getPost('status_dosen'),
                        'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                        'tanggal_lahir'     => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                        'id_user'           => $this->session->get('id_user'),
                    ];
                $m_dosen->edit($data);
                // masuk database
                $this->session->setFlashdata('sukses', 'Data telah disimpan');

                return redirect()->to(base_url('admin/dosen'));
            }
            // masuk database
            $data = [
                'id_dosen'          => $id_dosen,
                'id_jabatan'        => $this->request->getPost('id_jabatan'),
                'nik'               => $this->request->getPost('nik'),
                'nidn'              => $this->request->getPost('nidn'),
                'nama'              => $this->request->getPost('nama'),
                'email'             => $this->request->getPost('email'),
                'username'          => $this->request->getPost('username'),
                'password'          => sha1($this->request->getPost('password')),
                'alamat'            => $this->request->getPost('alamat'),
                'telepon'           => $this->request->getPost('telepon'),
                'website'           => $this->request->getPost('website'),
                'keahlian'          => $this->request->getPost('keahlian'),
                'jenis_jabatan'     => $this->request->getPost('jenis_jabatan'),
                'status_dosen'      => $this->request->getPost('status_dosen'),
                'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'     => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                'id_user'           => $this->session->get('id_user'),
            ];
            $m_dosen->edit($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah disimpan');

            return redirect()->to(base_url('admin/dosen'));
        }
        $data = ['title'     => 'Edit Data dosen: ' . $dosen['nama'],
            'dosen'          => $dosen,
            'jabatan'        => $jabatan,
            'content'        => 'admin/dosen/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_dosen)
    {
        checklogin();
        $m_dosen = new dosen_model();
        $data    = ['id_dosen' => $id_dosen];
        $m_dosen->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/dosen'));
    }
}