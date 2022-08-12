<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class M_produk extends Model
{

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nama_produk', 'deskripsi', 'qty', 'brand_id', 'kategori_id', 'harga', 'foto_produk', 'status_produk'];
    protected $useAutoIncrement = true;
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [
        'nama_produk' => 'required',
        'brand_id' => 'required',
        'kategori_id' => 'required',
        'harga' => 'required',
        'status_produk' => 'required',
        'foto_produk' => 'required',
    ];
    protected $validationMessages = [
        'brand_id' => ['required' => 'Brand  field is required.'],
        'kategori_id' => ['required' => 'Kategori  field is required.'],
        'foto_produk' => ['required' => 'Foto Utama  field is required.']
    ];
    // protected $skipValidation     = true;
}
