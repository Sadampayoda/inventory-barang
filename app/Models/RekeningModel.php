<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Models\UsersModel;

class RekeningModel extends Model
{
    protected $table = 'rekening';
    protected $primaryKey = 'id_rekening';
    protected $allowedFields = ['nama_bank', 'nomer_rekening' ,'users_id', 'saldo'];

    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'users_id', 'id');
    }
}