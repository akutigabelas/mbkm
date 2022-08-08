<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table      = 'report';
    protected $userTimestamps = true;
    protected $allowedFields = [
        'week', 'activity', 'npm_mahasiswa', 'bentuk_kegiatan', 'berkas_laporan', 'status', 'tanggapan', 'upload_sertif', 'nilai', 'bukti_lain', 'jumlah_sks_diakui'
    ];
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'update_at';
    protected $deletedField = 'deleted_at';

    public function getReport($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['npm_mahasiswa' => $id])->first();
    }




    // public function getTanggapan($id = false)
    // {
    //     // $status = "1";
    //     if ($id == false) {
    //         return $this->where('status', $status)->findAll();
    //     }

    //     return $this->where(['npm_mahasiswa' => $id])->first();
    // }
    public function getStatus($id = false)
    {
        $status = "1";
        if ($id == false) {
            return $this->where('status', $status)->findAll();
        }

        return $this->where(['npm_mahasiswa' => $id])->first();
    }
    public function updateReport($data, $id)
    {
        $query = "SELECT tanggapan FROM report";
        return $query;
    }

    public function getMagang($id = false)
    {
        $magang = "Magang Bersertifikat";
        if ($id == false) {
            return $this->where('bentuk_kegiatan', $magang)->findAll();
        }

        return $this->where(['npm_mahasiswa' => $id])->first();
    }
    public function getStudi($id = false)
    {
        $studi = "Studi Independen";
        if ($id == false) {
            return $this->where('bentuk_kegiatan', $studi)->findAll();
        }

        return $this->where(['npm_mahasiswa' => $id])->first();
    }
    public function getNgajar($id = false)
    {
        $ngajar = "Kampus Mengajar";
        if ($id == false) {
            return $this->where('bentuk_kegiatan', $ngajar)->findAll();
        }

        return $this->where(['npm_mahasiswa' => $id])->first();
    }
}
