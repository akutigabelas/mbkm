<?php

namespace App\Controllers;

use App\Models\Surat_komitmenModel;

class MonitoringKomitmen extends BaseController
{
    protected $MonitoringKomitmen;

    public function __construct()
    {
        $this->monitoringModelK = new Surat_komitmenModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Monitoring | MBKM',
            'monitoring' => $this->monitoringModelK->getMonitoringK()


        ];

        return view('monitoring/monitoringK', $data);
        // echo "testtt";
    }
    public function monitoringK($id)
    {
        // $sr = $this->srModel->getSr($id);
        $data = [
            'title' => 'Monitoring Progress Mahasiswa',
            'monitoring_mahasiswa' => $this->monitoringModel->getMonitoringK($id)

        ];

        //jika data tidak ada di table
        if (empty($data['monitoring_mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        return view('monitoring/monitoringK', $data);
    }
}
