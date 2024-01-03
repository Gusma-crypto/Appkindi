<?php

namespace App\Models;

use CodeIgniter\Model;

class Dasbor_model extends Model
{
    // berita
    public function buku()
    {
        $builder = $this->db->table('buku');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // user
    public function user()
    {
        $builder = $this->db->table('users');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // client
    public function dosen()
    {
        $builder = $this->db->table('dosen');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // galeri
    public function issn()
    {
        $builder = $this->db->table('buku');
        $builder->whereIn('jenis_kode',['ISSN','ISBN']);
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // video
    public function video()
    {
        $builder = $this->db->table('video');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // download
    public function file()
    {
        $builder = $this->db->table('buku');
        $builder->where('file !=', '');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // staff
    public function staff()
    {
        $builder = $this->db->table('staff');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // kategori_download
    public function kategori_buku()
    {
        $builder = $this->db->table('kategori_buku');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // kategori
    public function kategori()
    {
        $builder = $this->db->table('kategori');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // kategori_staff
    public function kategori_staff()
    {
        $builder = $this->db->table('kategori_staff');
        $query   = $builder->get();

        return $query->getNumRows();
    }
}
