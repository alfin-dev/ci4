<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\PenerbitModel;
use App\Models\PengarangModel;

class Home extends BaseController
{
    public $buku;
    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => []
    ];
    public function __construct()
    {
        $this->buku = new BukuModel();
        $this->pengarang = new PengarangModel();
        $this->penerbit = new PenerbitModel();
    }
    public function index()
    {
        return view('index');
    }

    public function coba()
    {
        return view('crud/coba');
    }

    public function view()
    {
        $data['buku'] = $this->buku->getBuku();
        $data['penerbit'] = $this->penerbit->get()->getResultArray();
        $data['pengarang'] = $this->pengarang->get()->getResultArray();
        return view('crud/view', $data);
    }

    public function create()
    {
        $data['buku'] = $this->buku->getBuku();
        $data['penerbit'] = $this->penerbit->get()->getResultArray();
        $data['pengarang'] = $this->pengarang->get()->getResultArray();
        // dd($data['buku']);
        return view('crud/create', $data);
        $this->buku->insert([
            'ISBN' => $this->request->getPost('isbn'),
            'judul' => $this->request->getPost('judul'),
            'jumlah_halaman' => $this->request->getPost('hal'),
            'kode_pengarang' => $this->request->getPost('pengarang'),
            'kode_penerbit' => $this->request->getPost('penerbit'),
        ]);

        // return redirect('view');
    }

    public function ajax()
    {
        $buku = $this->buku;
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'isbn' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'hal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'pengarang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'penerbit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
            ])) {
                // session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            } else {
                $data = [
                    'ISBN'              => $this->request->getVar('isbn'),
                    'judul'             => $this->request->getVar('judul'),
                    'jumlah_halaman'    => $this->request->getVar('hal'),
                    'kode_pengarang'    => $this->request->getVar('pengarang'),
                    'kode_penerbit'     => $this->request->getVar('penerbit'),
                ];
                $simpan = $buku->insert($data);
                if ($simpan) {
                    $this->output['sukses'] = true;
                    $this->output['pesan']  = 'Berhasil';
                }
                echo json_encode($this->output);
            }
        }
    }

    public function update()
    {
        $buku = $this->buku;
        if ($this->request->isAJAX()) {
            $data = [
                'judul'             => $this->request->getVar('judul'),
                'jumlah_halaman'    => $this->request->getVar('hal'),
                'kode_pengarang'    => $this->request->getVar('pengarang'),
                'kode_penerbit'     => $this->request->getVar('penerbit'),
            ];
            $id = $this->request->getVar('isbn');
            $simpan = $buku->update($id, $data);
            if ($simpan) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Berhasil';
            }
            echo json_encode($this->output);
        }
    }

    public function destroy($id)
    {
        $this->buku->delete($id);
    }

    public function showtable()
    {
        $data['buku'] = $this->buku->getBuku();
        // dd($data['buku']);
        return view('crud/showtable', $data);
    }

    public function show($id = null)
    {
        $data['penerbit'] = $this->penerbit->get()->getResultArray();
        $data['pengarang'] = $this->pengarang->get()->getResultArray();
        $data['buku'] = $this->buku->getwhereBuku($id);
        // dd($data['buku']);
        return view('crud/edit', $data);
    }
}
