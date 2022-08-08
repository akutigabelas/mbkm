<?php

namespace App\Controllers;

use App\Models\Surat_rekomendasiModel;

class Monitoring extends BaseController
{
    protected $MonitoringModel;

    public function __construct()
    {
        $this->monitoringModel = new Surat_rekomendasiModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Monitoring | MBKM',
            'monitoring' => $this->monitoringModel->getMonitoring()


        ];

        return view('monitoring/index', $data);
        // echo "testtt";
    }
    public function monitoring($id)
    {
        // $sr = $this->srModel->getSr($id);
        $data = [
            'title' => 'Monitoring Progress Mahasiswa',
            'monitoring_mahasiswa' => $this->monitoringModel->getMonitoring($id)

        ];

        //jika data tidak ada di table
        if (empty($data['monitoring_mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        return view('monitoring/index', $data);
    }
}
