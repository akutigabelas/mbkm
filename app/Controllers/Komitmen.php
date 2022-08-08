<?php

namespace App\Controllers;

use App\Models\Surat_komitmenModel;
use TCPDF;


class Komitmen extends BaseController
{
    protected $skModel;
    public function __construct()
    {
        $this->skModel = new Surat_komitmenModel();
    }
    public function index()
    {
        // $sr = $this->srModel->findAll();

        $data = [
            'title' => 'Studi Independen',
            'sk' => $this->skModel->getSk(),
            'stupen' => $this->skModel->getStudi(),
            'hasil' => $this->skModel->getApprove(),
            'hasil2' => $this->skModel->getCancel()



        ];

        // $session = session();
        // echo "Welcome back, " . $session->get('role') . " (" . $session->get('username') . ")";

        return view('komitmen/index', $data);
    }

    public function view()
    {
        $data = [

            'sk' => $this->skModel->getSk(),
        ];

        return view(
            'komitmen/view',
            $data,
        );
    }
    public function generate($id)
    {


        $data = [

            'hasil' => $this->skModel->getApprove($id),
        ];

        $html = view('komitmen/generate', $data);


        $pdf = new TCPDF('P', 'cm', 'A4', true, 'UTF-8', false);

        $pdf->setHeaderData('yarsii.jpg', 6);
        // $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(false);
        // $pdf->setHeaderMargin(20);
        $pdf->SetMargins(1, 2, 1);
        // $pdf->SetHeaderMargin(0);
        // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        // $pdf->setMargins(PDF_MARGIN_TOP, );


        $pdf->addPage();
        $pdf->Ln(1);


        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('surat.pdf', 'I');

        // return view('komik/generate', $data);
    }

    public function detail($id)
    {
        // $sr = $this->srModel->getSr($id);
        $data = [
            'title' => 'Detail Surat Komitmen',
            'surat_komitmen' => $this->skModel->getSk($id)

        ];

        //jika data tidak ada di table
        if (empty($data['surat_komitmen'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        return view('Komitmen/detail', $data);
    }


    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Mahasiswa',
            'validation' => \config\Services::validation()
        ];

        return view('komitmen/create', $data);
    }

    public function save()
    {

        //validasi input
        if (!$this->validate([
            'nama_mahasiswa' => [
                'rules' => 'is_unique[stupen_mbkm.nama_mahasiswa]',
                'errors' => [
                    'is_unique' => '{field} data sudah terdaftar'
                ]
            ],
            'learning_path' => [
                'rules' => 'uploaded[learning_path]|max_size[learning_path,1024]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                    'is_image' => 'yang anda pilih, salah'
                ]
            ],
            // 'surat_persetujuan_prodi' => [
            //     'rules' => 'uploaded[surat_persetujuan_prodi]|max_size[surat_persetujuan_prodi,1024]',
            //     'errors' => [
            //         'uploaded' => 'Pilih file terlebih dahulu',
            //         'max_size' => 'ukurannya terlalu besar',
            //         'is_image' => 'yang anda pilih, salah'
            //     ]
            // ],
            'surat_komitmen' => [
                'rules' => 'uploaded[surat_komitmen]|max_size[surat_komitmen,1024]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                    'is_image' => 'yang anda pilih, salah'
                ]
            ],
            // 'ss_mitra' => [
            //     'rules' => 'uploaded[ss_mitra]|max_size[ss_mitra,1024]|is_image[ss_mitra]',
            //     'errors' => [
            //         'uploaded' => 'Pilih file terlebih dahulu',
            //         'max_size' => 'ukurannya terlalu besar',
            //         'is_image' => 'yang anda pilih, salah'
            //     ]
            // ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                    'is_image' => 'yang anda pilih, salah'
                ]
            ]



        ])) {
            // $validation = \config\Services::validation();
            // dd($validation);
            // return redirect()->to('/Komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Komitmen/create')->withInput();
        }

        //take a file
        $file_learningPath = $this->request->getFile('learning_path');
        // $file_suratProdi = $this->request->getFile('surat_persetujuan_prodi');
        // $file_ssMitra = $this->request->getFile('ss_mitra');
        $file_suratKomitmen = $this->request->getFile('surat_komitmen');
        $file_foto = $this->request->getFile('foto');

        //move file to folder
        $file_learningPath->move('gambar');
        // $file_suratProdi->move('gambar');
        // $file_ssMitra->move('gambar');
        $file_suratKomitmen->move('gambar');
        $file_foto->move('gambar');

        //take a name of file
        $nama_learningPath = $file_learningPath->getName();
        // $nama_suratProdi = $file_suratProdi->getName();
        // $nama_ssMitra = $file_ssMitra->getName();
        $nama_suratKomitmen = $file_suratKomitmen->getName();
        $nama_foto = $file_foto->getName();

        $session = session();
        // dd($this->request->getVar());
        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->skModel->save([
            'email' => $this->request->getVar('email'),
            // 'nama_mahasiswa' => $id,
            'nama_mahasiswa' => $session->get('displayname'),
            'npm_mahasiswa' => $session->get('id_nik'),
            'program_studi' => $this->request->getVar('program_studi'),
            'fakultas' => $this->request->getVar('fakultas'),
            'semester' => $this->request->getVar('semester'),
            'ipk' => $this->request->getVar('ipk'),
            'jumlah_sks' => $this->request->getVar('jumlah_sks'),
            'no_wa' => $this->request->getVar('no_wa'),
            'learning_path' => $nama_learningPath,
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
            // 'surat_persetujuan' => $nama_suratProdi,
            'surat_komitmen' => $nama_suratKomitmen,
            // 'ss_mitra' => $nama_ssMitra,
            'foto' => $nama_foto


        ]);

        session()->setFlashdata('pesan', 'Data Telah Tersimpan');

        return redirect()->to('/komitmen');
    }

    public function delete($id)
    {

        $this->skModel->delete($id);
        session()->setFlashdata('pesan', 'Yah data sudah terhapus :(');
        return redirect()->to('/komitmen');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'surat_komitmen' => $this->skModel->getSk($id)
        ];

        return view('Komitmen/edit', $data);
    }

    public function create2($aidi)
    {
        //cek judul
        $daftarLama = $this->skModel->getSk($this->request->getVar('slug'));
        if ($daftarLama['nama_mahasiswa'] == $this->request->getVar('nama_mahasiswa')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[stupen_mbkm.nama_mahasiswa]';
        }
        //validasi input
        if (!$this->validate([
            'nama_mahasiswa' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} data harus diisi',
                    'is_unique' => '{field} data sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            // dd($validation);
            return redirect()->to('/komitmen/lanjut/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->skModel->save([
            'id' => $aidi,
            'id' => $aidi,
            'email' => $this->request->getVar('email'),
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            // 'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'npm_mahasiswa' => $this->request->getVar('npm_mahasiswa'),
            'program_studi' => $this->request->getVar('program_studi'),
            'fakultas' => $this->request->getVar('fakultas'),
            'semester' => $this->request->getVar('semester'),
            'ipk' => $this->request->getVar('ipk'),
            'jumlah_sks' => $this->request->getVar('jumlah_sks'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'learning_path' => $this->request->getVar('learning_path'),
            'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
            // 'surat_persetujuan' => $this->request->getVar('surat_persetujuan'),
            // 'ss_mitra' => $this->request->getVar('ss_mitra'),
            'foto' => $this->request->getVar('foto'),
            'status' => $this->request->getVar('status'),
            'ket_status' => $this->request->getVar('ket_status')

        ]);

        session()->setFlashdata('pesan', 'Data Telah Tersimpan');

        return redirect()->to('/komitmen');
    }
    public function create3($aidi)
    {
        //cek judul
        $daftarLama = $this->skModel->getSk($this->request->getVar('slug'));
        if ($daftarLama['nama_mahasiswa'] == $this->request->getVar('nama_mahasiswa')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[stupen_mbkm.nama_mahasiswa]';
        }
        //validasi input
        if (!$this->validate([
            'nama_mahasiswa' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} data harus diisi',
                    'is_unique' => '{field} data sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            // dd($validation);
            return redirect()->to('/komitmen/lanjut2/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->skModel->save([
            'id' => $aidi,
            'id' => $aidi,
            'email' => $this->request->getVar('email'),
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            // 'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'npm_mahasiswa' => $this->request->getVar('npm_mahasiswa'),
            'program_studi' => $this->request->getVar('program_studi'),
            'fakultas' => $this->request->getVar('fakultas'),
            'semester' => $this->request->getVar('semester'),
            'ipk' => $this->request->getVar('ipk'),
            'jumlah_sks' => $this->request->getVar('jumlah_sks'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'learning_path' => $this->request->getVar('learning_path'),
            'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
            // 'surat_persetujuan' => $this->request->getVar('surat_persetujuan'),
            // 'ss_mitra' => $this->request->getVar('ss_mitra'),
            'foto' => $this->request->getVar('foto'),
            'status2' => $this->request->getVar('status2'),
            'ket_status2' => $this->request->getVar('ket_status2')

        ]);

        session()->setFlashdata('pesan', 'Data Telah Tersimpan');

        return redirect()->to('/komitmen');
    }

    public function lanjut($id)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'surat_komitmen' => $this->skModel->getSk($id)
        ];

        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->skModel->save(
            [
                'id' => $id,
                'email' => $this->request->getVar('email'),
                'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
                // 'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
                'npm_mahasiswa' => $this->request->getVar('npm_mahasiswa'),
                'program_studi' => $this->request->getVar('program_studi'),
                'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
                'learning_path' => $this->request->getVar('learning_path'),
                'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
                'surat_persetujuan' => $this->request->getVar('surat_persetujuan'),
                'ss_mitra' => $this->request->getVar('ss_mitra'),
                'foto' => $this->request->getVar('foto'),
                'status' => $this->request->getVar('status'),
                'ket_status' => $this->request->getVar('ket_status')

            ]
        );

        if (empty($data['hasil'])) {

            session()->setFlashdata('pesan', 'Data Kosong');
        }

        return view('Komitmen/lanjut', $data);
    }
    public function lanjut2($id)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'surat_komitmen' => $this->skModel->getSk($id)
        ];

        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->skModel->save(
            [
                'id' => $id,
                'email' => $this->request->getVar('email'),
                'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
                // 'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
                'npm_mahasiswa' => $this->request->getVar('npm_mahasiswa'),
                'program_studi' => $this->request->getVar('program_studi'),
                'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
                'learning_path' => $this->request->getVar('learning_path'),
                'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
                'surat_persetujuan' => $this->request->getVar('surat_persetujuan'),
                'ss_mitra' => $this->request->getVar('ss_mitra'),
                'foto' => $this->request->getVar('foto'),
                'status2' => $this->request->getVar('status2'),
                'ket_status2' => $this->request->getVar('ket_status2')

            ]
        );

        if (empty($data['hasil'])) {

            session()->setFlashdata('pesan', 'Data Kosong');
        }

        return view('Komitmen/lanjut2', $data);
    }

    public function update($aidi)
    {
        //cek judul
        $daftarLama = $this->skModel->getSk($this->request->getVar('slug'));
        if ($daftarLama['nama_mahasiswa'] == $this->request->getVar('nama_mahasiswa')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[stupen_mbkm.nama_mahasiswa]';
        }
        //validasi input
        if (!$this->validate([
            'nama_mahasiswa' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} data harus diisi',
                    'is_unique' => '{field} data sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            // dd($validation);
            return redirect()->to('/komitmen/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->skModel->save([
            'id' => $aidi,
            'email' => $this->request->getVar('email'),
            'nama_mahasiswa' => $id,
            // 'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'npm_mahasiswa' => $this->request->getVar('npm_mahasiswa'),
            'no_wa' => $this->request->getVar('no_wa'),
            'program_studi' => $this->request->getVar('program_studi'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
            'surat_komitmen' => $this->request->getVar('surat_komitmen'),
            'foto' => $this->request->getVar('foto')

        ]);

        session()->setFlashdata('pesan', 'Data Telah Terimpan');

        return redirect()->to('/komitmen');
    }
}





 // konek db tanpa Model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM stupen_mbkm");
        // // d($komik);
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }
        // $srModel = new \App\Models\stupen_mbkmModel();
        // dd($sr);
