<?php

namespace App\Controllers;

use App\Models\BarangsModel;
use App\Models\TransaksiModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;
use TCPDF;

class LaporanController extends BaseController
{
    public function index(): string
    {
        $TransaksiModel = new TransaksiModel();
        $barang = new BarangsModel();
        return view('bendahara/laporan/index', [
            'active' => 'laporan-bendahara',
            'data' => $TransaksiModel->join('barangs', 'transaksi.id_barang = barangs.id_barang')->findAll(),
            'categori' => $barang->groupBy('kategori')->findAll(),
        ]);
    }

    public function date()
    {
        $fromDate = $this->request->getGet('fromDate');
        $toDate = $this->request->getGet('toDate');


        $transaksiModel = new TransaksiModel();
        $data = $transaksiModel->join('barangs', 'transaksi.id_barang = barangs.id_barang')
            ->where('transaksi.tanggal >=', $fromDate)
            ->where('transaksi.tanggal <=', $toDate)
            ->findAll();



        return view('bendahara/laporan/date', ['data' => $data]);
    }

    public function category()
    {



        $category = $this->request->getGet('category');


        $TransaksiModel = new TransaksiModel();


        return view('bendahara/laporan/category', [
            'data' => $TransaksiModel->join('barangs', 'transaksi.id_barang = barangs.id_barang')
                ->where('barangs.kategori', $category)->findAll()
        ]);
    }

    public function pdf()
    {
        // Load TCPDF library
        $pdf = new TCPDF();

        // Set document information
        $TransaksiModel = new TransaksiModel();
        // Load DOMPDF library
        $dompdf = new Dompdf();

        // Load HTML content from view file
        $html = view('bendahara/laporan/pdf', [
            'data' => $TransaksiModel->join('barangs', 'transaksi.id_barang = barangs.id_barang')->findAll(), 
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();
        $dompdf->stream('laporan_transaksi.pdf');

    }
}
