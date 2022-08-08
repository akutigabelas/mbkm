<?php

namespace App\Controllers;

use App\Models\Profil_Model;

class Profil extends BaseController
{
    protected $profModel;
    public function __construct()
    {
        $this->profModel = new Profil_Model();
    }
    public function index()
    {
        // $sr = $this->srModel->findAll();

        $data = [
            'title' => 'Profil Wakil Rektor',
            'profil' => $this->profModel->getProf(),




        ];

        $session = session();
        echo "Welcome back, " . $session->get('role') . " (" . $session->get('id_nik') . ")";

        return view('profil/index', $data);
    }



    public function detail($id)
    {
        // $sr = $this->srModel->getSr($id);
        $data = [
            'title' => 'Profil Wakil Rektor',
            'profil_warek' => $this->profModel->getProf($id)

        ];

        //jika data tidak ada di table
        if (empty($data['profil_warek'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        return view('profil/index', $data);
    }






    public function delete($id)
    {

        $this->srModel->delete($id);
        session()->setFlashdata('pesan', 'Yah data sudah terhapus :(');
        return redirect()->to('/komik');
    }


    public function ubah($id)
    {
        $data = [
            'title' => 'Form Ubah Data Mahasiswa',
            'validation' => \config\Services::validation(),
            'profil_warek' => $this->profModel->getProf($id)
        ];

        return view('profil/edit', $data);
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
        $daftarLama = $this->profModel->getProf($this->request->getVar('slug'));
        if ($daftarLama['nama_warek'] == $this->request->getVar('nama_warek')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[profil_warek.nama_warek]';
        }
        //validasi input
        if (!$this->validate([
            'nama_warek' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} data harus diisi',
                    'is_unique' => '{field} data sudah terdaftar'
                ]
            ],
            // 'foto' => [
            //     'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]',
            //     'errors' => [
            //         'uploaded' => 'Pilih file terlebih dahulu',
            //         'max_size' => 'ukurannya terlalu besar',
            //         'is_image' => 'yang anda pilih, salah'
            //     ]
            // ]

        ])) {
            $validation = \config\Services::validation();
            // dd($validation);
            return redirect()->to('/profil/ubah/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        // $file_foto = $this->request->getFile('foto');
        // $file_foto->move('profil_warek');
        // $nama_foto = $file_foto->getName();



        // $id = url_title($this->request->getVar('nama_warek'), '-', true);
        $this->profModel->save([
            'id' => $aidi,
            'email' => $this->request->getVar('email_warek'),
            'nama_warek' => $this->request->getVar('nama_warek'),
            // 'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'nip_warek' => $this->request->getVar('nip_warek'),
            'jabatan_warek' => $this->request->getVar('jabatan_warek'),
            'no_telp' => $this->request->getVar('no_telp'),
            // 'ttd_warek' => $this->request->getVar('ttd_warek'),
            // 'foto' => $nama_foto,

        ]);

        session()->setFlashdata('pesan', 'Data Telah Tersimpan');

        return redirect()->to('/profil');
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
