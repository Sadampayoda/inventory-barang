<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangsModel extends Model
{
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['kategori', 'nama_barang', 'merk', 'stok', 'harga_beli', 'harga_jual', 'satuan'];
}
