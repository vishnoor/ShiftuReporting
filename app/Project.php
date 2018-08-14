<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    public $timestamps = false;

    protected $fillable = ['id','client','name','start_date', 
                           'end_date','lead_id', 'bdm_id','is_active'];

    public function projectLead()
    {
        return $this->belongsTo('App\User','lead_id');
    }            
    
    public function projectBDM()
    {
        return $this->belongsTo('App\User','bdm_id');
    }    
}
