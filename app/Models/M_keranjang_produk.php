<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class M_keranjang_produk extends Model
{

  protected $table = 'keranjang_produk';
  protected $primaryKey = 'produk_keranjang_id';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['keranjang_id', 'produk_id', 'jumlah', 'harga_keranjang',];
  protected $useAutoIncrement = true;
  protected $useTimestamps = false;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
  protected $validationRules    = [
    'keranjang_id' => 'required',
    'produk_id' => 'required',
    'jumlah' => 'required',
    'harga_keranjang' => 'required',

  ];
  protected $validationMessages = [];
  // protected $skipValidation     = true;
}
