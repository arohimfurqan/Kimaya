<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_kategori;

class Kategori extends BaseController
{

    protected $Model;
    protected $validation;
    protected $db;

    public function __construct()
    {
        $this->Model = new M_kategori();
        $this->validation =  \Config\Services::validation();
        $this->db = \Config\database::connect();
    }

    public function index()
    {
        // echo session()->getFlashdata('ab');
        // die;
        // print_r($db->table('kategori')->get()->getResult());
        // die;
        $data = [
            'kategori' =>  $this->Model->findAll()
        ];
        $template = [
            'isi' => view('kategori/index', $data)
        ];
        return view('layout/main', $template);
    }
    public function add()
    {
        $validasi = [];
        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama_kategori' => $this->request->getPost('nama_kategori'),
            ];
            if ($this->Model->save($data)) {
                $validasi = [
                    'berhasil' => 'Berhasil Menyimpan Data'
                ];
            } else {
                $validasi = [
                    'errors' => $this->Model->errors()
                ];
                // print_r($this->Model->errors());
                // die;
            }
        }
        $template = [
            'isi' => view('kategori/form', $validasi)
        ];
        return view('layout/main', $template);
    }

    public function edit($id)
    {
        $validasi = [
            'update' => $id,
            'model' => $this->Model->where(['id_kategori' => $id])->first(),


        ];
        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama_kategori' => $this->request->getPost('nama_kategori'),
            ];
            if ($this->Model->update($id, $data)) {
                $validasi = [
                    'update' => $id,
                    'model' => $this->Model->where(['id_kategori' => $id])->first(),
                    'berhasil' => 'Berhasil Menyimpan Data'
                ];
            } else {
                $validasi = [
                    'update' => $id,
                    'model' => $this->Model->where(['id_kategori' => $id])->first(),
                    'errors' => $this->Model->errors()
                ];
                // print_r($this->Model->errors());
                // die;
            }
        }
        $template = [
            'isi' => view('kategori/form', $validasi)
        ];
        return view('layout/main', $template);
    }


    public function delete($id)
    {

        $this->Model->delete($id);
        return  redirect()->to('/kategori');
    }
}
