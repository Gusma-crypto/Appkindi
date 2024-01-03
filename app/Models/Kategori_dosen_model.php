<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_dosen_model extends Model
{
    protected $table              = 'kategori_dosen';
    protected $primaryKey         = 'id_kategori_dosen';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['id_kategori_dosen', 'id_user', 'nama_kategori_dosen', 'slug_kategori_dosen', 'urutan', 'hits'];
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
        $builder = $this->db->table('kategori_dosen');
        $builder->orderBy('kategori_dosen.urutan', 'ASC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('kategori_dosen');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('kategori_dosen.id_kategori_dosen', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_kategori_dosen)
    {
        $builder = $this->db->table('kategori_dosen');
        $builder->where('id_kategori_dosen', $id_kategori_dosen);
        $builder->orderBy('kategori_dosen.id_kategori_dosen', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_kategori_dosen)
    {
        $builder = $this->db->table('kategori_dosen');
        $builder->where('slug_kategori_dosen', $slug_kategori_dosen);
        $builder->orderBy('kategori_dosen.id_kategori_dosen', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}