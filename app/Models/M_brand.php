<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class M_brand extends Model
{

    protected $table = 'brand';
    protected $primaryKey = 'id_brand';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nama_brand'];
    protected $useAutoIncrement = true;
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [
        'nama_brand' => 'required|is_unique[brand.nama_brand]'
    ];
    protected $validationMessages = [
        // 'nama_brand' => ['required' => 'nama kategri efkne']
    ];
    // protected $skipValidation     = true;
}
