<?php

namespace App\Controllers;

use App\Models\BarangsModel;
use App\Models\TransaksiModel;
use App\Models\UsersModel;

class TransaksiController extends BaseController
{
    public function index(): string
    {
        $TransaksiModel = new TransaksiModel();
        return view('bendahara/transaksi/index',[
            'active' => 'transaksi',
            'data' => $TransaksiModel->join('barangs','transaksi.id_barang = barangs.id_barang')->findAll(),
        ]);
    }

    public function search(): string
    {   
        $TransaksiModel = new TransaksiModel();
        $result = $TransaksiModel->join('barangs', 'barangs.id_barang = transaksi.id_barang')
                                ->like('barangs.nama_barang',$this->request->getGet('search'))
                                ->findAll();
        // var_dump($result);die;
        
        return view('bendahara/transaksi/search',[
            'data' => $result,
            'active' => 'transaksi'
        ]);
    }

    public function hapus()
    {
        $TransaksiModel = new TransaksiModel();
        $TransaksiModel->delete($this->request->getPost('id'));
        return redirect()->back()->with('success', 'Data berhasil di hapus');
    }

    public function tambah()
    {
        $barang = new BarangsModel();
        return view('bendahara/transaksi/tambah',[
            'active' => 'transaksi',
            'data' => $barang->findAll(),
        ]);
    }

    public function insert()
    {
        
        $validationRules = [
            'keterangan' => 'required',
            'id_barang' => 'required'
        ];

        if (!$this->validate($validationRules)) {
        
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $barangs = new BarangsModel();
        $barang = $barangs->where('id_barang',$this->request->getPost('id_barang'))->findAll();
        
        if($this->request->getPost('keterangan') == 'Penjualan')
        {
            $jenis = 'pemasukan';
        }else{
            $jenis = 'pengeluaran';

        }
        $data = [
            'keterangan' => $this->request->getPost('keterangan'),
            'id_barang' => $this->request->getPost('id_barang'),
            'tanggal' => date('Y-m-d'),
            'jenis' => $jenis,
            'total_harga' =>  $barang[0]['harga_jual'],
            'jumlah' => 1,
            'id_kasir' => session()->get('id')
        ];
        $transaksiModel = new TransaksiModel();

        
        $transaksiModel->insert($data);

    

        return redirect()->to('/transaksi')->with('success', 'Data transaksi berhasil ditambahkan');
    }
    public function edit($id)
    {
        // return $id;
        $TransaksiModel = new TransaksiModel();
        // $barang = new BarangsModel();
        $data['data'] = $TransaksiModel->join('barangs','transaksi.id_barang = barangs.id_barang')->where('transaksi.id_transaksi',$id)->first();
        $data['active'] = 'transaksi';
        // var_dump($data['transaksi']);die;

        

        return view('bendahara/transaksi/edit', $data);
    }

    public function update($id)
    {
        // var_dump($this->request->getPost());die;
        
        $validationRules = [
            'keterangan' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'jenis' => 'required',
            'id_kasir' => 'required'
        ];
        

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        
        $data = [
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'id_barang' => $this->request->getPost('id_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total_harga' => $this->request->getPost('total_harga'),
            'jenis' => $this->request->getPost('jenis'),
            'id_kasir' => $this->request->getPost('id_kasir')
        ];
        
        
        $transaksiModel = new TransaksiModel();
        $transaksiModel->update($id, $data);

        
    

        return redirect()->to('/transaksi')->with('success', 'Data transaksi berhasil diperbarui');
    }
}
