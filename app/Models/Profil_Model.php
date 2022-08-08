<?php

namespace App\Models;

use CodeIgniter\Model;

class Profil_Model extends Model
{
    protected $table      = 'profil_warek';
    protected $userTimestamps = true;
    protected $allowedFields = [
        'nama_warek', 'jabatan_warek', 'nip_warek', 'no_telp', 'ttd_warek', 'foto'
    ];
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'update_at';
    protected $deletedField = 'deleted_at';

    public function getProf($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['nama_warek' => $id])->first();
    }

    public function getDetail($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['nama_warek' => $id])->first();
    }
}
