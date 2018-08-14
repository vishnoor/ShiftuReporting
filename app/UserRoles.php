<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $table = 'user_role';

    public function User()
    {
        $this->belongsTo('App\User', 'user_id', 'id');
    }
}