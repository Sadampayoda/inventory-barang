<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Models\UsersModel;

class GajiModel extends Model
{
    protected $table = 'gaji';
    protected $primaryKey = 'id_gaji';
    protected $allowedFields = ['id_users','gaji','tanggal'];

    
}