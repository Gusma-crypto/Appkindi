<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunakademikModel extends Model
{
 
    protected $table            = 'tahun_akademik';
    protected $primaryKey       = 'id_tahun_akademik';
    protected $allowedField     =['tahun_akademik','semester','tanggal_mulai','tanggal_selesai'];
    
    public function getTahunAkademik($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
    public function total()
    {
        $builder = $this->db->table('tahun_akademik');
        $builder->select('*');
        $query = $builder->get();

        return $query->getNumrows();
    }
     // detail
     public function detail($id_tahun_akademik)
     {
         $builder = $this->db->table('tahun_akademik');
         $builder->where('id_tahun_akademik', $id_tahun_akademik);
         $builder->orderBy('tahun_akademik.id_tahun_akademik', 'DESC');
         $query = $builder->get();
 
         return $query->getRowArray();
     }
    
    public function tambah($data)
    {
        $builder = $this->db->table('tahun_akademik');
        $builder->insert($data);
    }
}