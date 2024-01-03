<?php

namespace App\Models;
use App\Models\Dosen_model;
use CodeIgniter\Model;


class User_model extends Model
{
    protected $table              = 'users';
    protected $primaryKey         = 'id_user';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['id_user','id_role','nama', 'email', 'username', 'password', 'akses_level', 'token', 'keterangan', 'tanggal_post'];
    protected $useTimestamps      = false;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

   

    public function login($username, $password)
    {
        return $this->asArray()
            ->where([
                'username'=>$username,
                'password'=> sha1($password)
                ])
            ->first();
    }
    // listing
    public function listing()
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->orderBy('id_user', 'DESC');
        $query = $builder->get();

        return $query->getResultArray(); 
    }

    
    // total
    public function total()
    {
        $builder = $this->db->table('users');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('users.id_user', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
    public function detail($id_user){
        $builder = $this->db->table('dosen');
        return $id_user;
    }
    
    // tambah  log
    public function user_log($data)
    {
        $builder = $this->db->table('user_logs');
        $builder->insert($data);
    }
}
