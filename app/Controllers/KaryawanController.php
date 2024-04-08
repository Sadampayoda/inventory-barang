<?php

namespace App\Controllers;

use App\Models\UsersModel;

class KaryawanController extends BaseController
{
    public function index(): string
    {
        $karyawan = new UsersModel();
        return view('Admin/karyawan/index',[
            'data' => $karyawan->findAll(),
            'active' => 'karyawan'
        ]);
    }
    public function search(): string
    {   
        $karyawan = new UsersModel();
        $result = $karyawan->like('username',$this->request->getGet('search'))
                            ->findAll();
        // var_dump($result);die;
        
        return view('Admin/karyawan/search',[
            'data' => $result,
            'active' => 'karyawan'
        ]);
    }

    public function limit(): string
    {   
        $karyawan = new UsersModel();
        $result = $karyawan->findAll();
        if($this->request->getGet('limit') != 'semua'){ 
            $result = $karyawan->findAll(intval($this->request->getGet('limit')));
        }
        
        
        
        return view('Admin/karyawan/limit',[
            'data' => $result,
            'active' => 'karyawan'
        ]);
    }

   

    public function hapus()
    {
        $karyawan = new UsersModel();
        $karyawan->delete($this->request->getPost('id'));
        return redirect()->back()->with('success', 'Data berhasil di hapus');
    }

    public function tambah()
    {
        return view('Admin/karyawan/tambah',[
            'active' => 'karyawan'
        ]);
    }

    public function insert()
    {
        helper(['form']);

        

        if ($this->request->getPost()) {
            $validation = \Config\Services::validation();
            if (!$validation->run($this->request->getPost(),'karyawan')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            } 

            $username = $this->request->getPost('username');
            $level = $this->request->getPost('level');
            $noHp = $this->request->getPost('noHp');
            $password = $this->request->getPost('password');
            $karyawan = new UsersModel();

            $data = [
                'username' => $username,
                'noHp' => $noHp,
                'password' => $password,
                'level' => $level
            ];

            $karyawan->insert($data);

            
            return redirect()->to('/karyawan')->with('success', 'Data Karyawan berhasil ditambahkan.');
        }

        
        return redirect()->back()->with('error','Data tidak dapat diproses');
    }


    public function edit($id)
    {
        $karyawan = new UsersModel();

        $data['karyawan'] = $karyawan->find($id);
        $data['active'] = 'karyawan';

        return view('admin/karyawan/edit', $data);
    }

    public function update($id)
    {
        $karyawan = new UsersModel();

        $rules = [
            'username' => 'required',
            'level' => 'required',
            'noHp' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'level' => $this->request->getVar('level'),
            'noHp' => $this->request->getVar('noHp'),
            'password' => $this->request->getVar('password')
        ];

        $karyawan->update($id, $data);

        return redirect()->to('/karyawan')->with('success', 'Data karyawan berhasil diupdate');
    }

    public function show($id)
    {
        $model = new UsersModel(); 

        $data['karyawan'] = $model->find($id);
        $data['active'] = 'karyawan';
        return view('Admin/karyawan/show', $data);
    }
}
