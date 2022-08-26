<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{

  protected $table = 'users';
  protected $primaryKey = 'id_user';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['username', 'password', 'email', 'role', 'foto_profile', 'nama', 'ktp', 'siup', 'situ', 'statuss'];
  protected $useAutoIncrement = true;
  protected $useTimestamps = false;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
  protected $validationRules    = [
    'username' => 'required|is_unique[users.username]',
    'password' => 'required|is_unique[users.password]',
    'email' => 'required|is_unique[users.email]',
    'role' => 'required',
  ];
  protected $validationMessages = [
    // 'nama_brand' => ['required' => 'nama kategri efkne']
  ];
  // protected $skipValidation     = true;
}
