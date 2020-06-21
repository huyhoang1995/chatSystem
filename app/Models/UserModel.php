<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    protected $table = 'users';

   function scopeFilterAccount($query, $email)
    {
        return $query->where('email', $email);
    }
}
