<?php
namespace App\Models;

use CodeIgniter\Model;


class HutangModel extends Model
{
    protected $table = 'hutang_piutang';
    protected $primaryKey = 'kode';
    protected $allowedFields = ['tanggal','keterangan','nominal','status'];

    
}