<?php

namespace App\Controllers;


use App\Models\BarangsModel;
use App\Models\KeranjangModel;
// use App\Models\PembelianModel;
use App\Models\TransaksiModel;
use Dompdf\Dompdf;
use TCPDF;

class KeranjangController extends BaseController
{
    public function index(): string
    {

        
        $keranjang = new BarangsModel();
        $keranjangs = new KeranjangModel();
        
        return view('kasir/keranjang/index',[
            'data' => $keranjang->paginate(2),
            'active' => 'keranjang',
            'pager' => $keranjang->pager,
            'keranjang' => $keranjangs->join('barangs','barangs.id_barang = keranjang.id_barang')->join('users','users.id = keranjang.id_kasir')->where('users.id',session()->get('id'))->findAll(),
        ]);
    }

      

    public function hapus()
    {
        $keranjang = new KeranjangModel();
        $keranjang->delete($this->request->getPost('id'));
        return redirect()->back()->with('success', 'Data berhasil di hapus');
    }

    public function tambah()
    {
        $keranjang = new BarangsModel();
        
        return view('kasir/keranjang/tambah',[
            'active' => 'keranjang',
            'data' => $keranjang->like('nama_barang',$this->request->getGet('search'))->orLike('id_barang',$this->request->getGet('search'))->findAll(2),
        ]);
    }

    public function insert()
    {

        // return 'oke';
        $barang = new BarangsModel();
        $brng = $barang->where('id_barang',$this->request->getGet('id'))->first();

        $keranjang = new KeranjangModel();
        $cek_keranjang = $keranjang->where('id_barang',$brng['id_barang'])->where('id_kasir',session()->get('id'))->first();
        if($cek_keranjang){
            $keranjangs = ([
                'jumlah'     => $cek_keranjang['jumlah'] + 1,
                'tanggal'    => date('Y-m-d'), 
                'waktu'      => date('H:i:s')
            ]);
            $keranjang->update($cek_keranjang['id_keranjang'],$keranjangs);
        }else{
            $keranjangs = ([
                'id_barang'  => $brng['id_barang'],
                'id_kasir'   => session()->get('id'),
                'jumlah'     => 1,
                'tanggal'    => date('Y-m-d'), 
                'waktu'      => date('H:i:s')
            ]);
    
            $keranjang->insert($keranjangs);

        }

        
            
        return redirect()->to('/keranjang');
        

        
        // return redirect()->back()->with('error','Data tidak dapat diproses');
    }


    public function edit()
    {
        $keranjang = new KeranjangModel();

        $data['data'] = $keranjang->where('id_keranjang',$this->request->getGet('id'))->first();
        $data['active'] = 'keranjang';

        return view('kasir/keranjang/edit', $data);
    }

    public function update($id)
    {
        $keranjang = new KeranjangModel();
        $jumlah = $this->request->getPost('jumlah');
        if($this->request->getPost('jumlah') == null)
        {
            $jumlah = 1;
        }

        $data = [
            'jumlah' => $jumlah
        ];



        $keranjang->update($id, $data);

        return redirect()->to('/keranjang')->with('success', 'Data keranjang berhasil diupdate');
    }


    public function pembayaran()
    {
        // return 'p';
        $keranjangs = new KeranjangModel();
        $dompdf = new Dompdf();

        
        $html = view('kasir/keranjang/pdf', [
            'data' =>  $keranjangs->join('barangs','barangs.id_barang = keranjang.id_barang')->join('users','users.id = keranjang.id_kasir')->where('users.id',session()->get('id'))->findAll(), 
            'bayar' => $this->request->getPost('bayar'),
            'active' => 'keranjang'
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();
        $dompdf->stream('keranjang.pdf');
        

        $i = 0;
        foreach($this->request->getPost('barang') as $item)
        {
            $transaksi = new TransaksiModel();
            $data = [
                'tanggal' => date('Y-m-d'),
                'id_barang' => $item,
                'keterangan' => 'Pembelian barang',
                'jumlah' => 1,
                'total_harga' => $this->request->getPost('harga')[$i],
                'jenis' => 'Pemasukan',
                'id_kasir' => session()->get('id')
            ];
            $i = $i + 1;
            $transaksi->insert($data);
        }
        

        foreach($this->request->getPost('id') as $id)
        {
            $keranjang = new KeranjangModel();
            $keranjang->delete($id);   
        }
        // return 'pe';
        $keranjang = new KeranjangModel();
        

        

        
        return redirect()->to('/keranjang')->with('success', 'Data keranjang berhasil dibayar');
    }

    public function pdf()
    {
        // Load TCPDF library
        // $pdf = new TCPDF();

        // Set document information
        $keranjangs = new KeranjangModel();
        // Load DOMPDF library
        $dompdf = new Dompdf();

        // Load HTML content from view file
        $html = view('kasir/keranjang/pdf', [
            'data' =>  $keranjangs->join('barangs','barangs.id_barang = keranjang.id_barang')->join('users','users.id = keranjang.id_kasir')->where('users.id',session()->get('id'))->findAll(), 
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();
        $dompdf->stream('laporan_transaksi.pdf');

    }
}
