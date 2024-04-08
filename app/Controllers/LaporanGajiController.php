<?php

namespace App\Controllers;

use App\Models\GajiModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;

class LaporanGajiController extends BaseController
{
    public function index(): string
    {
        $GajiModel = new GajiModel();
        $users = new UsersModel();
        return view('bendahara/laporan-gaji/index',[
            'active' => 'laporan-gaji',
            'categori' => $users->groupBy('username')->findAll(),
            'data' => $GajiModel->join('users', 'users.id = gaji.id_users')->findAll(),
        ]);
    }

    public function date()
    {
        $fromDate = $this->request->getGet('fromDate');
        $toDate = $this->request->getGet('toDate');
        
        return 'o';
        $gaji = new GajiModel();
        $data = $gaji->join('users', 'users.id = gaji.id_users')
                                ->where('gaji.tanggal >=', $fromDate)
                                ->where('gaji.tanggal <=', $toDate)
                                ->findAll();
                                

        
        return view('bendahara/laporan-gaji/date', ['data' => $data]);
    }

    public function category()
    {
        
                    
        
        $category = $this->request->getGet('category');

    
        $gaji = new GajiModel();

        return view('bendahara/laporan-gaji/category',[
            'data' => $gaji->join('users', 'users.id = gaji.id_users')
            ->where('users.username', $category)->findAll()
        ]);

        
    }

    public function pdf()
    {
        $dompdf = new Dompdf();
        $GajiModel = new GajiModel();
        $html = view('bendahara/laporan-gaji/pdf', [
            'data' => $GajiModel->join('users', 'users.id = gaji.id_users')->findAll(), 
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();
        $dompdf->stream('laporan_gaji.pdf');
    }
    
    public function pdfGaji($id)
    {
        $dompdf = new Dompdf();
        $GajiModel = new GajiModel();
        $html = view('bendahara/laporan-gaji/show', [
            'data' => $GajiModel->join('users', 'users.id = gaji.id_users')->where('users.id',$id)->first(), 
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();
        $dompdf->stream('laporan_gaji_slip.pdf');
    }


    
}

