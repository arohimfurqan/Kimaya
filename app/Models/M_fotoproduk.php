<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class M_fotoproduk extends Model
{

  protected $table = 'foto_lain_produk';
  protected $primaryKey = 'id_foto_lain';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['foto_lain', 'produk_id'];
  protected $useAutoIncrement = true;
  protected $useTimestamps = false;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
  protected $validationRules    = [];
  protected $validationMessages = [];
  // protected $skipValidation     = true;
}
