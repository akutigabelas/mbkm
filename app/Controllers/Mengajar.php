<?php

namespace App\Controllers;

use App\Models\Kampus_mengajarModel;
use TCPDF;


class Mengajar extends BaseController
{
    protected $kmModel;
    public function __construct()
    {
        $this->kmModel = new Kampus_mengajarModel();
    }
    public function index()
    {
        // $sr = $this->kmModel->findAll();

        $data = [
            'title' => 'Kampus Mengajar',
            'km' => $this->kmModel->getKm(),
            'ngajar' => $this->kmModel->getNgajar(),
            'hasil' => $this->kmModel->getApprove(),
            'hasil2' => $this->kmModel->getCancel()



        ];
        // $session = session();
        // echo "Welcome back, " . $session->get('role') . " (" . $session->get('username') . ")";


        return view('mengajar/index', $data);
    }

    public function view()
    {
        $data = [

            'km' => $this->kmModel->getKm(),
        ];

        return view(
            'mengajar/view',
            $data,
        );
    }
    public function generate($id)
    {


        $data = [

            'hasil' => $this->kmModel->getApprove($id),
        ];

        $html = view('mengajar/generate', $data);


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
        $pdf->Ln(0);


        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('surat.pdf', 'I');

        // return view('komik/generate', $data);
    }

    public function getRomawi($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }

    public function detail($id)
    {
        // $sr = $this->kmModel->getKm($id);
        $data = [
            'title' => 'Detail Kampus Mengajar',
            'mengajar_mbkm' => $this->kmModel->getKm($id)

        ];

        //jika data tidak ada di table
        if (empty($data['mengajar_mbkm'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        return view('mengajar/detail', $data);
    }


    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Mahasiswa',
            'validation' => \config\Services::validation()
        ];

        return view('Mengajar/create', $data);
    }

    public function save()
    {

        //validasi input
        if (!$this->validate([
            'nama_mahasiswa' => [
                'rules' => 'is_unique[mengajar_mbkm.nama_mahasiswa]',
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
            // return redirect()->to('/Mengajar/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Mengajar/create')->withInput();
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
        $this->kmModel->save([
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

        return redirect()->to('/Mengajar');
    }

    public function delete($id)
    {

        $this->kmModel->delete($id);
        session()->setFlashdata('pesan', 'Yah data sudah terhapus :(');
        return redirect()->to('/Mengajar');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'mengajar_mbkm' => $this->kmModel->getKm($id)
        ];

        return view('Mengajar/edit', $data);
    }

    public function create2($aidi)
    {
        //cek judul
        $daftarLama = $this->kmModel->getKm($this->request->getVar('slug'));
        if ($daftarLama['nama_mahasiswa'] == $this->request->getVar('nama_mahasiswa')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[mengajar_mbkm.nama_mahasiswa]';
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
            return redirect()->to('/mengajar/lanjut/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->kmModel->save([
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

        return redirect()->to('/mengajar');
    }
    public function create3($aidi)
    {
        //cek judul
        $daftarLama = $this->kmModel->getKm($this->request->getVar('slug'));
        if ($daftarLama['nama_mahasiswa'] == $this->request->getVar('nama_mahasiswa')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[mengajar_mbkm.nama_mahasiswa]';
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
            return redirect()->to('/Mengajar/lanjut2/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->kmModel->save([
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

        return redirect()->to('/Mengajar');
    }

    public function lanjut($id)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'mengajar_mbkm' => $this->kmModel->getKm($id)
        ];

        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->kmModel->save(
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

        return view('Mengajar/lanjut', $data);
    }
    public function lanjut2($id)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'mengajar_mbkm' => $this->kmModel->getKm($id)
        ];

        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->kmModel->save(
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

        return view('Mengajar/lanjut2', $data);
    }

    public function update($aidi)
    {
        //cek judul
        $daftarLama = $this->kmModel->getKm($this->request->getVar('slug'));
        if ($daftarLama['nama_mahasiswa'] == $this->request->getVar('nama_mahasiswa')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[mengajar_mbkm.nama_mahasiswa]';
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
            return redirect()->to('/Mengajar/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->kmModel->save([
            'id' => $aidi,
            'email' => $this->request->getVar('email'),
            'nama_mahasiswa' => $id,
            // 'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'npm_mahasiswa' => $this->request->getVar('npm_mahasiswa'),
            'program_studi' => $this->request->getVar('program_studi'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'learning_path' => $this->request->getVar('learning_path'),
            'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
            'surat_persetujuan' => $this->request->getVar('surat_persetujuan'),
            'ss_mitra' => $this->request->getVar('ss_mitra')

        ]);

        session()->setFlashdata('pesan', 'Data Telah Tersimpan');

        return redirect()->to('/Mengajar');
    }
}





 // konek db tanpa Model
        // $db = \Config\Database::connect();
        // $Mengajar = $db->query("SELECT * FROM mengajar_mbkm");
        // // d($Mengajar);
        // foreach ($Mengajar->getResultArray() as $row) {
        //     d($row);
        // }
        // $kmModel = new \App\Models\mengajar_mbkmModel();
        // dd($sr);
