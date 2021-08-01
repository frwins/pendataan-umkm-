<?php

namespace App\Models;

use CodeIgniter\Model;

class DatadiriModel extends Model
{
    protected $table = 'datadiri';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'id_user', 'KTP', 'nama', 'alamat', 'pekerjaan', 'pendapatan', 'telpon'];

    public function getdatadiri($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getData($id_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('datadiri');
        $query   = $builder->get(); 
        
        return $query;
    }
}
