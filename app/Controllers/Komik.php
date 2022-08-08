<?php

namespace App\Controllers;

use App\Models\Surat_rekomendasiModel;
// use Dompdf\Dompdf;
use TCPDF;

class Komik extends BaseController
{
    protected $srModel;
    public function __construct()
    {
        $this->srModel = new Surat_rekomendasiModel();
    }
    public function index()
    {
        // $sr = $this->srModel->findAll();

        $data = [
            'title' => 'Magang Bersertifikat',
            'sr' => $this->srModel->getSr(),
            'kerja' => $this->srModel->getMagang(),
            'hasil' => $this->srModel->getApprove(),
            'hasil2' => $this->srModel->getReject(),
            'hasil3' => $this->srModel->getApprove2(),



        ];

        $session = session();
        echo "Welcome back, " . $session->get('role') . " (" . $session->get('id_nik') . ")";

        return view('komik/index', $data);
    }



    public function view()
    {
        $data = [

            'sr' => $this->srModel->getApprove2(),
        ];

        return view(
            'komik/view',
            $data,
        );
    }
    public function generate($id)
    {


        $data = [

            'hasil' => $this->srModel->getApprove2($id),
        ];


        $html = view('komik/generate', $data);


        $pdf = new TCPDF('P', 'cm', 'A4', true, 'UTF-8', false);

        // $pdf->SetCreator(PDF_CREATOR);
        // $pdf->SetAuthor('Dea Venditama');
        // $pdf->SetTitle('Invoice');
        // $pdf->SetSubject('Invoice');

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
    // public function kegiatan()
    // {
    //     $kegiatan = new Surat_rekomendasiModel();
    //     $work = "magang";
    //     $data = $kegiatan->where('bentuk_kegiatan', $work)->findAll();
    //     return view('/komix/index', compact('data'));
    // }

    public function detail($id)
    {
        // $sr = $this->srModel->getSr($id);
        $data = [
            'title' => 'Detail Surat Rekomendasi',
            'surat_rekomendasi' => $this->srModel->getSr($id)

        ];

        //jika data tidak ada di table
        if (empty($data['surat_rekomendasi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        return view('komik/detail', $data);
    }


    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Mahasiswa',
            'validation' => \config\Services::validation()
        ];

        return view('Komik/create', $data);
    }


    public function save()
    {

        //validasi input
        if (!$this->validate([
            'nama_mahasiswa' => [
                'rules' => 'is_unique[magang_mbkm.nama_mahasiswa]',
                'errors' => [
                    'is_unique' => '{field} data sudah terdaftar'
                ]
            ],
            'learning_path' => [
                'rules' => 'uploaded[learning_path]|max_size[learning_path,1024]|mime_in[learning_path,application/pdf,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                    'mime_in' => 'format harus PDF atau Ms. Word',
                ]
            ],
            // 'surat_persetujuan_prodi' => [
            //     'rules' => 'uploaded[surat_persetujuan_prodi]|max_size[surat_persetujuan_prodi,1024]',
            //     'errors' => [
            //         'uploaded' => 'Pilih file terlebih dahulu',
            //         'max_size' => 'ukurannya terlalu besar',
            //     ]
            // ],
            'surat_komitmen' => [
                'rules' => 'uploaded[surat_komitmen]|max_size[surat_komitmen,1024]|mime_in[surat_komitmen,application/pdf,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Pilih file terlebih dahulu',
                    'max_size' => 'ukurannya terlalu besar',
                    'mime_in' => 'format harus PDF atau Ms. Word',
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
            return redirect()->to('/Komik/create')->withInput();
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
        $this->srModel->save([
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

        return redirect()->to('/komik');
    }

    public function delete($id)
    {

        $this->srModel->delete($id);
        session()->setFlashdata('pesan', 'Yah data sudah terhapus :(');
        return redirect()->to('/komik');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'surat_rekomendasi' => $this->srModel->getSr($id)
        ];

        return view('komik/edit', $data);
    }

    public function lanjut($aidi)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'surat_rekomendasi' => $this->srModel->getSr($aidi)
        ];
        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->srModel->save(
            [
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
                'no_wa' => $this->request->getVar('no_wa'),
                'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
                'learning_path' => $this->request->getVar('learning_path'),
                'mitra_perusahaan' => $this->request->getVar('mitra_perusahaan'),
                // 'surat_persetujuan' => $this->request->getVar('surat_persetujuan'),
                // 'ss_mitra' => $this->request->getVar('ss_mitra'),
                'foto' => $this->request->getVar('foto'),
                'status' => $this->request->getVar('status'),
                'ket_status' => $this->request->getVar('ket_status')

            ]
        );

        if (empty($data['hasil'])) {

            session()->setFlashdata('pesan', 'Data Kosong');
        }

        return view('komik/lanjut', $data);
        // return redirect()->to('/komik');
    }
    public function create2($aidi)
    {
        //cek judul
        $daftarLama = $this->srModel->getSr($this->request->getVar('slug'));
        if ($daftarLama['nama_mahasiswa'] == $this->request->getVar('nama_mahasiswa')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[magang_mbkm.nama_mahasiswa]';
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
            return redirect()->to('/komik/lanjut/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->srModel->save([
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

        return redirect()->to('/komik');
    }
    public function create3($aidi)
    {
        //cek judul
        $daftarLama = $this->srModel->getSr($this->request->getVar('slug'));
        if ($daftarLama['nama_mahasiswa'] == $this->request->getVar('nama_mahasiswa')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[magang_mbkm.nama_mahasiswa]';
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
            return redirect()->to('/komik/lanjut/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->srModel->save([
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

        return redirect()->to('/komik');
    }
    public function lanjut2($aidi)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'surat_rekomendasi' => $this->srModel->getSr($aidi)
        ];
        // $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->srModel->save(
            [
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

            ]
        );

        if (empty($data['hasil'])) {

            session()->setFlashdata('pesan', 'Data Kosong');
        }

        return view('komik/lanjut2', $data);
        // return redirect()->to('/komik');
    }

    public function masuk()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Mahasiswa',
            'validation' => \config\Services::validation()
        ];

        return view('Komik/masuk', $data);
    }

    public function update($aidi)
    {
        //cek judul
        $daftarLama = $this->srModel->getSr($this->request->getVar('slug'));
        if ($daftarLama['nama_mahasiswa'] == $this->request->getVar('nama_mahasiswa')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[magang_mbkm.nama_mahasiswa]';
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
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $id = url_title($this->request->getVar('nama_mahasiswa'), '-', true);
        $this->srModel->save([
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

        return redirect()->to('/komik');
    }
}





 // konek db tanpa Model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM surat_rekomendasi");
        // // d($komik);
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }
        // $srModel = new \App\Models\Surat_rekomendasiModel();
        // dd($sr);
