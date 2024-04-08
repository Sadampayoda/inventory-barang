<?php

namespace App\Controllers;

use App\Models\HutangModel;
use App\Models\UsersModel;

class HutangController extends BaseController
{
    public function index(): string
    {
        $HutangModel = new HutangModel();
        return view('bendahara/hutang/index',[
            'active' => 'hutang',
            'data' => $HutangModel->where('status','hutang')->findAll(),
        ]);
    }

    public function search(): string
    {   
        $HutangModel = new HutangModel();
        $result = $HutangModel->like('kode',$this->request->getGet('search'))->orLike('keterangan',$this->request->getGet('search'))->where('status','hutang')->findAll();
                                
        // var_dump($result);die;
        
        return view('bendahara/hutang/search',[
            'data' => $result,
            'active' => 'hutang'
        ]);
    }

    public function hapus()
    {
        $HutangModel = new HutangModel();
        $HutangModel->delete($this->request->getPost('id'));
        return redirect()->back()->with('success', 'Data berhasil di hapus');
    }

    public function tambah()
    {
        
        return view('bendahara/hutang/tambah',[
            'active' => 'hutang',
            
        ]);
    }

    public function insert()
    {
        
        $keterangan = $this->request->getPost('keterangan');
        $nominal = $this->request->getPost('nominal');
        $tanggal = $this->request->getPost('tanggal');
        
        // var_dump($idPemilik);die;

        
        
        $HutangModel = new HutangModel();
        $data = [
            'keterangan' => $keterangan,
            'nominal' => $nominal,
            'tanggal' =>  $tanggal,
            'status' => 'hutang'
        ];
        
        $HutangModel->insert($data);

        return redirect()->to('/hutang')->with('success', 'Data hutang berhasil ditambahkan');
    }
    public function edit($id)
    {
        // return $id;
        $HutangModel = new HutangModel();
        $data['data'] = $HutangModel->where('kode',$id)->first();
        $data['active'] = 'hutang';
        // var_dump($data['rekening']);die;

        

        return view('bendahara/hutang/edit', $data);
    }

    public function update($id)
    {
        
        $keterangan = $this->request->getPost('keterangan');
        $nominal = $this->request->getPost('nominal');
        $tanggal = $this->request->getPost('tanggal');
        
        // var_dump($tanggal);die;

        
        
        $HutangModel = new HutangModel();
        $data = [
            'keterangan' => $keterangan,
            'nominal' => $nominal,
            'tanggal' =>  $tanggal,
            'status' => 'hutang'
        ];
        
        $HutangModel->update($id,$data);

        return redirect()->to('/hutang')->with('success', 'Data hutang berhasil diperbarui');
        // return redirect()->to('/rekening')->with('success', 'Data rekening berhasil diperbarui');
    }
}
