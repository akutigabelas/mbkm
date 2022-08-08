<?php

namespace App\Models;

use CodeIgniter\Model;

class Surat_rekomendasiModel extends Model
{
    protected $table      = 'magang_mbkm';
    protected $userTimestamps = true;
    protected $allowedFields = [
        'email', 'nama_mahasiswa', 'npm_mahasiswa', 'program_studi', 'no_wa', 'bentuk_kegiatan', 'learning_path',
        'mitra_perusahaan', 'surat_persetujuan', 'surat_komitmen', 'ss_mitra', 'foto', 'status', 'status2', 'ket_status', 'ket_status2', 'update_at', 'fakultas', 'semester',
        'ipk', 'jumlah_sks'
    ];
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'update_at';
    protected $deletedField = 'deleted_at';

    public function getSr($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['nama_mahasiswa' => $id])->first();
    }

    // public function getUsers()
    // {
    //     $userObject = new Surat_rekomendasiModel();

    //     $data = $userObject->orderBy("status2", "desc")->first();

    //     echo "<pre>";
    //     print_r($data);
    // }
    public function getMagang($id = false)
    {
        $magang = "Magang Bersertifikat";
        if ($id == false) {
            return $this->where('bentuk_kegiatan', $magang)->findAll();
        }

        return $this->where(['nama_mahasiswa' => $id])->first();
    }

    public function getApprove($id = false)
    {
        $setuju = "Approved";
        if ($id == false) {
            return $this->where('status', $setuju)->findAll();
        }
        // session()->setFlashdata('pesan', 'Data aman cuyy, masukkk!!!');

        return $this->where(['nama_mahasiswa' => $id])->first();
    }
    public function getTahun($id = false)
    {
        $tahun = date("Y");
        if ($id == false) {
            return $this->where('created_at', $tahun)->findAll();
        }
        // session()->setFlashdata('pesan', 'Data aman cuyy, masukkk!!!');

        return $this->where(['nama_mahasiswa' => $id])->first();
    }
    public function get2023($id = false)
    {
        $tahun = "2023";
        if ($id == false) {
            return $this->where('created_at', $tahun)->findAll();
        }
        // session()->setFlashdata('pesan', 'Data aman cuyy, masukkk!!!');

        return $this->where(['nama_mahasiswa' => $id])->first();
    }
    public function get2024($id = false)
    {
        $tahun = "2024";
        if ($id == false) {
            return $this->where('created_at', $tahun)->findAll();
        }
        // session()->setFlashdata('pesan', 'Data aman cuyy, masukkk!!!');

        return $this->where(['nama_mahasiswa' => $id])->first();
    }
    public function get2025($id = false)
    {
        $tahun = "2025";
        if ($id == false) {
            return $this->where('created_at', $tahun)->findAll();
        }
        // session()->setFlashdata('pesan', 'Data aman cuyy, masukkk!!!');

        return $this->where(['nama_mahasiswa' => $id])->first();
    }
    public function getApprove2($id = false)
    {
        $setuju2 = "";
        if ($id == false) {
            return $this->where('status2', $setuju2)->findAll();
        }
        // session()->setFlashdata('pesan', 'Data aman cuyy, masukkk!!!');

        return $this->where(['nama_mahasiswa' => $id])->first();
    }

    public function getReject($id = false)
    {
        $reject = "Reject";
        if ($id == false) {
            return $this->where('status', $reject)->findAll();
        }
        return $this->where(['nama_mahasiswa' => $id])->first();
    }

    public function getDetail($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['nama_mahasiswa' => $id])->first();
    }
    public function getMonitoring($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['nama_mahasiswa' => $id])->first();
    }
}
