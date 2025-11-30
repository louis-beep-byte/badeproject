<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'ip_address', 'mac_address', 'user_agent'];
    protected $useTimestamps = true;
}
