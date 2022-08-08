<?php

namespace App\Models;

use CodeIgniter\Model;

class Surat_komitmenModel extends Model
{
    protected $table      = 'stupen_mbkm';
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

    public function getSk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

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
    public function getStudi($id = false)
    {
        $stupen = "Studi Independen";
        if ($id == false) {
            return $this->where('bentuk_kegiatan', $stupen)->findAll();
        }

        return $this->where(['nama_mahasiswa' => $id])->first();
    }
    public function getApprove($id = false)
    {
        $setuju = "Approved";
        if ($id == false) {
            return $this->where('status', $setuju)->findAll();
        }
        session()->setFlashdata('pesan', 'Data aman cuyy, masukkk!!!');

        return $this->where(['nama_mahasiswa' => $id])->first();
    }

    public function getCancel($id = false)
    {
        $cancel = "Cancel";
        if ($id == false) {
            return $this->where('status', $cancel)->findAll();
        }
        return $this->where(['nama_mahasiswa' => $id])->first();
    }
    public function getDetailK($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['nama_mahasiswa' => $id])->first();
    }

    public function getMonitoringK($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['nama_mahasiswa' => $id])->first();
    }
}
