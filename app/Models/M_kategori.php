<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class M_kategori extends Model
{

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nama_kategori'];
    protected $useAutoIncrement = true;
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [
        'nama_kategori' => 'required|is_unique[kategori.nama_kategori]'
    ];
    protected $validationMessages = [
        // 'nama_kategori' => ['required' => 'nama kategri efkne']
    ];
    // protected $skipValidation     = true;
}
