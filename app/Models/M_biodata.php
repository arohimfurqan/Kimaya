<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class M_biodata extends Model
{

  protected $table = 'biodata';
  protected $primaryKey = 'id_biodata';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['user_id', 'alamat', 'no_hp', 'provinsi_id', 'kota_id', 'tanggal_lahir'];
  protected $useAutoIncrement = true;
  protected $useTimestamps = false;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
  protected $validationRules    = [
    'user_id' => 'required|is_unique[biodata.user_id]',

  ];
  protected $validationMessages = [
    // 'nama_brand' => ['required' => 'nama kategri efkne']
  ];
  // protected $skipValidation     = true;
}
