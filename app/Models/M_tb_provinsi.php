<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class M_tb_provinsi extends Model
{

  protected $table = 'tb_provinsi';
  protected $primaryKey = 'id';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['id', 'nama'];
  protected $useAutoIncrement = true;
  protected $useTimestamps = false;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
  protected $validationRules    = [
    // 'user_id' => 'required|is_unique[biodata.user_id]',

  ];
  protected $validationMessages = [
    // 'nama_brand' => ['required' => 'nama kategri efkne']
  ];
  // protected $skipValidation     = true;
}
