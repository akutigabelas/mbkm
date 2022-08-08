<?php

namespace App\Controllers;

use App\Models\Kampus_mengajarModel;
use App\Models\Surat_rekomendasiModel;
use App\Models\Surat_komitmenModel;


class Pages extends BaseController
{
    protected $srModel;
    protected $skModel;
    public function __construct()
    {
        $this->srModel = new Surat_rekomendasiModel();
        $this->skModel = new Surat_komitmenModel();
        $this->kmModel = new Kampus_mengajarModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Home | MBKM',
            'sr' => $this->srModel->getSr(),
            'tahun' => $this->srModel->getTahun(),


        ];
        // $session = session();
        // echo "Welcome back, " . $session->get('role') . " (" . $session->get('username') . ")";
        // echo '<br><a href="' . base_url('login/getLogout') . '">Logout</a><br>';


        echo view('pages/home', $data);
    }
    public function homeMhs()
    {

        $data = [
            'title' => 'Home | MBKM',
            'km' => $this->srModel->getSr(),
            'tahun23' => $this->srModel->get2023(),



        ];

        echo view('pages/homeMhs', $data);
    }
    public function home2024()
    {

        $data = [
            'title' => 'Home | MBKM',
            'km' => $this->srModel->getSr(),
            'tahun24' => $this->srModel->get2024(),



        ];

        echo view('pages/home2024', $data);
    }
    public function monitoring()
    {

        $data = [
            'title' => 'Home | MBKM',
            'sr' => $this->srModel->getSr(),


        ];

        echo view('pages/monitoring', $data);
    }
    public function homeStupen()
    {

        $data = [
            'title' => 'Home | MBKM',
            'sk' => $this->skModel->getSk(),
            'tahun' => $this->skModel->getTahun(),


        ];

        echo view('pages/homeStupen', $data);
    }
    public function homeStupen2023()
    {

        $data = [
            'title' => 'Home | MBKM',
            // 'km' => $this->srModel->getSr(),
            'tahun23' => $this->skModel->get2023(),



        ];

        echo view('pages/homeStupen2023', $data);
    }
    public function homeStupen2024()
    {

        $data = [
            'title' => 'Home | MBKM',
            // 'km' => $this->srModel->getSr(),
            'sk' => $this->skModel->getSk(),
            'tahun24' => $this->skModel->get2024(),



        ];

        echo view('pages/homeStupen2024', $data);
    }
    public function monStupen()
    {

        $data = [
            'title' => 'Home | MBKM',
            'sk' => $this->skModel->getSk()

        ];

        echo view('pages/monitoringStupen', $data);
    }
    public function homeMengajar()
    {

        $data = [
            'title' => 'Home | MBKM',
            'km' => $this->kmModel->getKm(),
            'tahun' => $this->kmModel->getTahun(),



        ];

        echo view('pages/homeMengajar', $data);
    }
    public function homeMengajar2023()
    {

        $data = [
            'title' => 'Home | MBKM',
            // 'km' => $this->kmModel->getSr(),
            'tahun23' => $this->kmModel->get2023(),



        ];

        echo view('pages/homeMengajar2023', $data);
    }
    public function homeMengajar2024()
    {

        $data = [
            'title' => 'Home | MBKM',
            // 'km' => $this->srModel->getSr(),
            'tahun24' => $this->kmModel->get2024(),



        ];

        echo view('pages/homeMengajar2024', $data);
    }

    public function monMengajar()
    {

        $data = [
            'title' => 'Home | MBKM',
            'km' => $this->kmModel->getKm()


        ];

        echo view('pages/monitoringMengajar', $data);
    }

    public function about()
    {

        $data = [
            'title' => 'About | MBKM'

        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [

            'title' => 'contact | MBKM',
            'alamat' => [
                [

                    'aaa' => 'Kantor',
                    'alamat' => 'Sudirman',
                    'kota' => 'Jakarta'
                ],
                [
                    'aaa' => 'Rumah',
                    'alamat' => 'Wisma asri',
                    'kota' => 'Bekasi'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
    public function logout()
    {
        $data = [
            'title' => 'logout | MBKM'

        ];

        return view('pages/login', $data);
    }
}
