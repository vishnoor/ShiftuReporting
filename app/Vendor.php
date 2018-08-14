<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendor';
    protected $primaryKey = 'user_id'; 

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['user_id','name','contact_number','address_line1', 
                           'address_line2','city', 'state','is_approved','is_blocked'];
    /**
     * Get the User record associated with the Vendor.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}