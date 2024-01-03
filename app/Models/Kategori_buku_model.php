<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_buku_model extends Model
{
    protected $table              = 'kategori_buku';
    protected $primaryKey         = 'id_kategori_buku';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['id_kategori_buku', 'id_user', 'nama_kategori_buku', 'slug_kategori_buku', 'urutan', 'hits'];
    protected $useTimestamps      = false;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // listing
    public function listing()
    {
        $builder = $this->db->table('kategori_buku');
        $builder->orderBy('kategori_buku.id_kategori_buku', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('kategori_buku');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('kategori_buku.id_kategori_buku', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_kategori_buku)
    {
        $builder = $this->db->table('kategori_buku');
        $builder->where('id_kategori_buku', $id_kategori_buku);
        $builder->orderBy('kategori_buku.id_kategori_buku', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_kategori_buku)
    {
        $builder = $this->db->table('kategori_buku');
        $builder->where('slug_kategori_buku', $slug_kategori_buku);
        $builder->orderBy('kategori_buku.id_kategori_buku', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}