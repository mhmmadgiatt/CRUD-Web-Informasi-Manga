<?php

namespace App\Controllers;
use App\Models\KomikModel;
use App\Models\User;

class Komik extends BaseController
{   
    protected $komikModel;
    protected $userModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
        $this->userModel = new User();
    }
    public function index()
    {
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/');
        }
        if(session()->get('level') == '2'){
            $komik = $this->komikModel->findAll();
        }else{
            $komik = $this->komikModel->where('penulis', session()->get('nama'))->findAll();
        }
        if(isset($_COOKIE['username']) || isset($_SESSION['username'])){
            $data = [
                'komik' => $komik,
                'username' => $_COOKIE['username'] ?? $_SESSION['username']
            ];
        }

        // $komik = $this->komikModel->findAll();
        $data = [
            'komik' => $komik
        ];
        return view('Komik/index', $data);
    }
    public function detail($id){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/');
        }
        $komik = $this->komikModel->find($id);
        if($komik['penulis'] != session()->get('nama') && session()->get('level') == '1'){
            return redirect()->to('/komik');
        }
        $data = [
            'komik' => $komik
        ];
        return view('Komik/detail', $data);
    }
    public function create(){
        return view('Komik/create');
    }
    public function save(){
        if(!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])){
            return redirect()->to('/komik/create')->withInput();
        }
        $judul = $this->request->getVar('judul');
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = url_title($judul, '-', true) . '.' . $fileGambar->getClientExtension();
        $fileGambar->move('img', $namaGambar);
        
        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'genre' => $this->request->getPost('genre'),
            'tanggal_rilis' => $this->request->getPost('tanggal_rilis'),
            'gambar' => $namaGambar,
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        $this->komikModel->insert($data);
        return redirect()->to('/komik');
    }
    public function delete($id){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/');
        }
        $komik = $this->komikModel->find($id);
        if($komik['penulis'] != session()->get('nama') && session()->get('level') == '1'){
            return redirect()->to('/komik');
        }
        if($komik['gambar'] != 'default.jpg'){
            unlink('img/' . $komik['gambar']);
        }

        $this->komikModel->delete($id);
        return redirect()->to('/komik');
    }
    public function edit($id){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/');
        }
        $komik = $this->komikModel->find($id);
        if($komik['penulis'] != session()->get('nama') && session()->get('level') == '1'){
            return redirect()->to('/komik');
        }
        $data = [
            'komik' => $komik
        ];
        return view('Komik/edit', $data);
    }
    public function update($id){
        //hapus gambar lama
        $komik = $this->komikModel->find($id);
        $oldGambar = $komik['gambar'];
        unlink('img/' . $oldGambar);

        //upload gambar baru
        $judul = $this->request->getVar('judul');
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = url_title($judul, '-', true) . '.' . $fileGambar->getClientExtension();
        $fileGambar->move('img', $namaGambar);

        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'genre' => $this->request->getPost('genre'),
            'gambar' => $namaGambar,
            'tanggal_rilis' => $this->request->getPost('tanggal_rilis'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        $this->komikModel->update($id, $data);
        return redirect()->to('/komik');
    }
}
