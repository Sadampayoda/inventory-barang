<?php

namespace App\Controllers;

use App\Models\GajiModel;
use App\Models\UsersModel;

class GajiController extends BaseController
{
    public function index(): string
    {
        $GajiModel = new GajiModel();
        return view('bendahara/gaji/index',[
            'active' => 'gaji-karyawan',
            'data' => $GajiModel->join('users', 'users.id = gaji.id_users')->findAll(),
        ]);
    }

    public function search(): string
    {   
        $GajiModel = new GajiModel();
        $result = $GajiModel->join('users', 'users.id = gaji.id_users')
                                ->like('users.username',$this->request->getGet('search'))
                                ->findAll();
        // var_dump($result);die;
        
        return view('bendahara/gaji/search',[
            'data' => $result,
            'active' => 'gaji-karyawan'
        ]);
    }


    public function tambah()
    {
        
        $gaji = new GajiModel();
        $users = new UsersModel();
        $data =[];
        foreach($users->findAll() as $item)
        {
            
            if($users->join('gaji', 'users.id = gaji.id_users')->where('gaji.id_users',$item['id'])->countAllResults() == 0){
                $data[] = $item;
            }
        }
        
        return view('bendahara/gaji/tambah',[
            'active' => 'gaji-karyawan',
            'data' => $data,
        ]);
    }

    public function insert()
    {
        
        
        $idPemilik = $this->request->getPost('users_id');
        $nomergaji = $this->request->getPost('gaji');
        

        // if ($this->request->getPost()) {
        //     $validation = \Config\Services::validation(); 
        //     if (! $validation->run($this->request->getPost(),'gaji')) {
        //         return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        //     }

            
        // }

        
        $GajiModel = new GajiModel();
        $data = [
            
            'id_users' => $idPemilik,
            'gaji' => $nomergaji,
            'tanggal' => date('Y-m-d')
        ];
        
        $GajiModel->insert($data);

        return redirect()->to('/gaji-karyawan')->with('success', 'Data gaji berhasil ditambahkan');
    }
    
}
