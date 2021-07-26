<?php

namespace App\Models;

use CodeIgniter\Model;

class DatadiriModel2 extends Model
{
    protected $table = 'datadiri2';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'KTP', 'nama', 'alamat', 'pekerjaan', 'pendapatan', 'telpon'];

    public function getdatadiri2($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
