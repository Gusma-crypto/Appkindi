<?php

namespace App\Models;

use CodeIgniter\Model;

class Buku_model extends Model 
{
    protected $table         = 'buku';
    protected $primaryKey    = 'id_buku';
    protected $allowedFields = [
                                'jenis_kode',
                                'kode_buku',
                                'id_dosen',
                                'id_kategori_buku',
                                'id_user',
                                'judul_buku',
                                'jenis_buku',
                                'isi',
                                'gambar',
                                'file',
                                'penulis',
                                'penerbit',
                                'tanggal_terbit',
                                'tanggal_publish',
                                'website',
                                'keyword',
                                'hits',
                                'status',
                                'tanggal',
                              ];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('buku');
        $builder->select('buku.*, dosen.nidn, dosen.nama, kategori_buku.nama_kategori_buku, kategori_buku.slug_kategori_buku, users.username');
        $builder->join('kategori_buku', 'kategori_buku.id_kategori_buku = buku.id_kategori_buku', 'LEFT');
        $builder->join('users', 'users.id_user = buku.id_user', 'LEFT');
        $builder->join('dosen', 'dosen.id_dosen = buku.id_dosen', 'LEFT');
        $builder->orderBy('buku.id_buku', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    //for report 
    public function listperdosen(){
        $builder = $this->db->table('buku');
        $builder->select('buku.*, dosen.nidn, dosen.nama, kategori_buku.nama_kategori_buku, COUNT(buku.id_buku) as jumlah_buku, kategori_buku.slug_kategori_buku, users.username');
        $builder->join('kategori_buku', 'kategori_buku.id_kategori_buku = buku.id_kategori_buku', 'LEFT');
        $builder->join('users', 'users.id_user = buku.id_user', 'LEFT');
        $builder->join('dosen', 'dosen.id_dosen = buku.id_dosen', 'LEFT');
        $builder->groupBy('id_dosen');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function listdetailperdosen($id){
        $builder = $this->db->table('buku');
        $builder->select('buku.*, dosen.nidn, dosen.nama, kategori_buku.nama_kategori_buku, kategori_buku.slug_kategori_buku, users.username');
        $builder->join('kategori_buku', 'kategori_buku.id_kategori_buku = buku.id_kategori_buku', 'LEFT');
        $builder->join('users', 'users.id_user = buku.id_user', 'LEFT');
        $builder->join('dosen', 'dosen.id_dosen = buku.id_dosen', 'LEFT');
        $builder->where('dosen.id_dosen', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    // Listing
    public function jenis_buku($jenis_buku)
    {
        $builder = $this->db->table('buku');
        $builder->select('buku.*, kategori_buku.nama_kategori_buku, kategori_buku.slug_kategori_buku, users.nama');
        $builder->join('kategori_buku', 'kategori_buku.id_kategori_buku = buku.id_kategori_buku', 'LEFT');
        $builder->join('users', 'users.id_user = buku.id_user', 'LEFT');
        $builder->where('buku.jenis_buku', $jenis_buku);
        $builder->orderBy('buku.id_buku', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('buku');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // detail
    public function detail($id_buku)
    {
        $builder = $this->db->table('buku');
        $builder->select('buku.*, dosen.nidn, dosen.nama, kategori_buku.nama_kategori_buku, kategori_buku.slug_kategori_buku, users.username');
        $builder->join('kategori_buku', 'kategori_buku.id_kategori_buku = buku.id_kategori_buku', 'LEFT');
        $builder->join('users', 'users.id_user = buku.id_user', 'LEFT');
        $builder->join('dosen', 'dosen.id_dosen = buku.id_dosen', 'LEFT');
        $builder->where('buku.id_buku', $id_buku);
        $builder->orderBy('buku.id_buku', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('buku');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('buku');
        $builder->where('id_buku', $data['id_buku']);
        $builder->update($data);
    }

    // slider
    public function slider()
    {
        $builder = $this->db->table('buku');
        $builder->where('jenis_buku', 'Homepage');
        $builder->orderBy('buku.id_buku', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }


    //BUKU FOR DOSEN By Session
    public function getBuku($id)
    {
        $builder = $this->db->table('buku');
        $builder->select('buku.*, dosen.nidn, dosen.nama, kategori_buku.nama_kategori_buku, kategori_buku.slug_kategori_buku');
        $builder->join('kategori_buku', 'kategori_buku.id_kategori_buku = buku.id_kategori_buku', 'LEFT');
        $builder->join('dosen', 'dosen.id_dosen = buku.id_dosen', 'LEFT');
        $builder->where('dosen.id_dosen', $id);
        $builder->orderBy('buku.id_buku', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function unduhBukuDosen($id_buku)
    {
        $builder = $this->db->table('buku');
        $builder->select('buku.*, dosen.nidn, dosen.nama, kategori_buku.nama_kategori_buku, kategori_buku.slug_kategori_buku');
        $builder->join('kategori_buku', 'kategori_buku.id_kategori_buku = buku.id_kategori_buku', 'LEFT');
        $builder->join('dosen', 'dosen.id_dosen = buku.id_dosen', 'LEFT');
        $builder->where('buku.id_buku', $id_buku);
        $builder->orderBy('buku.id_buku', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

}