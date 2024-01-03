<?php

namespace App\Models;

use CodeIgniter\Model;

class JumlahmahasiswaModel extends Model
{

    protected $table            = 'jumlah_mahasiswa';
    protected $primaryKey       = 'id_jumlah_mahasiswa';
    protected $allowedFields    = ['id_tahun_akademik','jumlah_masuk','jumlah_keluar'];

    public function getJumlahMahasiswa(){
        $builder = $this->db->table('jumlah_mahasiswa');
        $builder->select('jumlah_mahasiswa.*, tahun_akademik.semester, tahun_akademik.periode, tahun_akademik.tahun_akademik, tahun_akademik.tanggal_mulai, tahun_akademik.tanggal_selesai');
        $builder->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jumlah_mahasiswa.id_tahun_akademik');
        $builder->orderBy('jumlah_mahasiswa.id_jumlah_mahasiswa','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function total(){
        $builder = $this->db->table('jumlah_mahasiswa');
        $builder->select('jumlah_mahasiswa.*, tahun_akademik.semester, tahun_akademik.tanggal_mulai, tahun_akademik.tanggal_selesai');
        $builder->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jumlah_mahasiswa.id_tahun_akademik');
        $builder->orderBy('jumlah_mahasiswa.id_jumlah_mahasiswa','DESC');
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function getCount(){
        $builder = $this->db->table('jumlah_mahasiswa');
        $builder->select('sum(jumlah_mahasiswa.jumlah_masuk) as masuk, sum(jumlah_mahasiswa.jumlah_keluar) as keluar');
        $builder->join('tahun_akademik','tahun_akademik.id_tahun_akademik = jumlah_mahasiswa.id_tahun_akademik');
        $query = $builder->get();
        return $query->getRowArray();
    }
    
}