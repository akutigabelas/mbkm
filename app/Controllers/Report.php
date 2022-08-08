<?php

namespace App\Controllers;

use App\Models\ReportModel;
use DateTime;

class Report extends BaseController
{
    protected $ReportModel;

    public function __construct()
    {
        $this->reportModel = new ReportModel();
    }
    public function index()
    {
        // echo "Hai Sayang!!";
        // echo "haiiii $this->nama!!";
        $data = [
            'title' => 'Daily Report | MBKM',
            'report' => $this->reportModel->getReport(),
            'magang' => $this->reportModel->getMagang(),
            'studi' => $this->reportModel->getStudi(),
            'ngajar' => $this->reportModel->getNgajar(),
            'validation' => \config\Services::validation()



        ];
        return view('report/index', $data);
    }

    public function laporan()
    {
        $data = [
            'title' => 'Form Laporan Akhir Mahasiswa',
            'report' => $this->reportModel->getReport(),
            'magang' => $this->reportModel->getMagang(),
            'studi' => $this->reportModel->getStudi(),
            'ngajar' => $this->reportModel->getNgajar(),
            'berkas' => $this->reportModel->getStatus(),

            'validation' => \config\Services::validation()
        ];

        return view('report/laporan', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'activity' => [
                'rules' => 'uploaded[activity]|max_size[activity,3072]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                ]
            ]
        ])) {
            // $validation = \config\Services::validation();
            // dd($validation);
            return redirect()->to('/report/index')->withInput();
        }
        //take a file
        $file_activity = $this->request->getFile('activity');


        //move to folder in device
        $file_activity->move('laporan');


        //take a name of file
        $nama_activity = $file_activity->getName();


        d($this->request->getVar());
        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $session = session();
        $this->reportModel->save([
            'week' => $this->request->getVar('week'),
            //'nama_mahasiswa' => $id,
            'npm_mahasiswa' => $session->get('id_nik'),
            'activity' => $nama_activity,
            // 'no_wa' => $this->request->getVar('no_wa'),
            // 'program_studi' => $this->request->getVar('program_studi'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'status' => 1
            // 'tanggapan' => $this->request->getVar('tanggapan'),
            // 'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
            // 'surat_komitmen' => $this->request->getVar('surat_komitmen'),
            // 'foto' => $this->request->getVar('foto')

        ]);

        session()->setFlashdata('pesan', 'masukkk!!!');

        return redirect()->to('/report');
    }

    public function save2()
    {
        $session = session();
        // validasi input
        if (!$this->validate([
            'berkas_laporan' => [
                'rules' => 'uploaded[berkas_laporan]|max_size[berkas_laporan,3072]|mime_in[berkas_laporan,application/pdf,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                ]

            ],
            'upload_sertif' => [
                'rules' => 'uploaded[upload_sertif]|max_size[upload_sertif,2048]|mime_in[upload_sertif,application/pdf,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                ]

            ],
            'nilai' => [
                'rules' => 'uploaded[nilai]|max_size[nilai,1024]|mime_in[nilai,application/pdf,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                ]

            ],
            'bukti_lain' => [
                'rules' => 'uploaded[bukti_lain]|max_size[bukti_lain,5120]|mime_in[bukti_lain,application/pdf,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                ]

            ],
        ])) {
            // $validation = \config\Services::validation();
            // dd($validation);
            // return redirect()->to('/Report/laporan')->withInput()->with('validation', $validation);
            return redirect()->to('/Report/laporan')->withInput();
        }
        //take a file
        $file_berkasLaporan = $this->request->getFile('berkas_laporan');
        $file_uploadsertif = $this->request->getFile('upload_sertif');
        $file_nilai = $this->request->getFile('nilai');
        $file_buktilain = $this->request->getFile('bukti_lain');

        $date = new DateTime();
        //rename file
        $newName = "Laporan_" . $this->request->getVar('npm_mahasiswa') . "_" . date('d-m-Y') . "_" . date('H-i-s') . ".pdf";
        $newName2 = "Sertifikat_" . $this->request->getVar('npm_mahasiswa') . "_" . date('d-m-Y') . "_" . date('H-i-s') . ".pdf";
        $newName3 = "Nilai_" . $this->request->getVar('npm_mahasiswa') . "_" . date('d-m-Y') . "_" . date('H-i-s') . ".pdf";
        $newName4 = "DokumenLain_" . $this->request->getVar('npm_mahasiswa') . "_" . date('d-m-Y') . "_" . date('H-i-s') . ".jpg";
        //move to folder in device
        $file_berkasLaporan->move('laporan', $newName);
        $file_uploadsertif->move('laporan', $newName2);
        $file_nilai->move('laporan', $newName3);
        $file_buktilain->move('laporan', $newName4);

        //take a name of file
        $nama_berkasLaporan = $file_berkasLaporan->getName();
        // $nama_berkasLaporan = $file_berkasLaporan->getName('Laporan_');
        $nama_uploadsertif = $file_uploadsertif->getName();
        $nama_nilai = $file_nilai->getName();
        $nama_buktilain = $file_buktilain->getName();

        $session = session();
        d($this->request->getVar());
        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->reportModel->save([
            // 'week' => $this->request->getVar('week'),
            //'nama_mahasiswa' => $id,
            'npm_mahasiswa' => $session->get('id_nik'),
            // 'activity' => $this->request->getVar('activity'),
            // 'no_wa' => $this->request->getVar('no_wa'),
            // 'program_studi' => $this->request->getVar('program_studi'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'berkas_laporan' => $nama_berkasLaporan,
            'upload_sertif' => $nama_uploadsertif,
            'nilai' => $nama_nilai,
            'bukti_lain' => $nama_buktilain,
            'status' => 1,
            // 'tanggapan' => $this->request->getVar('tanggapan'),
            // 'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
            // 'surat_komitmen' => $this->request->getVar('surat_komitmen'),
            // 'foto' => $this->request->getVar('foto')

        ]);

        session()->setFlashdata('pesan', 'masukkk!!!');

        return redirect()->to('/report/laporan');
    }
    public function save3($id)
    {

        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'reportt' => $this->reportModel->get($id)
        ];


        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->reportModel->save([
            // 'week' => $this->request->getVar('week'),
            'id' => $id,
            'npm_mahasiswa' => $this->request->getVar('npm_mahasiswa'),
            // 'activity' => $this->request->getVar('activity'),
            // 'no_wa' => $this->request->getVar('no_wa'),
            // 'program_studi' => $this->request->getVar('program_studi'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'berkas_laporan' => $this->request->getVar('berkas_laporan'),
            // 'status' => 1,
            'tanggapan' => $this->request->getVar('tanggapan'),
            'jumlah_sks_diakui' => $this->request->getVar('jumlah_sks_diakui'),
            // 'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
            // 'surat_komitmen' => $this->request->getVar('surat_komitmen'),
            // 'foto' => $this->request->getVar('foto')

        ]);

        session()->setFlashdata('pesan', 'masukkk!!!');

        return view('/report/laporan', $data);
    }
}
