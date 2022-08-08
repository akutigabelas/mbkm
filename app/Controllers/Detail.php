<?php

namespace App\Controllers;

use App\Models\Surat_rekomendasiModel;

class Detail extends BaseController
{
    protected $detailModel;

    public function __construct()
    {
        $this->detailModel = new Surat_rekomendasiModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Detail | MBKM',
            'detail' => $this->detailModel->getDetail()


        ];

        echo view('detail/index', $data);
    }
    public function detail($id)
    {
        // $sr = $this->srModel->getSr($id);
        $data = [
            'title' => 'Detail Data Mahasiswa',
            'detail_mahasiswa' => $this->detailModel->getDetail($id)

        ];

        //jika data tidak ada di table
        if (empty($data['detail_mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        return view('detail/index', $data);
    }
}
