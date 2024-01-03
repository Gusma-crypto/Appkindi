<?php

namespace App\Models;

use CodeIgniter\Model;


class Dosen_model extends Model
{
    protected $table         = 'dosen';
    protected $primaryKey    = 'id_dosen';
    protected $allowedFields = [
                                'id_jabatan',
                                'id_user',
                                'nama',
                                'gambar',
                                'alamat',
                                'telepon',
                                'website',
                                'email',
                                'keahlian',
                                'status_dosen',
                                'tempat_lahir',
                                'tanggal_lahir',
                                'tanggal',
    ];

    public function login($username, $password)
    {
        return $this->asArray()
            ->where([
                'username'=>$username,
                'password'=> sha1($password)
                ])
            ->first();
    }
    // Listing
    public function listing()
    { 
        $builder = $this->db->table('dosen');
        $builder->select('dosen.*, jabatan.nama_jabatan,  users.email, users.akses_level');
        $builder->join('jabatan', 'jabatan.id_jabatan = dosen.id_jabatan', 'LEFT');
        $builder->join('users', 'users.id_user = dosen.id_user', 'LEFT');
        $builder->orderBy('dosen.id_dosen', 'DESC');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    // home
    public function home()
    {
        $builder = $this->db->table('dosen');
        $builder->select('dosen.*, kategori_dosen.nama_kategori_dosen, kategori_dosen.slug_kategori_dosen, users.nama AS nama_admin');
        $builder->join('kategori_dosen', 'kategori_dosen.id_kategori_dosen = dosen.id_kategori_dosen', 'LEFT');
        $builder->join('users', 'users.id_user = dosen.id_user', 'LEFT');
        $builder->where('dosen.status_dosen', 'Publish');
        $builder->orderBy('dosen.id_dosen', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('dosen');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // detail
    public function detail($id_dosen)
    { 
        $builder = $this->db->table('dosen');
        $builder->select('dosen.*, jabatan.nama_jabatan');
        $builder->join('jabatan', 'jabatan.id_jabatan = dosen.id_jabatan', 'LEFT');
        $builder->join('users', 'users.id_user = dosen.id_user', 'LEFT');
        $builder->where('dosen.id_dosen', $id_dosen);
        $builder->orderBy('dosen.id_dosen', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // get Biodata By id_user
    public function getUserByIdUser($id_user)
    { 
        $builder = $this->db->table('dosen');
        $builder->select('dosen.*, jabatan.nama_jabatan');
        $builder->join('jabatan', 'jabatan.id_jabatan = dosen.id_jabatan', 'LEFT');
        $builder->join('users', 'users.id_user = dosen.id_user', 'LEFT');
        $builder->whereIn('dosen.id_user', $id_user);
        $query = $builder->get();

        return $query->getRowArray();
        // return $id_user;
    }

    public function detailUser($id_user){
        $builder = $this->db->table('dosen');
        $builder->select('dosen.*, kategori_dosen.nama_kategori_dosen, kategori_dosen.slug_kategori_dosen, users.nama AS nama_admin');
        $builder->join('kategori_dosen', 'kategori_dosen.id_kategori_dosen = dosen.id_kategori_dosen', 'LEFT');
        $builder->join('users', 'users.id_user = dosen.id_user', 'LEFT');
        $builder->where('dosen.id_user', $id_user);
      
        $query = $builder->get();

        return $query->getRowArray()
        ;
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('dosen');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('dosen');
        $builder->where('id_dosen', $data['id_dosen']);
        $builder->update($data);
    }

    // slider
    public function slider()
    {
        $builder = $this->db->table('dosen');
        $builder->where('jenis_dosen', 'Homepage');
        $builder->orderBy('dosen.id_dosen', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function user_log($data)
    {
        $builder = $this->db->table('user_logs');
        $builder->insert($data);
    }
}