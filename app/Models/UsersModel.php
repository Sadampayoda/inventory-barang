<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['nama','username', 'password', 'photo','noHp' ,'level'];
    public function rekenings()
    {
        return $this->hasMany(RekeningModel::class, 'users_id', 'id');
    }
}
