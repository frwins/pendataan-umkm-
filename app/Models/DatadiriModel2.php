<?php

namespace App\Models;

use CodeIgniter\Model;

class DatadiriModel2 extends Model
{
    protected $table = 'datadiri2';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'id_user', 'KTP', 'nama', 'alamat', 'pekerjaan', 'pendapatan', 'telpon'];

    public function getdatadiri2($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getData($id_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('datadiri2');
        $query   = $builder->get(); 
        
        return $query;
    }

    public function getDataByPendapatan($pendapatan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('datadiri2');
        $builder->where('pendapatan', $pendapatan);
        $query   = $builder->get(); 
        
        return $query->getResultArray();
    }
}
