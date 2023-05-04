<?php
namespace App\Models;
use CodeIgniter\Model;

class Mahasiswa_model extends Model
{
    public function __construct()
    {
        $this->db =db_connect();
        $this->builder = $this->db->table('mahasiswa');
    }
    public function index()
    {
        $this->builder->select("mahasiswa.*, COUNT(mata_kuliah.id) as jumlah_sks");
        $this->builder->join("mata_kuliah","mata_kuliah.id_mahasiswa = mahasiswa.id");
        $this->builder->orderBy("mahasiswa.id","desc");
        $this->builder->groupBY("mahasiswa.id");

        $mahasiswa = $this->builder->get();
        return $mahasiswa;
        // $mahasiswa->result();
    }
    public function saveMaha($data)
    {
        return $this->db->table('mahasiswa')->insert($data);
    }
    public function byId($nama)
    {
        $this->builder->select('id');
        $this->builder->where('nama',$nama);
        $mahasiswa = $this->builder->get()->getRow();
        return $mahasiswa;
    }
    public function deletemahasiswa($data, $id)
    {
        $this->builder->set($data);
        $this->builder->where('id', $id);
        $this->builder->update();
    }
    public function byNama($nama)
    {
        return $this->db->table('mahasiswa')
        ->where('nama', $nama)
        ->get()
        ->getRow();
    }
    public function ID($id)
    {
        $this->builder->select("mahasiswa.*, COUNT(mata_kuliah.id) as jumlah_sks,mata_kuliah.nama as matkul");
        $this->builder->join("mata_kuliah","mata_kuliah.id_mahasiswa = mahasiswa.id");
        $this->builder->where("mahasiswa.id",$id);

        $mahasiswa = $this->builder->get()->getRow();
        return $mahasiswa;
        // $mahasiswa->result();
    }

}