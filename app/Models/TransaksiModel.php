<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi'; // Nama tabel transaksi

    protected $primaryKey = 'id_transaksi'; 

    protected $allowedFields = ['tanggal', 'id_barang', 'keterangan', 'jumlah', 'total_harga', 'jenis', 'id_kasir'];
}