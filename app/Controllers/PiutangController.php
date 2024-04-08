<?php

namespace App\Controllers;

use App\Models\HutangModel;
use App\Models\UsersModel;

class PiutangController extends BaseController
{
    public function index(): string
    {
        $HutangModel = new HutangModel();
        return view('bendahara/piutang/index',[
            'active' => 'piutang',
            'data' => $HutangModel->where('status','piutang')->findAll(),
        ]);
    }

    public function search(): string
    {   
        $HutangModel = new HutangModel();
        $result = $HutangModel->like('kode',$this->request->getGet('search'))->orLike('keterangan',$this->request->getGet('search'))->where('status','piutang')->findAll();
                                
        // var_dump($result);die;
        
        return view('bendahara/piutang/search',[
            'data' => $result,
            'active' => 'piutang'
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
        
        return view('bendahara/piutang/tambah',[
            'active' => 'piutang',
            
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
            'status' => 'piutang'
        ];
        
        $HutangModel->insert($data);

        return redirect()->to('/piutang')->with('success', 'Data piutang berhasil ditambahkan');
    }
    public function edit($id)
    {
        // return $id;
        $HutangModel = new HutangModel();
        $data['data'] = $HutangModel->where('kode',$id)->first();
        $data['active'] = 'piutang';
        // var_dump($data['rekening']);die;

        

        return view('bendahara/piutang/edit', $data);
    }

    public function update($id)
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
            'status' => 'piutang'
        ];
        
        $HutangModel->update($id,$data);

        return redirect()->to('/piutang')->with('success', 'Data piutang berhasil diperbarui');
        // return redirect()->to('/rekening')->with('success', 'Data rekening berhasil diperbarui');
    }
}
