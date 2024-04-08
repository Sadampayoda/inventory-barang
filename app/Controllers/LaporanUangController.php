<?php

namespace App\Controllers;

use App\Models\BarangsModel;
use App\Models\TransaksiModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;

class LaporanUangController extends BaseController
{
    public function index(): string
    {
        $TransaksiModel = new TransaksiModel();

       

        if($this->request->getGet('type') == 'bulan'){
            $bulan = $this->request->getGet('month');
            $angka_bulan = date('m', strtotime(strval($bulan)));
            $data = $TransaksiModel->select('barangs.id_barang,barangs.nama_barang,SUM(transaksi.jumlah) as jumlah,barangs.harga_beli,SUM(barangs.harga_jual) as total, users.username,tanggal')->join('barangs','barangs.id_barang = transaksi.id_barang')->join('users','users.id = transaksi.id_kasir')->groupBy('id_kasir,id_barang,tanggal')->where('MONTH(tanggal)',$angka_bulan)->findAll();
        }elseif($this->request->getGet('type') == 'tahun'){
            $bulan = $this->request->getGet('month');
            $tahun = $this->request->getGet('year');
            $angka_bulan = date('m', strtotime(strval($bulan)));
            $angka_tahun = date('y', strtotime(strval($tahun)));
            $data = $TransaksiModel->select('barangs.id_barang,barangs.nama_barang,SUM(transaksi.jumlah) as jumlah,barangs.harga_beli,SUM(barangs.harga_jual) as total, users.username,tanggal')->join('barangs','barangs.id_barang = transaksi.id_barang')->join('users','users.id = transaksi.id_kasir')->groupBy('id_kasir,id_barang,tanggal')->where('MONTH(tanggal)',$angka_bulan)->where('YEAR(tanggal)',$angka_tahun)->findAll();
        }else{
            $data = $TransaksiModel->select('barangs.id_barang,barangs.nama_barang,SUM(transaksi.jumlah) as jumlah,barangs.harga_beli,SUM(barangs.harga_jual) as total, users.username,tanggal')->join('barangs','barangs.id_barang = transaksi.id_barang')->join('users','users.id = transaksi.id_kasir')->groupBy('id_kasir,id_barang,tanggal')->findAll();
        }
        
        // var_dump($data);die;

        return view('laporan/index',[
            'active' => 'laporan',
            'data' =>  $data,
            'tahun' => $TransaksiModel->select("DATE_FORMAT(tanggal, '%Y') AS tahun")->groupBy('tahun')->findAll(),
            'bulan' => $TransaksiModel->select("DATE_FORMAT(tanggal, '%M') AS bulan")->groupBy('bulan')->findAll(),
            
        ]);
    }

    public function pdf()
    {
        

        // Set document information
        $TransaksiModel = new TransaksiModel();
        // Load DOMPDF library
        $dompdf = new Dompdf();

        // Load HTML content from view file
        $html = view('laporan/pdf', [
            'data' => $TransaksiModel->select('barangs.id_barang,barangs.nama_barang,SUM(transaksi.jumlah) as jumlah,barangs.harga_beli,SUM(barangs.harga_jual) as total, users.username,tanggal')->join('barangs','barangs.id_barang = transaksi.id_barang')->join('users','users.id = transaksi.id_kasir')->groupBy('id_kasir,id_barang,tanggal')->findAll(), 
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();
        $dompdf->stream('Laporan_penjualan.pdf');

    }

    

    
}