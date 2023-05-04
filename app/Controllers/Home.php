<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mahasiswa_model;
use App\Models\Matkul_model;

class Home extends BaseController
{
    public function __construct()
    {
        $this->mahasiswa = new Mahasiswa_model();
        $this->matkul = new Matkul_model();
    }
    public function index()
    {
        $Mahasiswa = $this->mahasiswa->index();
        $data['Mahasiswa'] = $Mahasiswa->getResult();
        // var_dump($data); die;

        return view('index.php', $data);
    }
    public function create()
    {
        return view('tambah');
    }
    public function submitmatkul()
    {
        $nama_matkul = $this->request->getPost("nama_matkul");
        $data = [
            'nama' => $nama_matkul,
            'createdDate' => date('Y-m-d')
        ];
        $this->matkul->saveMatkul($data);
        //    $matkul

        return json_encode([
            "matkul" => $data
        ]);
    }
    public function deletematkul($nama)
    {
        // var_dump($nama); die;
        $this->matkul->delete_matkul($nama);
    }
    public function tambahmaha()
    {
        $nama_maha = $this->request->getPost('nama_maha');
        $alamat = $this->request->getPost('alamat');
        $nama_matkul = $this->request->getPost('nama_matkul');
        $radio = $this->request->getPost('flexRadioDefault');

        $is_nama_maha_exists = $this->mahasiswa->byNama($nama_maha) !== null;
        if ($is_nama_maha_exists) {
            return redirect()->to(base_url('home/create'))->with('error', 'Nama mahasiswa sudah ada!');
        }

        $data = [
            'nama' => $nama_maha,
            'alamat' => $alamat,
            'jenis_kelamin' => $radio,
            'createDate' => date('Y-m-d')

        ];

        $this->mahasiswa->saveMaha($data);
        $id_maha = $this->mahasiswa->byId($nama_maha);
        $Mahasiswa_id = intval($id_maha->id);



        $data_matkul = [
            'nama' => $nama_matkul,
            'id_mahasiswa' => $Mahasiswa_id,
            'createdDate' => date('Y-m-d')

        ];

        $this->matkul->saveMaha($data_matkul);

        $matkullama = $this->matkul->matkulIdMaha()->getResult();
        foreach ($matkullama as $matkul) {
            $this->matkul->idmaha_null($matkul->nama, $Mahasiswa_id);
        }


        return redirect()->to(base_url('/'))->with('success', 'Data berhasil disimpan!');
    }
    public function deletemahasiswa($id)
    {
        $data = [
            "deleteDate" => date('Y-m-d')
        ];
        $this->mahasiswa->deletemahasiswa($data, $id);
    }
    public function edit($id)
    {
        $edit_mahasiswa = $this->mahasiswa->ID($id);
        $data['mahasiswa']= [$edit_mahasiswa];
        // var_dump($data); die;
        
        
        return view('edit',$data);
    }
}
