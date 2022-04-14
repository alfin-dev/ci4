<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'buku';
    protected $primaryKey       = 'ISBN';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ISBN', 'judul', 'jumlah_halaman', 'kode_pengarang', 'kode_penerbit'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function tambah($data)
    {
        $this->builder = $this->db->table($this->table);
        return $this->builder->insert($data);
    }

    public function getBuku()
    {
        return $this->db->table('buku')
            ->join('pengarang', 'buku.kode_pengarang = pengarang.kode_pengarang')
            ->join('penerbit', 'buku.kode_penerbit = penerbit.kode_penerbit')
            ->get()->getResultArray();
    }


    public function getwhereBuku($id)
    {
        return $this->db->table('buku')
            ->join('pengarang', 'buku.kode_pengarang = pengarang.kode_pengarang')
            ->join('penerbit', 'buku.kode_penerbit = penerbit.kode_penerbit')
            ->where('ISBN', $id)
            ->get()->getRow();
    }
}
