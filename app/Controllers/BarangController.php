<?php

namespace App\Controllers;

use App\Models\BarangsModel;

class BarangController extends BaseController
{

    public function index(): string
    {
        
        $barang = new BarangsModel();
        return view('Admin/barang/index',[
            'data' => $barang->findAll(),
            'active' => 'barang'
        ]);
    }
    public function search(): string
    {   
        $barang = new BarangsModel();
        $result = $barang->like('nama_barang',$this->request->getGet('search'))->findAll();
        // var_dump($result);die;
        
        return view('Admin/barang/search',[
            'data' => $result,
            'active' => 'barang'
        ]);
    }

    public function limit(): string
    {   
        $barang = new BarangsModel();
        $result = $barang->findAll();
        if($this->request->getGet('limit') != 'semua'){ 
            $result = $barang->findAll(intval($this->request->getGet('limit')));
        }
        
        
        
        return view('Admin/barang/limit',[
            'data' => $result,
            'active' => 'barang'
        ]);
    }

    public function sorting()
    {
        $barang = new BarangsModel();
        $stok = $barang->where('stok', 0)->findAll();
        return view('Admin/barang/sorting',[
            'data' => $barang->findAll(),
            'stok' => $stok,
            'active' => 'barang'
        ]);   
    }

    public function hapus()
    {
        $barang = new BarangsModel();
        $barang->delete($this->request->getPost('id'));
        return redirect()->back()->with('success', 'Data berhasil di hapus');
    }

    public function show($id)
    {
        $model = new BarangsModel(); 
        $data['barang'] = $model->find($id);
        $data['active'] = 'barang';

        return view('Admin/barang/show', $data);
    }

    public function tambah()
    {
        return view('Admin/barang/tambah',[
            'active' => 'barang'
        ]);
    }

    public function insert()
    {
        helper(['form']);

        

        if ($this->request->getPost()) {
            $validation = \Config\Services::validation();
            if (!$validation->run($this->request->getPost(),'barang')) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            } 
            $barang = new BarangsModel();

            $data = [
                'nama_barang' => $this->request->getPost('nama_barang'),
                'kategori' => $this->request->getPost('kategori'),
                'merk' => $this->request->getPost('merk'),
                'stok' => $this->request->getPost('stok'),
                'harga_beli' => $this->request->getPost('harga_beli'),
                'harga_jual' => $this->request->getPost('harga_jual'),
                'satuan' => $this->request->getPost('satuan')
            ];

            $barang->insert($data);

            
            return redirect()->to('/barang')->with('success', 'Data barang berhasil ditambahkan.');
        }

        
        return redirect()->back()->with('error','Data tidak dapat diproses');
    }

    public function edit($id)
    {
        $model = new BarangsModel(); 
        $data['barang'] = $model->find($id);
        $data['active'] = 'barang';
        return view('admin/barang/edit', $data);
    }

    public function update($id)
    {
        $model = new BarangsModel(); 

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori' => $this->request->getPost('kategori'),
            'merk' => $this->request->getPost('merk'),
            'stok' => $this->request->getPost('stok'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'satuan' => $this->request->getPost('satuan')
        ];

       
        // $id = $this->request->getPost('id_barang');
        $model->update($id, $data);

        
        return redirect()->to('/barang')->with('success', 'Data barang berhasil diedit.');
    }
}
