<?php
namespace App\Models;
use CodeIgniter\Model;

class Matkul_model extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table("mata_kuliah");
    }
    public function saveMatkul($data)
    {
        return $this->db->table('mata_kuliah')->insert($data);
    }
    public function js()
    {
        $this->builder->select("*");
        $this->builder->where("id_mahasiswa",NULL);
       
        $this->builder->orderBy("id","desc");

        $mahasiswa = $this->builder->get();
        return $mahasiswa;
        // $mahasiswa->result();
    }
    public function delete_matkul($nama)
    {
        return $this->db->table('mata_kuliah')->delete(array('nama'=>$nama));

    }
    public function matkulIdMaha()
    {
        $this->builder->select("nama");
        $this->builder->where("id_mahasiswa IS NULL");

        $matkulnull = $this->builder->get();
        return $matkulnull;
    }
    public function saveMaha($data_matkul)
    {
        return $this->db->table('mata_kuliah')->insert($data_matkul);
    }
    public function idmaha_null($nama_matkul, $id_mahasiswa)
{
    $this->builder->set('id_mahasiswa', $id_mahasiswa);
    $this->builder->where("nama", $nama_matkul);
    $this->builder->where("id_mahasiswa IS NULL");
    $this->builder->update();
}
}