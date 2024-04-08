<?php

namespace App\Controllers;

use App\Models\UsersModel;

class PenggunaController extends BaseController
{
    public function index(): string
    {
        $pengguna = new UsersModel();
        return view('Admin/pengguna/index',[
            'data' => $pengguna->findAll(),
            'active' => 'pengguna'
        ]);
    }

    public function search(): string
    {   
        $pengguna = new UsersModel();
        $result = $pengguna->like('username',$this->request->getGet('search'))
                            ->findAll();
        // var_dump($result);die;
        
        return view('Admin/pengguna/search',[
            'data' => $result,
            'active' => 'pengguna'
        ]);
    }

   

   

    public function hapus()
    {
        $pengguna = new UsersModel();
        $pengguna->delete($this->request->getPost('id'));
        return redirect()->back()->with('success', 'Data berhasil di hapus');
    }

    public function tambah()
    {
        return view('Admin/pengguna/tambah',[
            'active' => 'pengguna'
        ]);
    }

    public function insert()
    {
        helper(['form']);

        $photo = $this->request->getFile('photo');

        
        
        

        if ($this->request->getPost()) {
            $validation = \Config\Services::validation();
            if (!$validation->run($this->request->getPost(),'pengguna')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            } 

            if ($photo->isValid() && !$photo->hasMoved()) {
                $photo->move(ROOTPATH . 'public/image/users'); 
                $resultPhoto = $photo->getName(); 
            }

            $nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $level = $this->request->getPost('level');
            $pengguna = new UsersModel();

            $data = [
                'nama' => $nama,
                'username' => $username,
                'level' => $level,
                'photo' => $resultPhoto
            ];

            $pengguna->insert($data);

            
            return redirect()->to('/pengguna')->with('success', 'Data pengguna berhasil ditambahkan.');
        }

        
        return redirect()->back()->with('error','Data tidak dapat diproses');
    }


    public function edit($id)
    {
        $pengguna = new UsersModel();

        $data['data'] = $pengguna->find($id);
        $data['active'] = 'pengguna';

        return view('admin/pengguna/edit', $data);
    }

    public function update($id)
    {
        $pengguna = new UsersModel();

        $rules = [
            'nama' => 'required',
            'username' => 'required',
            'level' => 'required',
            
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($fileFoto = $this->request->getFile('photo')) {
            $namaFoto = $fileFoto->getName();
            $fileFoto->move(ROOTPATH . 'public/image/users', $namaFoto);
            $photo = $namaFoto;
        }
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $level = $this->request->getPost('level');

        $data = [
            'nama' => $nama,
            'username' => $username,
            'level' => $level,
            'photo' => $photo
        ];



        $pengguna->update($id, $data);

        return redirect()->to('/pengguna')->with('success', 'Data pengguna berhasil diupdate');
    }
}
