<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class Home extends BaseController
{
    public function index(): string
    {
        $transaksi = new TransaksiModel();
        $datas = $transaksi->findAll();
        $labels = [];
        $values = [];

        foreach ($datas as $data) {
            $labels[] = $data['tanggal']; 
            $values[] = $data['total_harga'];
        }

        
        // var_dump($labels,$values);die;
       
        return view('index',[
            'active' => 'dashboard',
            'hari_ini' =>  $transaksi->select('SUM(total_harga) as total')->where('tanggal', date('Y-m-d'))->first(),
            'tahun_ini' => $transaksi->select('SUM(total_harga) as total')->where('YEAR(tanggal)', date('Y'))->first(),
            'bulan_ini' => $transaksi->select('SUM(total_harga) as total')->where('MONTH(tanggal)', date('m'))->first(),
            'total' => $transaksi->select('SUM(total_harga) as total')->first(),
            'labels' => $labels,
            'values' => $values

             
        ]);
    }
}
