<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table = 'buku';

    // manajemen buku
    public function getBuku($where = false)
    {
        if ($where == false) {
            return $this->db->table('buku')->get();
        }
        return $this->db->table('buku')->getWhere($where);
    }

    public function simpanBuku($data = null)
    {
        $this->db->table('buku')->insert($data);
    }

    public function updateBuku($data = null, $where = null)
    {
        $this->db->table('buku')->update($data, $where);
    }

    public function hapusBuku($where = null)
    {
        $this->db->table('buku')->delete($where);
    }

    public function total($field, $where)
    {
        $this->db->table('buku')->selectSum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->table('buku')->where($where);
        }
        return $this->db->table('buku')->get()->setRow($field);
    }

    // manajemen kategori
    public function getKategori($where = false)
    {
        if ($where == false) {
            return $this->db->table('kategori')->get();
        }
        return $this->db->table('kategori')->getWhere($where);
    }
    public function simpanKategori($data = null)
    {
        $this->db->table('kategori')->insert($data);
    }
    public function hapusKategori($where = null)
    {
        $this->db->table('kategori')->delete($where);
    }
    public function updateKategori($where = null, $data = null)
    {
        $this->db->table('kategori')->update($data, $where);
    }

    // join
    public function joinKategoriBuku($where)
    {
        return $this->db->table('buku')
            ->select('buku.id_kategori,kategori.kategori')
            ->join('kategori', 'kategori.id = buku.id_kategori')
            ->where($where)
            ->get();
    }
}
