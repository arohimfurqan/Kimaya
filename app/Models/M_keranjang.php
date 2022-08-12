<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class M_keranjang extends Model
{

  protected $table = 'keranjang';
  protected $primaryKey = 'id_keranjang';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['user_id', 'status', 'tanggal_pesan', 'tanggal_pengiriman', 'tanggal_terima', 'tanggal_pembayaran', 'bukti_pembayaran'];
  protected $useAutoIncrement = true;
  protected $useTimestamps = false;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
  protected $validationRules    = [
    'user_id' => 'required',
    'status' => 'required',

  ];
  protected $validationMessages = [];
  // protected $skipValidation     = true;
}
