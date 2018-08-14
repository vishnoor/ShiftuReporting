<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
       return $this->belongsToMany('App\Role', 'user_role', 'user_id','role_id');
    }

    public function hasRole($role)
    {
        $roles =  $this->roles->where('role_code', $role)->first();
        if ($roles !== NULL)
        {
            return true; //$roles->role_code == $role;
        }
        else
        {
            return false;
        }
    }

    public function projectLeads()
    {
        return $this->hasMany('App\Project','lead_id');
    }

    public function bdms()
    {
        return $this->hasMany('App\Project','bdm_id');
    }

    public function employee()
    {
        return $this->hasOne('App\Employee','user_id');
    }
}
