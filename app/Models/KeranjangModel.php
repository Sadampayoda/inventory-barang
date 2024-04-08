<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Models\UsersModel;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $allowedFields = ['id_barang', 'id_kasir' ,'tanggal', 'waktu','jumlah'];

}