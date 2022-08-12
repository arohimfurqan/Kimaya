<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_brand;

class Brand extends BaseController
{

    protected $Model;
    protected $validation;
    protected $db;

    public function __construct()
    {
        $this->Model = new M_brand();
        $this->validation =  \Config\Services::validation();
        $this->db = \Config\database::connect();
    }

    public function index()
    {
        // echo session()->getFlashdata('ab');
        // die;
        // print_r($db->table('brand')->get()->getResult());
        // die;
        $data = [
            'brand' =>  $this->Model->findAll()
        ];
        $template = [
            'isi' => view('brand/index', $data)
        ];
        return view('layout/main', $template);
    }
    public function add()
    {
        $validasi = [];
        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama_brand' => $this->request->getPost('nama_brand'),
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
            'isi' => view('brand/form', $validasi)
        ];
        return view('layout/main', $template);
    }

    public function edit($id)
    {
        $validasi = [
            'update' => $id,
            'model' => $this->Model->where(['id_brand' => $id])->first(),


        ];
        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama_brand' => $this->request->getPost('nama_brand'),
            ];
            if ($this->Model->update($id, $data)) {
                $validasi = [
                    'update' => $id,
                    'model' => $this->Model->where(['id_brand' => $id])->first(),
                    'berhasil' => 'Berhasil Menyimpan Data'
                ];
            } else {
                $validasi = [
                    'update' => $id,
                    'model' => $this->Model->where(['id_brand' => $id])->first(),
                    'errors' => $this->Model->errors()
                ];
                // print_r($this->Model->errors());
                // die;
            }
        }
        $template = [
            'isi' => view('brand/form', $validasi)
        ];
        return view('layout/main', $template);
    }


    public function delete($id)
    {

        $this->Model->delete($id);
        return  redirect()->to('/brand');
    }
}
