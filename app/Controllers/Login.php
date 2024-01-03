<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dosen_model;
use App\Models\Konfigurasi_model;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    // Homepage
    public function index()
    {
        $session       = \Config\Services::session();
        $m_konfigurasi = new Konfigurasi_model();
        $m_dosen       = new Dosen_model();
        $konfigurasi   = $m_konfigurasi->listing();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'username' => 'required|min_length[3]',
                'password' => 'required|min_length[3]',
            ]
        )) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $dosen     = $m_dosen->login($username, $password); 
            // Proses login
            if ($dosen) {
                // Jika username password benar
                $this->session->set('username', $username);
                $this->session->set('id_dosen', $dosen['id_dosen']);
                $this->session->set('nama', $dosen['nama']);
                $this->session->set('akses_level', $dosen['akses_level']);
                $this->session->setFlashdata('sukses', 'Hai ' .$dosen['nama'] . ', Anda berhasil login');
                return redirect()->to(base_url('dosen/dashboard'));
            }
            // jika username password salah
            $this->session->setFlashdata('warning', 'Username atau password salah');
            return redirect()->to(base_url('login'));
        }
        // End validasi
        $data = ['title'  => 'Login Administrator',
            'description' => $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'session'     => $session,
        ];
        echo view('login/index', $data);
    }

    // lupa
    public function lupa()
    {
        $session       = \Config\Services::session();
        $m_konfigurasi = new Konfigurasi_model();
        $m_dosen       = new Dosen_model();
        $konfigurasi   = $m_konfigurasi->listing();

        $data = ['title'  => 'Lupa Password',
            'description' => $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'session'     => $session,
        ];
        echo view('login/lupa', $data);
    }

    // Logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('login?logout=sukses'));
    }

    
}
