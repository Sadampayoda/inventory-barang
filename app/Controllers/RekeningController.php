<?php

namespace App\Controllers;

use App\Models\RekeningModel;
use App\Models\UsersModel;

class RekeningController extends BaseController
{
    public function index(): string
    {
        $rekeningModel = new RekeningModel();
        return view('admin/rekening/index',[
            'active' => 'rekening',
            'data' => $rekeningModel->join('users', 'users.id = rekening.users_id')->findAll(),
        ]);
    }

    public function search(): string
    {   
        $rekeningModel = new RekeningModel();
        $result = $rekeningModel->join('users', 'users.id = rekening.users_id')
                                ->like('users.username',$this->request->getGet('search'))
                                ->findAll();
        // var_dump($result);die;
        
        return view('Admin/rekening/search',[
            'data' => $result,
            'active' => 'rekening'
        ]);
    }

    public function hapus()
    {
        $rekeningModel = new RekeningModel();
        $rekeningModel->delete($this->request->getPost('id'));
        return redirect()->back()->with('success', 'Data berhasil di hapus');
    }

    public function tambah()
    {
        $users = new UsersModel();
        return view('Admin/rekening/tambah',[
            'active' => 'rekening',
            'data' => $users->findAll(),
        ]);
    }

    public function insert()
    {
        
        $namaBank = $this->request->getPost('nama_bank');
        $idPemilik = $this->request->getPost('users_id');
        $nomerRekening = $this->request->getPost('nomer_rekening');
        $saldo = $this->request->getPost('saldo');
        // var_dump($idPemilik);die;

        if ($this->request->getPost()) {
            $validation = \Config\Services::validation(); 
            if (! $validation->run($this->request->getPost(),'rekening')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            
        }

        
        $rekeningModel = new RekeningModel();
        $data = [
            'nama_bank' => $namaBank,
            'users_id' => $idPemilik,
            'nomer_rekening' => $nomerRekening,
            'saldo' => $saldo
        ];
        
        $rekeningModel->insert($data);

        return redirect()->to('/rekening')->with('success', 'Data rekening berhasil ditambahkan');
    }
    public function edit($id)
    {
        // return $id;
        $rekeningModel = new RekeningModel();
        $data['rekening'] = $rekeningModel->where('id_rekening',$id)->first();
        $data['active'] = 'rekening';
        // var_dump($data['rekening']);die;

        

        return view('admin/rekening/edit', $data);
    }

    public function update($id)
    {
        // Ambil data dari form
        $namaBank = $this->request->getPost('nama_bank');
        $idPemilik = $this->request->getPost('id_pemilik');
        $nomerRekening = $this->request->getPost('nomer_rekening');
        $saldo = $this->request->getPost('saldo');

        // Validasi input
        $validationRules = [
            'nama_bank' => 'required',
            'nomer_rekening' => 'required|numeric',
            'saldo' => 'required|numeric'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ke database
        $rekeningModel = new RekeningModel();
        $data = [
            'nama_bank' => $namaBank,
            'nomer_rekening' => $nomerRekening,
            'saldo' => $saldo
        ];
        
        $rekeningModel->update($id, $data);

        return redirect()->to('/rekening')->with('success', 'Data rekening berhasil diperbarui');
    }
}
